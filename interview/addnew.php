<?php

$cid= $_POST['cid'];
$name= isset($_POST['name']) ? $_POST['name'] : '';
$mail= isset($_POST['mail']) ? $_POST['mail'] : '';
$college= isset($_POST['college']) ? $_POST['college'] : '';
$cpi= isset($_POST['cpi']) ? $_POST['cpi'] : '';
$starttime= isset($_POST['starttime']) ? $_POST['starttime'] : '';
$endtime= isset($_POST['endtime']) ? $_POST['endtime'] : '';

//if($cid && $name && $mail && $ten && $twelve && $college && $cpi && $starttime && $endtime){
$link = new mysqli('localhost', 'root', '','interview');
if(!$link) {
  echo '<script>alert("Unable to connect to Database")</script>';
}

else{
	if($starttime>=$endtime){
		echo '<script>alert("Starttime shout be before end time")</script>';
	}
	else{
		$sql = "INSERT INTO participants(cid, name,mail,college,cpi,starttime,endtime)
		VALUES ('$cid', '$name', '$mail', '$college', '$cpi', '$starttime', '$endtime')";
		if (mysqli_query($link, $sql)) {
			echo '<script>alert("Participants Added")</script>';
		} else {
			echo '<script>alert("Email already exists")</script>';
		}
		mysqli_close($link);
	}
}


  include('home.php');
  exit();
?>