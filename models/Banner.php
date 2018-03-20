<?php

class Banner
{
    /**
     * Возвращает список тасков 
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с тасками</p>
     */
    public static function getBannerList()
    {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name,  url, status, position FROM banner '
        . 'ORDER BY position ASC ';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $banner = array();
        while ($row = $result->fetch()) {
            $banner[$i]['id'] = $row['id'];
            $banner[$i]['name'] = $row['name'];
            // $banner[$i]['image'] = $row['image'];
            $banner[$i]['url'] = $row['url'];
            $banner[$i]['status'] = $row['status'];
            $banner[$i]['position'] = $row['position'];
            $i++;
        }
        return $banner;
    }

       /**
     * Возвращает текстое пояснение статуса для категории :<br/>
     * <i>0 - Скрыта, 1 - Отображается</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
       public static function getStatusText($status)
       {
        switch ($status) {
            case '1':
            return 'Отображается';
            break;
            case '0':
            return 'Скрыта';
            break;
        }
    }


    /**
     * Добавляет новый банер
     * @param string $name <p>Название</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createBanner($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO banner (name,  url ,status, position) '
        . 'VALUES (:name, :url, :status, :position)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        // $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':url', $options['url'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':position', $options['position'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function getBannerById($id){

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM banner WHERE id = :id';

           // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }


    /**
     * Редактирование банера с заданным id
     */
    public static function updateBannerById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE banner
        SET 
        name = :name,  
        url = :url, 
        position = :position, 
        status = :status
        WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        // $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':url', $options['url'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':position', $options['position'], PDO::PARAM_INT);
        return $result->execute();
    }


    /**
     * Удаляет баннер с указанным id
     * @param integer $id <p>id баннера</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteBannerById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM banner WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    // public static function resize_image($file, $w, $h, $crop=FALSE) {
    //     list($width, $height) = getimagesize($file);
    //     $r = $width / $height;
    //     if ($crop) {
    //         if ($width > $height) {
    //             $width = ceil($width-($width*abs($r-$w/$h)));
    //         } else {
    //             $height = ceil($height-($height*abs($r-$w/$h)));
    //         }
    //         $newwidth = $w;
    //         $newheight = $h;
    //     } else {
    //         if ($w/$h > $r) {
    //             $newwidth = $h*$r;
    //             $newheight = $h;
    //         } else {
    //             $newheight = $w/$r;
    //             $newwidth = $w;
    //         }
    //     }
    //     $src = imagecreatefromjpeg($file);
    //     $dst = imagecreatetruecolor($newwidth, $newheight);
    //     imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    //     return $dst;
    // }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/banner/';

        // Путь к изображению товара
        $pathToTaskImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToTaskImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара

            


            // return $pathToTaskImage;
            return $pathToTaskImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }



}