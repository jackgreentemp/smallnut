###  简介
- 基于ThinkPHP的Rest API示例
- 本例测试时使用了Chrome浏览器插件Advanced REST client模拟get, post, put, delete请求
- ThinkPHP对Rest支持不是很好，需要结合路由、RestController一起完成
- 需要了解thinkphp、rest基本知识

###  背景
- 最近在学习Backbone，Backbone数据模型与服务器同步数据默认使用Rest方式，之前没有用过Rest方式的接口，借此机会学习了一些相关的知识
- 后台最熟悉的还是thinkphp，但是网上鲜有thinkphp rest方式的例子，练手时遇到好多坑，最后总算调通了想要的功能

### 步骤

- 修改/Application/Common/Conf/config.php文件，增加以下路由规则，这一步至关重要，一开始不想用路由，想按照官方文档中的自动调用方式实现，但是总是请求不到相应的模块，最终使用路由和RestController配合完成。
```php
'URL_ROUTER_ON'   => true,
'URL_ROUTE_RULES'=>array(
	array('bodyfat/:id','bodyfat/read','',array('method'=>'get')),
	array('bodyfat','bodyfat/create','',array('method'=>'post')),
	array('bodyfat/:id','bodyfat/update','',array('method'=>'put')),
	array('bodyfat/:id','bodyfat/delete','',array('method'=>'delete')),
)
```
路由规则数组，数组的第一个元素是url的正则表达式，第二个元素是指向的模块路径，第三个是请求方法的限制。
- 新增Controller，代码如下
```php
<?php
namespace Home\Controller;
use Think\Controller\RestController;
class BodyfatController extends RestController {

    protected $allowMethod = array('get', 'post', 'put', 'delete'); // REST允许的请求类型列表
    protected $defaultType = 'json';
```
- 在上述的控制器中新增read, create, update, delete四个方法，编写对应的逻辑

### 注意事项
- 当使用Content-Type为application/json格式post数据时，需要使用以下方式来获取客户端提交的数据
```php
$inputs = json_decode($GLOBALS['HTTP_RAW_POST_DATA'], true);
```