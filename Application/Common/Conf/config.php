<?php
return array(
	//'配置项'=>'配置值'
    'URL_MODEL'=>1, // 如果你的环境不支持PATHINFO 请设置为3
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_NAME'=>'smallnut',
    'DB_USER'=>'root',
    // 'DB_PWD'=>'4a8477453a',
    'DB_PWD'=>'123',
    'DB_PORT'=>'3306',
    'DB_PREFIX'=>'',

    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        array('bodyfat/:id','bodyfat/read','',array('method'=>'get')),
        array('bodyfat','bodyfat/create','',array('method'=>'post')),
        array('bodyfat/:id','bodyfat/update','',array('method'=>'put')),
        array('bodyfat/:id','bodyfat/delete','',array('method'=>'delete')),
        array('weixin','weixin/getJsPackage','',array('method'=>'get')),
    )
);