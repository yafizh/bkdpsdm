<?php
session_start();
if (isset($_POST['submit'])) {
	// require_once "database/koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	// $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	// if ($mysqli->query($sql)) {
	// 	if ($mysqli->num_rows) {
	// 		$user = $user->fetch_assoc();
	// 		$_SESSION['nama'] = $user['nama'];
	// 		$_SESSION['id_user'] = $user['id_user'];
	// 		$_SESSION['status'] = $user['status'];
	// 		header('Location: index.php');
	// 	} else echo "<script>alert('Username atau Password Salah!');</script>";
	// } else echo "Error: " . $sql . "<br>" . $mysqli->error;
	if ($username === 'admin') {
		$_SESSION['nama'] = "ADMIN";
		$_SESSION['status'] = "ADMIN";
	} else if ($username === 'pimpinan') {
		$_SESSION['nama'] = "PIMPINAN";
		$_SESSION['status'] = "PIMPINAN";
	} else if ($username === 'pegawai') {
		$_SESSION['nama'] = "PEGAWAI";
		$_SESSION['status'] = "PEGAWAI";
	}
	header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Log in</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="../../index2.html"><b>Admin</b>LTE</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<form action="" method="POST">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-12">
							<button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../assets/js/adminlte.min.js"></script>
</body>

</html>