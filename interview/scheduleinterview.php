<?php

$id= $_POST['id'];
$name = $_POST['name'];
$ctc = $_POST['ctc'];
$description = $_POST['description'];
$date = $_POST['doi'];

$link = new mysqli('localhost', 'root', '','interview');
if(!$link) {
  echo '<script>alert("Unable to connect to Database")</script>';
  include('scheduleinterview.html');
  exit();
}

else{
$sql = "INSERT INTO interviews (cid, name, ctc, description, doi)
VALUES ('$id', '$name', '$ctc', '$description', '$date')";
if (mysqli_query($link, $sql)) {
  echo '<script>alert("Interview Scheduled")</script>';
  include('scheduleinterview.html');
  exit();
} else {
  echo '<script>alert("This passcode already exists")</script>';
  include('scheduleinterview.html');
  exit();
}
mysqli_close($link);
}
?>