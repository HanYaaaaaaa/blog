<?php
require_once('../../../../../wp-load.php');
require_once 'f2fpay/service/AlipayTradeService.php';

$sign = $_POST['sign'];
$signType = $_POST['sign_type'];
$total_fee= $_POST['total_amount'];
$out_trade_no = $wpdb->escape($_POST['out_trade_no']);
$trade_no = $wpdb->escape($_POST['trade_no']);
$buyer_logon_id = $wpdb->escape($_POST['buyer_logon_id']);
$status = $_POST['trade_status'];

ksort($_POST);
reset($_POST);
$signStr = '';
foreach ($_POST AS $key => $val) { 
    if ($val == '' || $key == 'sign' || $key == 'sign_type') continue;
    if ($signStr) $signStr .= '&';
    $signStr .= "$key=$val";
}
$signStr = str_replace('\"', '"', $signStr);
$res = "-----BEGIN PUBLIC KEY-----\n".wordwrap($config['alipay_public_key'], 64, "\n", true) ."\n-----END PUBLIC KEY-----";
$result = (bool)openssl_verify($signStr, base64_decode($sign), $res, OPENSSL_ALGO_SHA256);

if($result && $config['alipay_public_key']){

	if($status == 'TRADE_FINISHED' || $status == 'TRADE_SUCCESS') {

		global $wpdb, $wppay_table_name;
		if(strstr($out_trade_no,'wppay')){
			$order=$wpdb->get_row("select * from $wppay_table_name where order_num='".$out_trade_no."'");
			if($order){
				if(!$order->order_status){
					$wpdb->query("UPDATE $wppay_table_name SET order_status=1 WHERE order_num = '".$out_trade_no."'");

					$postUserId=get_post($order->post_id)->post_author;
					$ice_ali_money_author = get_option('ice_ali_money_author');
					if($ice_ali_money_author){
						addUserMoney($postUserId,$total_fee*get_option('ice_proportion_alipay')*$ice_ali_money_author/100);
					}elseif($ice_ali_money_author == '0'){

					}else{
						addUserMoney($postUserId,$total_fee*get_option('ice_proportion_alipay'));
					}

					if($order->user_id){
						$data=get_post_meta($order->post_id, 'down_url', true);
						$ppost = get_post($order->post_id);
						erphpAddDownloadByUid($ppost->post_title,$order->post_id,$order->user_id,$total_fee*get_option('ice_proportion_alipay'),1,'',$ppost->post_author);
					}
				}
			}
		}else{
			epd_set_order_success($out_trade_no,$total_fee,'alipay');
		}

	    echo "success";
	}

}else{
	echo 'error';
}