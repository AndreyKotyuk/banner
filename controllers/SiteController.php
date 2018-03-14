<?php
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
    	echo "Главный вид страницы";
    	 // Подключаем вид
        require_once(ROOT . '/views/blog/index.php');
        return true;
    }

      public function actionView($id)
    {
    	echo "вид страницы под номером $id";
    	return true;
    }
}