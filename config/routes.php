<?php
return array(


	'register'=>'user/register',



	// Главная страница
	'([0-9]+)' => 'site/view/$1', // actionView в SiteController

    'index.php' => 'site/index',
     '' => 'site/index', // actionIndex в SiteController


	);