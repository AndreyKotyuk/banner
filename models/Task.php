<?php

class Task
{

    // Количество отображаемых тасков по умолчанию
    const SHOW_BY_DEFAULT = 3;



    /**
     * Возвращает таск с указанным id
     * @param integer $id <p>id таска</p>
     * @return array <p>Массив с информацией о таске</p>
     */
    public static function getTaskById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM tasks WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    /**
     * Возвращаем количество тасков 
     * @return integer
     */
    public static function getTotalTasks()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
          $sql = 'SELECT count(id) AS count FROM tasks';;

        // Используется подготовленный запрос
        $result = $db->prepare($sql);


        // Выполнение команды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

     /**
     * Возвращает список тасков 
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с тасками</p>
     */
    public static function getTasksList($page = 1, $order = '')
    {
        $limit = Task::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, email, description, status FROM tasks '
                . 'ORDER BY '.$order.' ASC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        // $result->bindParam(':order', $order, PDO::PARAM_STR);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $tasks = array();
        while ($row = $result->fetch()) {
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['name'] = $row['name'];
            $tasks[$i]['email'] = $row['email'];
            $tasks[$i]['description'] = $row['description'];
            $tasks[$i]['status'] = $row['status'];
            $i++;
        }
        return $tasks;
    }


    /**
     * Удаляет таск с указанным id
     * @param integer $id <p>id таска</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteTaskById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM tasks WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует таск с заданным id
     * @param integer $id <p>id таск</p>
     * @param array $options <p>Массив с информацей о таск</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateTaskById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE tasks
            SET 
                name = :name, 
                email = :email, 
                description = :description,  
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Добавляет новый таск
     * @param array $options <p>Массив с информацией о таск</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createTask($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO tasks '
                . '(name, email, description, status)'
                . 'VALUES '
                . '(:name,:email, :description,:status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);      
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR); 
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

   
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
        $path = '/upload/images/tasks/';

        // Путь к изображению товара
        $pathToTaskImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToTaskImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToTaskImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

   
}
