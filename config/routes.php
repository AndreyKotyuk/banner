<?php
return array(

	'cabinet'=>'cabinet/index',
	'register'=>'user/register',
	'login'=>'user/login',
	'logout'=>'user/logout',

	// Главная страница
	'([0-9]+)' => 'site/view/$1', // actionView в SiteController

    'index.php' => 'site/index',
     '' => 'site/index', // actionIndex в SiteController


	);