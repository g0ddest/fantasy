<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
Yii::SetPathofAlias('my_models', '/var/www/fantasy/protected/models');
Yii::SetPathofAlias('gb_models', '/var/www/fantasy/protected/modules/gb/models');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	'import'=>array(
		'my_models.*','gb_models.*',
	),
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=fantasy',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '12qwerty34',
			'charset' => 'utf8',
         'tablePrefix'=>'tbl_',
		),
	),
);
