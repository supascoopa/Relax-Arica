<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
$Online = false;
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$db = null;
if($Online){ // Si el sitio está Online
	$db = array(
			'connectionString' => 'mysql:host=localhost;dbname=relaxari_bd',
			'emulatePrepare' => true,
			'username' => 'relaxari_root',
			'password' => 'r314x4r1c4',
			'charset' => 'utf8',
		);
}
else {
	$db = array(
			'connectionString' => 'mysql:host=localhost;dbname=relaxarica',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		);
}

return array(
	'theme'=>'bootstrap',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Relax Arica 2014',
	'language'=>'es',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
	),

	'modules'=>array(
		'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
						'bootstrap.gii',)
		),
		
	),

	// application components
	'components'=>array(
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
	        ),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'WebUser',
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
		'db'=>$db,
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
            'class' => 'CFileLogRoute',
            'levels' => 'trace, info, error, warning, vardump',
        ),
        // uncomment the following to show log messages on web pages
        array(
            'class' => 'CWebLogRoute',
            'enabled' => YII_DEBUG,
            'levels' => 'error, warning, trace, notice',
            'categories' => 'application',
            'showInFireBug' => false,
        ),),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);