<?php
include './conn.php';
	header("Content-type:application/json;charset=utf8");
	$val=isset($_GET['id'])?trim($_GET['id']):'';
	$imgg=isset($_GET['face'])?trim($_GET['face']):'';
	$sql="update article_details set {$imgg}={$imgg}+1 where details_id={$val}";
	$rst=mysqli_query($link, $sql);
	$res=array();
	if(!empty($val)){
		if($rst && mysqli_affected_rows($rst)>=0){
		$sele="select {$imgg} from article_details where details_id={$val}";
		$sele_res=mysqli_query($link, $sele);
		if($sele_res && mysqli_num_rows($sele_res)>0){
		while($row=mysqli_fetch_assoc($sele_res)){	
			$res=array(
			"result"=>$row[$imgg]
			);
		}

		echo(json_encode($res,JSON_UNESCAPED_UNICODE));
		}
	}
	}
	
?>