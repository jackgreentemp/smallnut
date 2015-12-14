<?php
namespace Home\Controller;
use Think\Controller\RestController;
use Home\Api\WeixinApi;

class WeixinController extends RestController {

    protected $allowMethod = array('get', 'post', 'put', 'delete'); // REST允许的请求类型列表
    protected $defaultType = 'json';

    private $weixinApi;

    public function _initialize()
    {
        $this->weixinApi = new WeixinApi(C('appId'), C('appSecret'));
    }

    public function getJsPackage($id)
    {
        $result = $this->weixinApi->getSignPackage($id);

//        {
//        "appId": ""
//        "nonceStr": "Kjp3UI9BC7oxRwlh"
//        "timestamp": 1449742353
//        "url": "http://localhost/smallnut/Weixin/getJsPackage"
//        "signature": "66a91180f6ed03e4fa0c8aee7c5d53981f75fb5a"
//        "rawString": "jsapi_ticket=&noncestr=Kjp3UI9BC7oxRwlh&timestamp=1449742353&url=http://localhost/smallnut/Weixin/getJsPackage"
//        }

        echo json_encode($result);
    }

    public function postJsPackage()
    {
        $inputs = json_decode($GLOBALS['HTTP_RAW_POST_DATA'], true);
        $result = $this->weixinApi->getSignPackage($inputs['url']);
        echo json_encode($result);
    }


}

