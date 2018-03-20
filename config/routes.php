<?php
return array(

	//Tasks
	'tasks/page-([0-9]+)'=>'task/index/$1', 
	
	'tasks/update/([0-9]+)'=>'task/update/$1',
	'tasks/delete/([0-9]+)'=>'task/delete/$1',
	'tasks/create'=>'task/create', 
	'tasks'=>'task/index', 


	// 'admin'=>'admin/index',

	'admin/banner/update/([0-9]+)'=>'adminBanner/update/$1',
	'admin/banner/delete/([0-9]+)'=>'adminBanner/delete/$1',
	'admin/banner/create'=>'adminBanner/create',
	'admin/banner'=>'adminBanner/index',
	'admin'=>'admin/index',


	'cabinet'=>'cabinet/index',
	// 'banner'=>'cabinet/banner',

	'register'=>'user/register',
	'login'=>'user/login',
	'logout'=>'user/logout',

	// Главная страница
	'([0-9]+)' => 'site/view/$1', // actionView в SiteController

    'index.php' => 'site/index',
     '' => 'site/index', // actionIndex в SiteController


	);