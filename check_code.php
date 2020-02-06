<?php
session_start();
include 'conn.php';
$code=strtolower($_GET['code']);
$res=array();
if($code!=$_SESSION['vcode']){
				$res=array(
			"result"=>"res_false"
				);
			}else{
				$res=array(
			"result"=>"res_true"
				);
			}
echo(json_encode($res,JSON_UNESCAPED_UNICODE));
?>