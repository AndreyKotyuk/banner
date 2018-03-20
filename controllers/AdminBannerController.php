<?php

/**
 * Контроллер AdminController
 * Главная страница в админпанели
 */
class AdminBannerController extends AdminBase
{
    /**
     * Action для стартовой страницы "Панель администратора"
     */
    public function actionIndex()
    {
       // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $bannerList = Banner::getBannerList();


         // Подключаем вид
        require_once(ROOT . '/views/admin_banner/index.php');
        return true;

    }



    public function actionCreate()
    {
          // Проверка доступа
        self::checkAdmin();


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];

            // $options['image'] = $_POST['image'];
            $options['url'] = $_POST['url'];
            $options['status'] = $_POST['status'];
            $options['position'] = $_POST['position'];




            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {

                // Если ошибок нет
                // Добавляем новый тacк
                $id = Banner::createBanner($options);

                // Если запись добавлена
                if ($id) {
                    // echo '<pre>';print_r($_FILES["image"]);die();
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                     $nameFile = $_FILES['image']['name'];
                    // die($nameFile);
                     $typeFile = $_FILES['image']['type'];
                     $tmpNameFile = $_FILES['image']['tmp_name'];
                     $sizeFile = $_FILES['image']['size'];
                     $extensionFile = substr(strrchr($nameFile, '.'), 1); // получаем расширение файла


                     $foo = new Upload($_FILES['image']); 
                     if ($foo->uploaded) {
                        // save uploaded image with a new name,
   // resized to 100px wide
                       $foo->file_new_name_body = $id;
                       $foo->image_resize = true;
                         // $foo->image_convert = gif;
                       $foo->image_x = 400;
                         $foo->image_y = 320;
                       $foo->image_ratio_y = true;
                       $foo->Process($_SERVER['DOCUMENT_ROOT'] . "/upload/images/banner/");
                   }

                      // die($_FILES["image"]["tmp_name"]);
//                 $img = Banner::resize_image($_FILES['image']['tmp_name'], 200, 200);
// $_FILES["image"]["tmp_name"] = $img;
                      // $img = Banner::resize_image($_SERVER['DOCUMENT_ROOT']."/upload/images/banner/{$nameFile}", 200, 200);
                        // Если загружалось, переместим его в нужную папке, дадим новое имя

                     // if(!move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/banner/{$id}.$extensionFile"))
                     //    return array('error' => 'При загрузке возникли ошибки. Попробуйте ещё раз.');
               }

           };

                // Перенаправляем пользователя на страницу управлениями тасками
           header("Location: /admin/banner");
       }
   }

        // Подключаем вид
   require_once(ROOT . '/views/admin_banner/create.php');
   return true;
}


    /**
     * Action для страницы "Редактировать банер"
     */
    public function actionUpdate($id)
    {

          // Проверка доступа
        self::checkAdmin();


        // Получаем данные о конкретном банере
        $banner = Banner::getBannerById($id);

        // var_dump($banner);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            // $options['image'] = $_POST['image'];
            $options['url'] = $_POST['url'];
            $options['position'] = $_POST['position'];
            $options['status'] = $_POST['status'];


            // Сохраняем изменения
            if (Banner::updateBannerById($id, $options)) {



                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    $img =$_SERVER['DOCUMENT_ROOT'] . "/upload/images/banner/{$id}.jpg";


                     if(file_exists($img)) unlink($img); 

                   $foo = new Upload($_FILES['image']); 
                   if ($foo->uploaded) {
                        // save uploaded image with a new name,
   // resized to 100px wide
                       $foo->file_new_name_body = $id;
                       $foo->image_resize = true;
                         // $foo->image_convert = gif;
                       $foo->image_x = 400;
                       $foo->image_y = 320;
                       $foo->image_ratio_y = true;

                       $foo->Process($_SERVER['DOCUMENT_ROOT'] . "/upload/images/banner/");
                   }

                   //  // Если загружалось, переместим его в нужную папке, дадим новое имя
                   // move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/banner/{$id}.jpg");
               }
           }

            // Перенаправляем пользователя на страницу управлениями тасками
           header("Location: /admin/banner");
       }

        // Подключаем вид
       require_once(ROOT . '/views/admin_banner/update.php');
       return true;
   }

 /**
     * Action для страницы "Удалить таск"
     */
 public function actionDelete($id)
 {
          // Проверка доступа
    self::checkAdmin();
        // Обработка формы
    if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем таск
        Banner::deleteBannerById($id);

            // Перенаправляем пользователя на страницу управлениями тасками
        header("Location: /admin/banner");
    }

        // Подключаем вид
    require_once(ROOT . '/views/admin_banner/delete.php');
    return true;
}

}
