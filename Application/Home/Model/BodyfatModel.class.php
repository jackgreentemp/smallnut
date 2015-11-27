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
        array('age','require','必须！'),
        array('gender','require','必须！'),
        array('height','require','必须！'),
        array('weight','require','必须！'),
        array('bodyfat','require','必须！'),
        array('bmi','require','必须！')
    );


}
