<?php
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
      
        // Получаем список товаров
        $bannerList = Banner::getBannerList();
    	
    	 // Подключаем вид
        require_once(ROOT . '/views/blog/index.php');
        return true;
    }

      public function actionView($id)
    {
    	var_dump(gd_info());
    	return true;
    }
    //    public function actionView($id)
    // {
    //     echo "вид страницы под номером $id";
    //     return true;
    // }
}