<?php
	include("db.php");
	if (isset($_GET["TaskId"])) {
		$id = $_GET["TaskId"];
		$query = "delete from task where TaskId = '$id'";
		$res = mysqli_query($conn, $query);
		if (!$res) {
			die("Query failed");
		}
		$_SESSION["message"] ="Task deleted";
		$_SESSION["message_color"] = "danger";
		header("Location: index.php");
	}
?>