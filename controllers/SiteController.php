<?php
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
    	echo "Главный вид страницы";
    	return true;
    }

      public function actionView($id)
    {
    	echo "вид страницы под номером $id";
    	return true;
    }
}