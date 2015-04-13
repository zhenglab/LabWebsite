<?php
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
	'DEFAULT_MODULE'       =>    'Home',
	'DATA_AUTH_KEY' => '!!!!!!@@@#@@@sdasdfasdfdfdf', //默认数据加密KEY
	'UC_AUTH_KEY' => '!!!!!!@@@#@@@sdasdfasdfdfdf', //默认数据加密KEY
	/* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'cv_db', // 数据库名
    'DB_USER'   => 'username', // 用户名
    'DB_PWD'    => 'password',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'cv_', // 数据库表前缀
);
