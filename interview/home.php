<link rel="stylesheet" href="main.css">
<script>

	var modal = document.getElementById('id01');

	window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
		}
	}
</script>

<?php

$link = new mysqli('localhost', 'root', '','interview');
if(!$link) {
echo '<h4><center>Unable to connect to server.<br>'.mysql_error().'</center></h4>';
}
$dt=date('Y-m-d');
$query ="SELECT * FROM interviews where doi>='$dt' ORDER BY doi";
$result = mysqli_query($link, $query);

echo'<center><h1>Interview Scheduler</h1>
<h2> <a href="pastinterview.php">Past Interview</a><br>
<a href="scheduleinterview.html">Schedule Interview</a></h2><br>
<h3>Upcoming Interviews<br></h3>';
while($row = mysqli_fetch_assoc($result)) {
    echo "<div><br>Company Name: " . $row["name"]. "<br>CTC: " . $row["ctc"]. "<br>Description: ".$row["description"].
	"<br>Created on: ".$row["createdon"]."<br>Date of Interview ".$row["doi"]."<br><br></div>";
	if($dt<$row["doi"]){
	?>

<button onclick="document.getElementById('id01').style.display='block'">Add Partipants</button>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate"  method="post" action="addnew.php">
     <?php echo '<input type="number" name="cid" value="'.$row["cid"].'" required><br>'?>
     Your Name:- <input type="text" name="name" required><br>
	 Email:- <input type="email" name="mail" required><br>
     College Name:- <input type="text" name="college" required><br>
     CPI/CGPA(UG):- <input type="number" min="6" max="10" name="cpi" required><br>
     Start Time:- <input type="time" name="starttime" required><br>
	 End Time:- <input type="time" name="endtime" required><br>
	<input type="submit" value="Add"><br>
     <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
  </form>
</div>


<?php
	}
	else if($dt==$row["doi"]){
	
		?>
		
<button onclick="document.getElementById('id01').style.display='block'">Join Interview</button>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"class="close" title="Close Modal">&times;</span>
  <form class="modal-content animate" action="join.php" method="post">
     <?php echo '<input type="hidden" name="cid" value="'.$row["cid"].'"required><br>'?>
	 Email:- <input type="email" name="mail" required><br>
	<input type="submit" value="Join"><br>
     <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
  </form>
</div>
	
<?php	
	}
  }

mysqli_close($link);
?>