<?php
namespace Home\Controller;
use Think\Controller\RestController;
class BodyfatController extends RestController {

    protected $allowMethod = array('get', 'post', 'put', 'delete'); // REST允许的请求类型列表
    protected $defaultType = 'json';

    public function insert2Db($age, $gender, $height, $weight, $bodyfat, $bmi){
        $preDataArray = array(
            'age' => $age,
            'gender' => $gender,
            'height' => $height,
            'weight' => $weight,
            'bodyfat' => $bodyfat,
            'bmi' => $bmi,
            'createtime' => date('Y-m-d H:i:s')
        );
        $dataModel = D('Bodyfat');
        $result = $dataModel->data($preDataArray)->add();
        if($result) {
            echo json_encode(array(
                "status" => "success",
                "id" => $result
            ));
        } else {
            echo json_encode(array(
                "status" => "failure",
            ));
        }
    }

    public function read($id) {
        $dataModel = D('Bodyfat');
        $condition['id'] = $id;
        $result = $dataModel->where($condition)->find();
//        if(false === $result) {
//            echo json_encode(array(
//                "status" => "failure",
//                "error" => $dataModel->getDbError()
//            ));
//        } else if(null === $result) {
//            echo json_encode(array(
//                "status" => "failure",
//                "error" => "数据不存在"
//            ));
//        } else {
//            echo json_encode(array(
//                "status" => "success",
//                "data" => $result
//            ));
//        }
        echo $this->responseFactory("read", $dataModel, $result, "数据不存在");
    }

    /*新建数据记录*/
//    public function create($age, $gender, $height, $weight, $bodyfat, $bmi){
    public function create(){
        $inputs = json_decode($GLOBALS['HTTP_RAW_POST_DATA'], true);//backbone使用application/json，必须使用$GLOBALS['HTTP_RAW_POST_DATA']来接收数据

        $age = $inputs['age'];
        $gender = $inputs['gender'];
        $height = $inputs['height'];
        $weight = $inputs['weight'];
        $bodyfat = $inputs['bodyfat'];
        $bmi = $inputs['bmi'];

        $preDataArray = array(
            'age' => $age,
            'gender' => $gender,
            'height' => $height,
            'weight' => $weight,
            'bodyfat' => $bodyfat,
            'bmi' => $bmi,
            'createtime' => date('Y-m-d H:i:s')
        );
        $dataModel = D('Bodyfat');
        if (!$dataModel->create($preDataArray)){
            echo json_encode(array(
                "status" => "failure",
                "error" => $dataModel->getError()
            ));
        } else {
            $result = $dataModel->add();
        }
//        $result = $dataModel->data($preDataArray)->add();
//        if($result) {
//            echo json_encode(array(
//                "status" => "success",
//                "id" => $result
//            ));
//        } else {
//            echo json_encode(array(
//                "status" => "failure",
//            ));
//        }
        echo $this->responseFactory("create", $dataModel, $result, "");
    }

    public function update() {
//        echo json_encode(array(
//            "status" => "success",
//            "data" => I('put.'),//使用I('put.')获取put来的数据
//            "type" => $this->_type
//        ));
    }

    public function delete($id) {
        $dataModel = D('Bodyfat');
        $condition['id'] = $id;
        $result = $dataModel->where($condition)->delete();
//        if(false === $result) {
//            echo json_encode(array(
//                "status" => "failure",
//                "error" => $dataModel->getDbError()
//            ));
//        } else if(0 === $result) {
//            echo json_encode(array(
//                "status" => "failure",
//                "error" => "数据不存在"
//            ));
//        } else {
//            echo json_encode(array(
//                "status" => "success"
//            ));
//        }
        echo $this->responseFactory("delete", $dataModel, $result, "数据不存在");
    }

    public function responseFactory($action, $dataModel, $result, $error) {
        switch($action) {
            case 'create':
                if($result) {
                    return json_encode(array(
                        "status" => "success",
                        "id" => $result
                    ));
                } else {
                    return json_encode(array(
                        "status" => "failure",
                        "error" => $dataModel->getDbError()
                    ));
                }
                break;
            case 'read':
                if(false === $result) {
                    return json_encode(array(
                        "status" => "failure",
                        "error" => $dataModel->getDbError()
                    ));
                } else if(null === $result) {
                    return json_encode(array(
                        "status" => "failure",
                        "error" => $error
                    ));
                } else {
                    return json_encode(array(
                        "status" => "success",
                        "data" => $result
                    ));
                }
                break;
            case "delete":
                if(false === $result) {
                    return json_encode(array(
                        "status" => "failure",
                        "error" => $dataModel->getDbError()
                    ));
                } else if(0 === $result) {
                    return json_encode(array(
                        "status" => "failure",
                        "error" => $error
                    ));
                } else {
                    return json_encode(array(
                        "status" => "success"
                    ));
                }
                break;
        }
    }
}