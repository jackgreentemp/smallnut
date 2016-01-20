<?php
namespace Home\Controller;
use Think\Controller\RestController;

class PlanController extends RestController {

    protected $allowMethod = array('get', 'post', 'put', 'delete'); // REST允许的请求类型列表
    protected $defaultType = 'json';

    public function getPlans($grade)
    {
        $result = array(
            "pics" => array("http://www.aiketour.com/uploads/arcimgs/140324035631_030506_pz7cjpfw5vgg.jpg", "http://www.gichen.com/upload/jd/20110324/11543139.jpg", "http://images3.ctrip.com/wri/images/200912/_CS18000626761011144005734.jpg")
        );
        echo json_encode($result);
    }
}

