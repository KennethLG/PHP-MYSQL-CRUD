<?php include("db.php"); ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4">

			<?php if (isset($_SESSION["message"])) { ?>
				<div class="alert alert-<?= $_SESSION['message_color'];?> alert-dismissible fade show" role="alert">
					<?= $_SESSION["message"] ?>
  					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php session_unset(); } ?>

			<div class="card card-body">
				<form action="saveTask.php" method="POST">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Task title" autofocus/>
					</div>
					<div class="form-group">
						<textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="save_task" value="Save task">
				</form>
			</div>
		</div>

		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Created at</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						$query = "SELECT * from task";
						$res = mysqli_query($conn, $query);
						while($row = mysqli_fetch_array($res)) { ?>

							<tr>
								<td><?php echo $row["Title"] ?></td>
								<td><?php echo $row["Description"] ?></td>
								<td><?php echo $row["Created_at"] ?></td>
								<td>
									<a class="btn btn-light" href="editTask.php?TaskId=<?php echo $row['TaskId'] ?>">
										Edit
									</a>
									<a class="btn btn-danger" href="deleteTask.php?TaskId=<?php echo $row['TaskId'] ?>">
										Delete
									</a>
								</td>
							</tr>

						<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include("includes/footer.php") ?>