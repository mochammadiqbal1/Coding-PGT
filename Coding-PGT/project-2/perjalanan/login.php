<?php

// Membuat Sesi User
session_start();

// Kondisi Untuk Login Perjalanan

if (isset($_POST["login"])) {
  
    // Post login untuk mengambil data dari form login
	
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
	$password = $_POST["password"];

	// fopen untuk membuka file sesuai dengan nama user
	
	$nama_file = fopen("user/$nama.txt","r");

	$data_nik = fgets($nama_file);
	$data_nama = fgets($nama_file);
	$data_password = fgets($nama_file);

	if ($nik == $data_nik && $nama == $data_nama || $password == $data_password) {
		
		$_SESSION["nama"] = $nama;
		header("Location: dashboard.php");
		exit;

	}else{

		$gagal_login = true;

	}

    fclose($nama_file);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/bootstrap.min.css">
	<title>Perjalanan</title>
</head>
<body>


<div class="container">

	<div class="row justify-content-center" style="margin-top: 150px;">

	<h1>Login Perjalanan</h1>

    <?php if(isset($gagal_login)) : ?>

        <div class="alert alert-danger mb-3 mt-3" role="alert">Gagal Login</div>

    <?php endif ?>

	<div class="col-lg-12">
	
	<form action="" method="post" class="mt-5">

	<div class="mb-3">

		<input type="text" name="nik" placeholder="Nik" class="form-control">

	</div>

	<div class="mb-3">

		<input type="text" name="nama" placeholder="Nama" class="form-control">

	</div>

	<div class="mb-3">

		<input type="password" name="password" placeholder="Password" class="form-control">

	</div>

	<div class="mt-3">

		<button type="submit" name="login" class="btn btn-dark w-25">Login</button>
		<a href="daftar.php" class="btn btn-dark w-25">Daftar</a>

	</div>

	</form>

	</div>

	</div>

</div>


<script src="../assets/bootstrap.bundle.min.js"></script>
</body>
</html>
