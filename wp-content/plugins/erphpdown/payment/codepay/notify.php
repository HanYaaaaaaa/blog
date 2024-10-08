<?php
require_once('../../../../../wp-load.php');
ksort($_POST); //排序post参数
reset($_POST); //内部指针指向数组中的第一个元素
$codepay_key=get_option('erphpdown_codepay_appsecret'); //这是您的密钥
if($codepay_key){
	$sign = '';//初始化
	foreach ($_POST AS $key => $val) { //遍历POST参数
	    if ($val == '' || $key == 'sign') continue; //跳过这些不签名
	    if ($sign) $sign .= '&'; //第一个字符串签名不加& 其他加&连接起来参数
	    $sign .= "$key=$val"; //拼接为url参数形式
	}
	if (!$_POST['pay_no'] || md5($sign . $codepay_key) != $_POST['sign']) { //不合法的数据
	    exit('fail');  //返回失败 继续补单
	} else { //合法的数据
	    //业务处理
	    $pay_id = $_POST['pay_id']; //需要充值的ID 或订单号 或用户名
	    $money = (float)$_POST['money']; //实际付款金额
	    $total_fee = (float)$_POST['price']; //订单的原价
	    $param = $_POST['param']; //自定义参数
	    $pay_no = $_POST['pay_no']; //流水号
	    $type =  $_POST['type'];
	    $payment = 'alipay';
	    if($type == '2'){
	        $payment = 'qqpay';
	    }elseif($type == '3'){
	        $payment = 'wxpay';
	    }

	    epd_set_order_success($pay_id,$total_fee,$payment);

	    exit('success'); //返回成功 不要删除哦
	}
}