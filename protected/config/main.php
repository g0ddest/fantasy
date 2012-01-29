<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
   'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
   'name'=>'FANTASY',
   'language'=>'ru',
   //'defaultController'=>'',
   // preloading 'log' component
   'preload'=>array('db', 'log'),
   'import'=>array(
      'application.models.*',
      'application.components.*',
   ),

   'modules'=>array(
      'gii'=>array(
         'class'=>'system.gii.GiiModule',
         'password'=>'123',
          // If removed, Gii defaults to localhost only. Edit carefully to taste.
         //'ipFilters'=>array('127.0.0.1','::1'),
      ),
      'gb','api',
      
   ),

   // application components
   'components'=>array(
      'user'=>array(
         'allowAutoLogin'=>true,
      ),
      'session'=>array(
         'autoStart'=>false,
      ),
      'urlManager'=>array(
         'showScriptName' => false,
         'urlFormat'=>'path',
         'rules'=>array(
            'api/gb/id/<id:\d+>'=>'api/gb/id',
            '<controller:\w+>'=>'<controller>',
            '<controller:\w+>/<id:\d+>'=>'<controller>/view',
            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
         ),
      ),
      'db'=>array(
         'connectionString' => 'mysql:host=localhost;dbname=fantasy',
         'emulatePrepare' => true,
         'username' => 'root',
         'password' => '12qwerty34',
         'charset' => 'utf8',
         'tablePrefix'=>'tbl_',
         'enableProfiling'=>true,
         'enableParamLogging'=>true,
      ),
      'errorHandler'=>array(
            'errorAction'=>'site/error',
      ),
      'log'=>array(
          'class'=>'CLogRouter',
          'enabled'=>YII_DEBUG,
          'routes'=>array(
              array( 'class'=>'application.extensions.yii-debug-toolbar.YiiDebugToolbarRoute', ),
          ),
      ),
   ),

   // application-level parameters that can be accessed
   // using Yii::app()->params['paramName']
   'params'=>array(
      // this is used in contact page
      'adminEmail'=>'webmaster@example.com',
   ),
);
