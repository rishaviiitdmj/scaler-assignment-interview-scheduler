<?php

$link = new mysqli('localhost', 'root', '','interview');
if(!$link) {
echo '<h4><center>Unable to connect to server.<br>'.mysql_error().'</center></h4>';
}
date_default_timezone_set('Asia/Kolkata');
$dt=date('Y-m-d');
$query ="SELECT * FROM interviews where doi<'$dt' ORDER BY doi DESC";
$result = mysqli_query($link, $query);

echo'<center><h1>Interview Scheduler</h1>
<h2> <a href="joininterview.php">Join Interview</a><br>
<a href="home.php">Upcoming Interview</a><br>
<a href="scheduleinterview.html">Schedule Interview</a></h2><br>
<h3><center>Past Interviews<br></h3>';
while($row = mysqli_fetch_assoc($result)) {
    echo "<div><br>Company Name: " . $row["name"]. "<br>CTC: " . $row["ctc"]. "<br>Description: ".$row["description"].
	"<br>Created on: ".$row["createdon"]."<br>Date of Interview ".$row["doi"]."<br><br></div>";
  }

mysqli_close($link);
?>
