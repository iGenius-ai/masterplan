<?php
	include("../../../path.php");
	include(ROOT_PATH . "/app/database/db.php");
	include(ROOT_PATH . "/app/helpers/middleware.php");
	include(ROOT_PATH . "/app/controllers/users.php");
	include(ROOT_PATH . "/app/controllers/waec_users.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/portal.css">
    <link rel="stylesheet" href="../../assets/css/table.css">
    <link rel="stylesheet" href="../../../assets/lineawesome/css/line-awesome.css">
		<script src="../../assets/js/jquery-3.5.1.js"></script>

    <title>Users | Masterplan</title>
</head>
<body>

	<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
		<h2><a href="<?php echo (BASE_URL . "index.php"); ?>"><span class="la la-xing"></span><span>Masterplan</span></a></h2>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href="<?php echo (BASE_URL . "admin/index.php"); ?>"><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
				<li><a href="<?php echo (BASE_URL . "st/profile.php"); ?>"><span class="las la-user"></span> <span>Profile</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/users/index.php"); ?>" class="active"><span class="las la-users"></span> <span>Manage Students</span></a></li>
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
					<img src="<?php echo BASE_URL . '/assets/uploads/' . $_SESSION['image']; ?>" width="40px" height="40px">
				<div>
					<h4><?php echo $_SESSION["full_name"]; ?></h4>
					<small><?php echo $_SESSION["nin"]; ?></small>
				</div>
			</div>
		</header>

		<main>

			<div class="recent-grid">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>All UTME Students</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="formTable" width="100%">
									<thead>
										<tr>
											<th style="width: 40px;">S/N</th>
											<th>Full Name</th>
											<th style="width: 220px;">Email</th>
											<th colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($users as $key => $user): ?>
											<tr>
												<td><?php echo $key + 1; ?></td>
												<td><?php echo $user["full_name"]; ?></td>
												<td><?php echo $user["email"]; ?></td>												<td style="width: 100px;"><a style="color: green;font-weight: 600;font-size: .7rem;" href="edit.php?id=<?php echo $user["id"]; ?>"><span class="las la-user-edit"></span> Edit</a></td>
												<td style="width: 100px;"><a style="color: red;font-weight: 600;font-size: .7rem;" href="edit.php?delete_id=<?php echo $user['id']; ?>"><span class="la la-trash"></span> Delete</a></td>
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
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="formTable" width="100%">
									<thead>
										<tr>
											<th style="width: 40px;">S/N</th>
											<th>Full Name</th>
											<th style="width: 220px;">Email</th>
											<th colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>

										<?php foreach ($waec_users as $key => $waec_user): ?>
											<tr>
												<td><?php echo $key + 1; ?></td>
												<td><?php echo $waec_user["full_name"]; ?></td>
												<td><?php echo $waec_user["email"]; ?></td>
												<td style="width: 100px;"><a style="color: green;font-weight: 600;font-size: .7rem;" href="waec_edit.php?id=<?php echo $waec_user["id"]; ?>"><span class="las la-user-edit"></span> Edit</a></td>
												<td style="width: 100px;"><a style="color: red;font-weight: 600;font-size: .7rem;" href="waec_edit.php?delete_id=<?php echo $waec_user['id']; ?>"><span class="la la-trash"></span> Delete</a></td>
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
	</div>

</body>
</html>