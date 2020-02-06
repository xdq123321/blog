<?php
	include './conn.php';
	header("Content-type:application/json;charset=utf8");
	$val=isset($_GET['q'])?trim($_GET['q']):'';
	$sql="update article set article_watch=article_watch+1 where article_id={$val}";
	$rst=mysqli_query($link, $sql);
	$res=array();
	if(!empty($val)){
		if($rst && mysqli_affected_rows($rst)>=0){
		$sele="select article_watch from article where article_id={$val}";
		$sele_res=mysqli_query($link, $sele);
		if($sele_res && mysqli_num_rows($sele_res)>0){
		while($row=mysqli_fetch_assoc($sele_res)){	
			$res=array(
			"result"=>$row
			);
		}

		echo(json_encode($res,JSON_UNESCAPED_UNICODE));
		}
	}
	}
	
?>