<?php 

session_start();

$nama = $_SESSION["nama"];

if (isset($_POST["kirim_catatan"])) {
  

    $judul = trim($_POST["judul"]);
    $catatan_perjalanan = trim($_POST["catatan_perjalanan"]);
    $datetime = trim($_POST["datetime"]);
    $location = trim($_POST["location"]);
    $suhu = trim($_POST["suhu"]);


    $nama_file = fopen("catatan/$nama.txt","a+");

    fwrite($nama_file, "<tr><td>$judul</td><td>$catatan_perjalanan</td><td>$datetime</td><td>$location</td><td>$suhu</td></tr>");

	$berhasil_kirim = true;

    fclose($nama_file);
}

$file = fopen("catatan/$nama.txt", "a+");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Perjalanan</title>

    <link rel="stylesheet" href="../assets/bootstrap.min.css" />

    
</head>

<body>

   
    <div class="container mt-5">

        <?php if (isset($success_kirim_catatan)) : ?>

            <div class="alert alert-success mb-3" role="alert">
                Berhasil Kirim Catatan
            </div>

        <?php endif ?>

       

        <div class="card mb-3 border-0" style="max-width: 540px;">
            <div class="row g-0 justify-content-center">
    <div class="col-lg-4">
    <img src="envelope-regular.jpg" class="img-fluid rounded-start">
                    
    </div>
    <div class="col-lg-8">
      <div class="card-body">
      <h1 class="display-3">
                    <span class="text-uppercase" style="color: #000">Peduli Diri</span>
                    </h1>
                    <h6 class="mt-2">
                    <span class="text-dark" style="color: #000">Catatan Perjalanan</span>
                    </h6>
      </div>
    </div>
  </div>
</div>
          
<div class="row mb-3 justify-content-center">
        
    <div class="col-lg-12 p-5">


                <ul class="nav nav-pills mt-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="catatan_perjalanan-tab" data-bs-toggle="tab" data-bs-target="#catatan_perjalanan" type="button" role="tab" aria-controls="catatan_perjalanan" aria-selected="false">Catatan Perjalanan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="isi_data-tab" data-bs-toggle="tab" data-bs-target="#isi_data" type="button" role="tab" aria-controls="isi_data" aria-selected="false">Isi Data</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="login.php" class="nav-link" id="logout-tab" aria-selected="false">Logout</a>
                    </li>
                </ul>

                <?php if(isset($berhasil_kirim)) : ?>

                <div class="alert alert-success mb-3 mt-3" role="alert">Berhasil Kirim</div>

                <?php endif ?>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <h5 class="fw-bold mt-5">
                            Selamat Datang di Aplikasi Peduli Diri
                        </h5>

                    </div>
                    <div class="tab-pane fade" id="catatan_perjalanan" role="tabpanel" aria-labelledby="catatan_perjalanan-tab">

                        <div class="row justify-content-center">
                        
                        <div class="mb-3 mt-3">

                        <table class="table table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Catatan Perjalanan</th>
                                <th scope="col">Tanggal/Waktu</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Suhu</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        
                                while(!feof($file))
                                {
                                echo fgets($file);
                                }
                                fclose($file);
                        
                            ?>
                            </tbody>
                        </table>

                        </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="isi_data" role="tabpanel" aria-labelledby="isi_data-tab">
                        <form action="" method="post">

                            <div class="card mt-3">
                                <div class="card-body">

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
                                        <label for="judul">Judul</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <textarea name="catatan_perjalanan" id="" cols="30" rows="10" class="form-control" name="catatan_perjalanan" placeholder="Catatan Perjalanan" required></textarea>
                                        <label for="catatan_perjalanan">Catatan Perjalanan</label>
                                    </div>

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="number" class="form-control" id="suhu" name="suhu" placeholder="Suhu" required>
                                        <label for="suhu">Suhu</label>
                                    </div>

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="datetime-local" class="form-control" id="datetime" name="datetime" placeholder="Tanggal/Waktu" required>
                                        <label for="datetime">Tanggal/Waktu</label>
                                    </div>

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="location" name="location" placeholder="Lokasi" required>
                                        <label for="location">Lokasi</label>
                                    </div>

                                </div>
                            </div>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-dark" name="kirim_catatan">Isi Catatan Perjalanan</button>
                            </div>

                        </form>
                    </div>

                </div>


            </div>

        </div>


    </div>

    <script src="../assets/bootstrap.bundle.min.js"></script>

</body>

</html>