<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;

class BodyfatModel extends Model{
    protected $trueTableName = 'activity_bodyfat';
    /**
	 * 模型自动完成
	 * @var array
	 */
	protected $_auto = array(
		// array('createtime', NOW_TIME, self::MODEL_INSERT),
	);

    protected $_validate = array(
        array('age','require','年龄必须！'),
        array('gender','require','性别必须！'),
        array('height','require','身高必须！'),
        array('weight','require','体重必须！'),
        array('bodyfat','require','体脂率必须！'),
        array('bmi','require','bmi必须！')
    );


}
