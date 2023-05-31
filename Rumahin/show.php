<?php
    session_start();
    include("koneksi.php");
    include("fungsi.php");

    $user_data = cek_login($conn);

    if(!isset($_GET['id'])){
        header('Location: jual.php');
        die;
    }

    $id = $_GET["id"];
    $data_jual = ambil_data_jual($id);
?>

<html>
    <head>
        <title>Rumahin.com : <?= $data_jual["nama_bangunan"]; ?></title>
        <link rel="icon" href="logo.png">
        <link rel="icon" href="index_img/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css-2.css">
    </head>
</html>

<!-- awal navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
          <div class="container-fluid">
            <img src="index_img/logo.png" height="50px" class="me-2">
              <h2 class="amiri">Rumahin.com</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link ms-5" aria-current="page" href="index.php">Halaman Utama</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5" href="jual.php">Jual</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5" href="about.php">Tentang Kami</a>
                </li>
              </ul>
              <?php if(!$user_data) : ?>
                <ul class="nav navbar-nav navbar-right">
                  <li class="nav-item">
                      <a class="nav-link me-3" href="login.php">Login</a>
                  </li>
                </ul>
                <button type="button" class="navbar-btn btn-default" id="button" onclick="location.href = 'login.php?view=daftar'">Sign Up</button>
              <?php else : ?>
                <ul class="nav navbar-nav navbar-right">
                  <li class="nav-item">
                    <img src="index_img/account.jpg" width="20px" class="me-2"><?php echo $user_data['nama_pengguna']; ?>
                    <button id="button" class="navbar-btn btn-default ms-2" onclick="location.href = 'logout.php'">Log Out</button>
                  </li>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </nav>
        <!-- akhir navbar-->

        <!-- awal deskripsi-->
        <div class="container pt-5 pb-5 mt-5">
            <div class="row">
              <div class="col-sm-6 col-md-8 pe-5">
                  <div style="color: #2c2c2c">
                      <br>
                      <h2 class="fw-light "><?= $data_jual["nama_bangunan"]; ?></h2>
                      <br>
                      <h5 class="">Deskripsi</h5>
                      <?= "<p class='fw-light fs-5' style='word-wrap: break-word'>".nl2br($data_jual["keterangan"])."</p>" ?>
                  </div>
                  <hr class="mt-5">
                  <p class="fw-normal fs-6" style="color: #363636">Hubungi Kontak :</p>
                  <p class="fw-light fs-6 "><img src="index_img/user.png" class="icon">Penjual : <?= $data_jual["nama_penjual"]; ?></p>
                  <p class="fw-light fs-6 "><img src="index_img/phone.png" class="icon">No. Telepon : <?= $data_jual["no_telepon"]; ?></p>
                  <p class="fw-light fs-6 "><img src="index_img/email.png" class="icon">Email : <?= $data_jual["email"]; ?></p>
              </div>
                
              <div class="col-6 col-md-4">
                  <br>
                  <div class="card p-0 shadow-sm " style="width: 20rem;">
                      <img src="image/<?= $data_jual["gambar_bangunan"]; ?>" class="card-img-top" alt="...">
                      <div class="card-body">   
                          <!--
                          <p  class="m-auto card-text text-muted"><img src="index_img/pin.png" style="width: 20px" class="me-3 mt-2 mb-2">Lokasi : <?= $data_jual["lokasi_bangunan"]; ?></p>
                          <p  class="me-3 fw-bold" style="display: inline";>m²</p><p class="card-title card-text text-muted"  style="display: inline";>Luas : <?= $data_jual["luas_bangunan"]; ?> m²</p>
                          -->
                          
                          <div class="row mb-2">
                              <div class="col-1">
                                  <img src="index_img/pin.png" style="width: 18px;" class="mt-1">
                              </div>
                              <div class="col-3 text-muted">
                                  Lokasi : 
                              </div>
                              <div class="col-7 text-muted" style="text-align: justify;">
                                  <?= $data_jual["lokasi_bangunan"]; ?>
                              </div>
                          </div>
                          
                          <div class="row">
                              <div class="col-1">
                                  <img src="index_img/blueprint.png" style="width: 18px;" class="mt-1">
                              </div>
                              <div class="col-3 text-muted">
                                  Luas :
                              </div>
                              <div class="col-7 text-muted">
                                  <?= $data_jual["luas_bangunan"]; ?> m²
                              </div>
                          </div>
                          
                      </div>
                  </div>
              </div>
            </div>
        </div>

        <!-- akhir deskripsi -->

        <!--awal footer-->
        <footer class="page-footer bg-dark">
            <div id="footer">
              <div class="row">
            <h1 class="card-title text-white col" id="desFooter">"Ga punya rumah? Rumahin aja!"</h1>
             <div class="row justify-content-center" style="text-align: center;color: white ">
                        <div class="col-2" style="font-size: 16px"><b>Contact Us</b></div>
                        <div class="col-2" style="font-size: 14px">
                            <a href="#" class="linkFooter"><img src="index_img/fb.png" style="width: 25px;margin-right: 10px;">Rumahin.com</a>
                        </div>
                        <div class="col-2" style="font-size: 14px">
                            <a href="#" class="linkFooter"><img src="index_img/ig.png" style="width: 25px;margin-right: 10px;">Rumahin.com</a>
                        </div>
                        <div class="col-2" style="font-size: 14px">
                            <a href="#" class="linkFooter"><img src="index_img/twitter.png" style="width: 25px;margin-right: 10px;">Rumahin.com</a>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 2%; text-align: center">
                        <div class="col-3"><a href="#" class="linkFooter" style="font-size: 15px"><b>Kebijakan dan Privasi</b></a></div>
                        <div class="col-3"><a href="#" class="linkFooter" style="font-size: 15px"><b>Syarat dan Ketentuan</b></a></div>
                    </div>
                </div>
            </div>
          <div class="card-footer text-muted text-center">
            <h6><small>Informasi Rumahin disediakan secara eksklusif untuk penggunaan pribadi dan non-komersial konsumen dan tidak boleh digunakan untuk tujuan apa pun selain untuk mengidentifikasi properti prospektif yang mungkin ingin dibeli oleh konsumen. Informasi yang dianggap dapat diandalkan tetapi tidak dijamin akurat. Pembeli untuk memverifikasi semua informasi. Informasi yang diberikan adalah untuk penggunaan pribadi, non-komersial konsumen dan tidak boleh digunakan untuk tujuan apa pun selain untuk mengidentifikasi properti prospektif yang mungkin tertarik untuk dibeli oleh konsumen. Informasi daftar diperbarui setiap 15 menit. Ketentuan Penggunaan & Kebijakan Privasi. Hak Cipta © 2005 - 2021 Rumahin, Inc. Semua hak dilindungi undang-undang</small></h6>
          </div>
        </footer>
        <!--akhir footer-->