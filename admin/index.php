<?php 
	include("../path.php"); 
	include(ROOT_PATH . "/app/database/db.php");
	include(ROOT_PATH . "/app/helpers/middleware.php");
	include(ROOT_PATH . "/app/controllers/users.php");
	include(ROOT_PATH . "/app/controllers/waec_users.php");
	include(ROOT_PATH . "/app/controllers/images.php");

	if (!isset($_SESSION['full_name'])) {
		header("location: " . BASE_URL . "login.php");
	} else {
		adminOnly();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Masterplan educational centre website">
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
		<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="../assets/lineawesome/css/line-awesome.css">
		<script src="assets/js/jquery-3.5.1.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>

    <title>Admin | Masterplan</title>
</head>
<body>

	<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<h2><a href="<?php echo (BASE_URL . "index.php"); ?>"><span class="la la-xing"></span><span>Masterplan</span></a></h2>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href="<?php echo (BASE_URL . "admin/index.php"); ?>" class="active"><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
				<li><a href="<?php echo (BASE_URL . "st/profile.php"); ?>"><span class="las la-user"></span> <span>Profile</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/users/index.php"); ?>"><span class="las la-users"></span> <span>Manage Students</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/gallery/index.php"); ?>"><span class="las la-image"></span> <span>Manage Gallery</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/gallery/add.php"); ?>"><span class="las la-folder-open"></span> <span>Add Image Category</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/images/index.php"); ?>"><span class="la la-images"></span> <span>Manage Images</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/images/add.php"); ?>"><span class="las la-door-open"></span> <span>Add Image</span></a></li>
				<!-- <li><a href="#"><span class="las la-wallet"></span> <span>View Receipts</span></a></li> -->
				<li><a href="<?php echo (BASE_URL . "/logout.php"); ?>"><span class="la la-sign-out"></span> <span>Logout</span></a></li>
			</ul>
		</div>
	</div>

	<div class="main-content">
		<header>
			<h2>
				<label for="nav-toggle">
					<span class="las la-bars"></span>
				</label> Dashboard
			</h2>

			<div class="user-wrapper">

				<?php if (isset($_SESSION["id"])): ?>
					<img src="<?php echo BASE_URL . '/assets/uploads/' . $_SESSION['image']; ?>" alt="profile picture" width="40px" height="40px">
					<div>
						<h4><?php echo $_SESSION["full_name"]; ?></h4>
						<small><?php echo $_SESSION["nin"]; ?></small>
					</div>
				<?php else: ?>
					<li><a href="">Signup</a></li>
					<li><a href="">Login</a></li>
				<?php endif; ?>

			</div>
		</header>

		<main>
			<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

			<div class="cards">
				<div class="card-single">
					<div>
						<?php
							$query = "SELECT id FROM users ORDER BY id";
							$run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($run);

							echo "<h1> ".$row." </h1>";
						?>
						<?php if ($row <= 1) {
							echo "<span>UTME Student</span>";
						} else {
							echo "<span>UTME Students</span>";
						}
						 ?>
					</div>
					<div>
						<span class="las la-users"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<?php
							$query = "SELECT id FROM waec_users ORDER BY id";
							$run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($run);

							echo "<h1> ".$row." </h1>";
						?>
						<?php if ($row <= 1) {
							echo "<span>WAEC Student</span>";
						} else {
							echo "<span>WAEC Students</span>";
						}
						 ?>
					</div>
					<div>
						<span class="lab la-hubspot"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<?php
							$query = "SELECT id FROM users ORDER BY id";
							$run = mysqli_query($conn, $query);
							$row = mysqli_num_rows($run);

							$query = "SELECT id FROM waec_users ORDER BY id";
							$run = mysqli_query($conn, $query);
							$waec_row = mysqli_num_rows($run);

							$newResult = $row + $waec_row;

							echo "<h1> ".$newResult." </h1>";
						?>
						<?php if ($newResult <= 1) {
							echo "<span>Student</span>";
						} else {
							echo "<span>Students</span>";
						}
						 ?>
					</div>
					<div>
						<span class="lab la-hubspot"></span>
					</div>
				</div>
			</div>

			<div class="recent-grid">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>All UTME Students</h3>
							<a href="<?php echo (BASE_URL . "admin/views/users/index.php"); ?>" class="see_" href="index.php">See all <span class="las la-arrow-right"></span></a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="formTable" width="100%">
									<thead>
										<tr>
											<th>S/N</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>NIN</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($users as $key => $user): ?>
											<tr>
												<td><?php echo $key + 1; ?></td>
												<td><?php echo $user["full_name"]; ?></td>
												<td><?php echo $user["email"]; ?></td>
												<td><?php echo $user["nin"]; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>All WAEC Students</h3>
							<a href="<?php echo (BASE_URL . "admin/views/users/index.php"); ?>" class="see_" href="index.php">See all <span class="las la-arrow-right"></span></a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="" class="display" width="100%">
									<thead>
										<tr>
											<th style="width: 40px;">S/N</th>
											<th>Full Name</th>
											<th>Email Address</th>
											<th>NIN</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($waec_users as $key => $waec_user): ?>
											<tr>
												<td><?php echo $key + 1; ?></td>
												<td><?php echo $waec_user["full_name"]; ?></td>
												<td><?php echo $waec_user["email"]; ?></td>
												<td><?php echo $waec_user["nin"]; ?></td>
											</tr>
										<?php endforeach; ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</main>
		<p class="rights">
			&copy;<script>document.write(new Date().getFullYear());</script> Masterplan Edu&trade; || All Rights Reserved
		</p>
	</div>
	
	<script>
		$(document).ready(function(){
			$('#formTable').DataTable();
		});
		$(document).ready(function(){
			$('table.display').DataTable();
		});
	</script>
</body>
</html>