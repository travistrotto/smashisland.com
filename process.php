<?php
/*
	* Smash Island Tournaments Events Page
	* - Table of Upcoming and Past Events
	* @author Travis Trotto
*/

/*	Web Hosted Database 
$mysqli = new mysqli('sql102.epizy.com','epiz_28746526','yau58yvYfM','epiz_28746526_crud') or die(mysqli_error($mysqli));
*/

/* Local Hosted Database */
$mysqli = new mysqli('localhost', 'root', 'uY2@b*', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$name = '';
$link = '';
$date = '';
$winners = '';
$update = false;

//	Query
if(isset($_POST['save'])){
	$name = $_POST['name'];
	$link = $_POST['link'];
	$date = $_POST['date'];
	$winners = $_POST['winners'];

	$mysqli->query("INSERT INTO data (name, link, date, winners) VALUES('$name', '$link', '$date', '$winners')") or die($mysqli->error);

	header("location: admin.php");

}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

	header("location: admin.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
	if 	($result->num_rows){
			$row = $result->fetch_array();
			$name = $row['name'];
			$link = $row['link'];
			$date = $row['date'];
			$winners = $row['winners'];
		}


}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$link = $_POST['link'];
	$date = $_POST['date'];
	$winners = $_POST['winners'];

	$mysqli->query("UPDATE data SET name='$name', link='$link', date='$date', winners='$winners' WHERE id=$id") or die($mysqli->error);

	header("location: admin.php");
}

?>
