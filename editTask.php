<?php

	include("db.php");
	if (isset($_GET["TaskId"])) {
		$id = $_GET["TaskId"];
		$query = "select * from task where TaskId = '$id'";
		$res = mysqli_query($conn, $query);
		if (mysqli_num_rows($res) == 1) {
			$row = mysqli_fetch_array($res);
			$description = $row["Description"];
			$title = $row["Title"];
		}
	}

	if (isset($_POST["update"])) {
		$id = $_GET["TaskId"];
		$title = $_POST["title"];
		$description = $_POST["description"];

		$query = "update task set Title = '$title', Description = '$description' where TaskId = '$id'";
		mysqli_query($conn, $query);

		$_SESSION["message"] = "Task updated";
		$_SESSION["message_color"] = "success";

		header("Location: index.php");
	}

?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="editTask.php?TaskId=<?php echo $_GET["TaskId"]; ?>" method="POST">
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="update title">
					</div>
					<div class="form-group">
						<textarea rows="2" name="description" class="form-control" placeholder="update title" class="form-control" placeholder="Update description"><?php echo $description;?></textarea>
					</div>
					<button class="btn btn-success" name="update">
						Update
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include("includes/footer.php"); ?>