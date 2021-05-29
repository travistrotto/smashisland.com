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


//	Query
if(isset($_POST['save'])){
	$name = $_POST['name'];
	$link = $_POST['link'];
	$date = $_POST['date'];
	$winners = $_POST['winners'];


	$mysqli->query("INSERT INTO data (name, link, date, winners) VALUES('$name', '$link', '$date', '$winners')") or die($mysqli->error);
}

?>