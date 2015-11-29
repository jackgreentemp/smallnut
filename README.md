###  简介
基于ThinkPHP的Rest API示例
本例测试时使用了Chrome浏览器插件Advanced REST client模拟get, post, put, delete请求
ThinkPHP对Rest支持不是很好，需要结合路由、RestController一起完成
读之前需要了解thinkphp、rest基本知识

### 步骤

- 修改/Application/Common/Conf/config.php文件，增加以下路由规则：


    <?php
    return array(
    	//'配置项'=>'配置值'
        'URL_MODEL'=>1, // 如果你的环境不支持PATHINFO 请设置为3
        'DB_TYPE'=>'mysql',
        'DB_HOST'=>'localhost',
        'DB_NAME'=>'smallnut',
        'DB_USER'=>'root',
        'DB_PWD'=>'123',
        'DB_PORT'=>'3306',
        'DB_PREFIX'=>'',

        'URL_ROUTER_ON'   => true,
        'URL_ROUTE_RULES'=>array(
            array('bodyfat/:id','bodyfat/read','',array('method'=>'get')),
            array('bodyfat','bodyfat/create','',array('method'=>'post')),
            array('bodyfat/:id','bodyfat/update','',array('method'=>'put')),
            array('bodyfat/:id','bodyfat/delete','',array('method'=>'delete')),
        )
    );
- 新增Controller，代码如下
```php
<?php
namespace Home\Controller;
use Think\Controller\RestController;
class BodyfatController extends RestController {

    protected $allowMethod = array('get', 'post', 'put', 'delete'); // REST允许的请求类型列表
    protected $defaultType = 'json';
```
- 在上述的控制器中新增read, create, update, delete四个方法，编写对应的逻辑，