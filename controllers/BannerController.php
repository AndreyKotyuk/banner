<?php

/**
 * Контроллер BannerController
 
 */
class BannerController
{
    /**
     * Action для страницы "Banner"
     */
    public function actionIndex()
    {
       // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $bannerList = Banner::getBannerList();

         // Подключаем вид
        require_once(ROOT . '/views/banner/index.php');
        return true;

    }

// public function actionCreate()
// {

//         // Обработка формы
//     if (isset($_POST['submit'])) {
//             // Если форма отправлена
//             // Получаем данные из формы
//         $options['name'] = $_POST['name'];
//         $options['email'] = $_POST['email'];
//         $options['description'] = $_POST['description'];
//         $options['status'] = $_POST['status'];



//             // Флаг ошибок в форме
//         $errors = false;

//             // При необходимости можно валидировать значения нужным образом
//         if (!isset($options['name']) || empty($options['name'])) {
//             $errors[] = 'Заполните поля';
//         }

//         if ($errors == false) {
//                 // Если ошибок нет
//                 // Добавляем новый тacк
//             $id = Task::createTask($options);

//                 // Если запись добавлена
//             if ($id) {
//                     // echo '<pre>';print_r($_FILES["image"]);die();
//                     // Проверим, загружалось ли через форму изображение
//                 if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

//                         // Если загружалось, переместим его в нужную папке, дадим новое имя

//                     if(!move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/tasks/{$id}.jpg"))
//                         return array('error' => 'При загрузке возникли ошибки. Попробуйте ещё раз.');
//                 }

//             };

//                 // Перенаправляем пользователя на страницу управлениями тасками
//             header("Location: /tasks");
//         }
//     }

//         // Подключаем вид
//     require_once(ROOT . '/views/task/create.php');
//     return true;
// }
// /**
//      * Action для страницы "Редактировать таск"
//      */
// public function actionUpdate($id)
// {

//     $userId = User::checkLogged();

//         // Получаем данные о конкретном таске
//     $task = Task::getTaskById($id);

//         // Обработка формы
//     if (isset($_POST['submit'])) {
//             // Если форма отправлена
//             // Получаем данные из формы редактирования. При необходимости можно валидировать значения
//         $options['name'] = $_POST['name'];
//         $options['email'] = $_POST['email'];
//         $options['description'] = $_POST['description'];
//         $options['status'] = $_POST['status'];

//             // Сохраняем изменения
//         if (Task::updateTaskById($id, $options)) {


//                 // Если запись сохранена
//                 // Проверим, загружалось ли через форму изображение
//             if (is_uploaded_file($_FILES["image"]["tmp_name"])) {


//                     // Если загружалось, переместим его в нужную папке, дадим новое имя
//                move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/tasks/{$id}.jpg");
//            }
//        }

//             // Перенаправляем пользователя на страницу управлениями тасками
//        header("Location: /tasks");
//    }

//         // Подключаем вид
//    require_once(ROOT . '/views/task/update.php');
//    return true;
// }

//     /**
//      * Action для страницы "Удалить таск"
//      */
//     public function actionDelete($id)
//     {

//         $userId = User::checkLogged();
//         // Обработка формы
//         if (isset($_POST['submit'])) {
//             // Если форма отправлена
//             // Удаляем таск
//             Task::deleteTaskById($id);

//             // Перенаправляем пользователя на страницу управлениями тасками
//             header("Location: /tasks");
//         }

//         // Подключаем вид
//         require_once(ROOT . '/views/task/delete.php');
//         return true;
//     }

}
