<?php


if (isset($_POST["daftar"])) {
  
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
	$password = $_POST["password"];

    $nama_file = fopen("user/$nama.txt" ,"w");
	
    // fwrite untuk menulis sebuah content di file

    fwrite($nama_file, "$nik\n" . "$nama\n" . "$password");

    $berhasil_daftar = true;

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

	<h1>Daftar Perjalanan</h1>

    <?php if(isset($berhasil_daftar)) : ?>

        <div class="alert alert-success mb-3 mt-3" role="alert">Berhasil Daftar</div>

    <?php endif ?>

	<div class="col-lg-12">
	
	<form action="" method="post" class="mt-5">

	<div class="mb-3">

		<input type="text" name="nik" placeholder="Nik" class="form-control" required>

	</div>

	<div class="mb-3">

		<input type="text" name="nama" placeholder="Nama" class="form-control" required>

	</div>
	
	<div class="mb-3">

		<input type="password" name="password" placeholder="Password" class="form-control" required>

	</div>

	<div class="mt-3">

		<button type="submit" name="daftar" class="btn btn-dark w-25">Daftar</button>
		<a href="login.php" class="btn btn-dark w-25">Login</a>

	</div>

	</form>

	</div>

	</div>

</div>


<script src="../assets/bootstrap.bundle.min.js"></script>
</body>
</html>
