<?php

date_default_timezone_set('Asia/Kolkata');
$time=date('H:i:s');
$th = date('H');
$tm = date('i');
$t=($th*60)+$tm;

$cid = $_POST['cid'];
$mail = $_POST['mail'];

$link = new mysqli('localhost', 'root', '','interview');
if(!$link) {
	echo '<script>alert("Unable to connect database")</script>';
}
else{
$sql = "SELECT * FROM participants WHERE cid='$cid' AND mail='$mail'";

if (mysqli_query($link, $sql)) {
	$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
	if($result['interview_status']==true){
		echo '<script>alert("You have already completed interview")</script>';
	}else{
	$sh=substr($result['starttime'],0,2);
	$sm=substr($result['starttime'],3,2);
	$s=($sh*60)+$sm;
	$eh=substr($result['endtime'],0,2);
	$em=substr($result['endtime'],3,2);
	$e=($eh*60)+$em;
	if($t>=$s && $t<=$e){
		$sql1="UPDATE participants SET interview_status = true WHERE cid='$cid' AND mail='$mail'";
		if (mysqli_query($link, $sql1)) {
			echo '<script>alert("Interview Started")</script>';
		}
		else{
			echo '<script>alert("error")</script>';
		}
	}
	else{
			echo '<script>alert("Your interview time is from '.$result['starttime'].'to'.$result['endtime'].'")</script>';
	}}
  mysqli_close($link);
}else {
  echo '<script>alert("'.mysqli_error($link).'")</script>';
  mysqli_close($link);
}
}
  include('home.php');
  exit();
?>