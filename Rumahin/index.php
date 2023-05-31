<?php
    session_start();                        //Untuk mengakses $_SESSION, diperlukan session_start()
    include("koneksi.php");
    include("fungsi.php");

    $user_data = cek_login($conn);

    /*
    if(!$user_data){
        header("Location: login.php");
        die;
    }
    */

    mysqli_query($conn, "SELECT * FROM daftar_jual");
    $result = mysqli_query($conn, "SELECT * FROM daftar_jual ORDER BY id DESC LIMIT 4");

    if($result && mysqli_num_rows($result) > 0){
      $rows = [];
      while($row = mysqli_fetch_assoc($result)){
          $rows[] = $row;                                     //menyimpan data per baris dari database ke array rows
      }
      $daftar_jual = $rows;
    }

    if(!$daftar_jual) $daftar_jual = [];
?>

<html>
    <head>
        <title>Rumahin.com</title>
        <link rel="icon" href="index_img/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css-1.css">
    </head>
    
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
                  <a class="nav-link ms-5" aria-current="page" href="#">Halaman Utama</a>
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
    
    
        <!-- awal carousel -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="index_img/carousel(1).jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
              <div class="ccaption">
            <h1 style="font-size: 85px">Rumahin.com</h1>
            <h5>"Ga punya rumah? Rumahin aja!"</h5>
            <button id="cbutton" style="font-size: 18px" onclick="location.href = 'jual.php'">Daftar Pencarian</button>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="index_img/carousel(2).jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
              <div class="ccaption">
            <h1 style="font-size: 85px">Rumahin.com</h1>
            <h5>"Ga punya rumah? Rumahin aja!"</h5>
              <button id="cbutton" style="font-size: 18px" onclick="location.href = 'jual.php'">Daftar Pencarian</button>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="index_img/carousel(3).jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
              <div class="ccaption">
            <h1 style="font-size: 85px">Rumahin.com</h1>
            <h5>"Ga punya rumah? Rumahin aja!"</h5>
              <button id="cbutton" style="font-size: 18px" onclick="location.href = 'jual.php'">Daftar Pencarian</button>
              </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!--akhir carousel-->
    
    
    <!--awal article Pembaruan Terbaru-->
    <div class="container-fluid px-5 pb-5">
        <h1 class="my-5">Pembaruan Terbaru</h1>
        <div class="row">
        <?php foreach($daftar_jual as $item) : ?>
        <div class="col-lg-3 col-md-6">
            <div class="card h-100 p-0 shadow-sm " style="width: 18rem; cursor: pointer;" onclick="location.href='show.php?id=<?= $item['id']; ?>'">
              <img src="<?php echo "image/".$item["gambar_bangunan"] ?>" class="card-img-top h-100" alt="...">
              <div class="card-body">                  
                <p  class="me-2" style="display: inline";>Rp</p><h5 class="card-title"  style="display: inline";><?php echo number_format($item["harga_bangunan"], 2, ',', '.'); ?></h5>
                <p class="card-text text-muted"><?php echo $item["lokasi_bangunan"] ?></p>
                <div class="text-muted">
                        <span class="detail"><?php echo $item["tipe_bangunan"] ?></span>
                        <span class="detail"><?php echo $item["luas_bangunan"] ?> m<sup>2</span>
                </div>
              </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
        <!-- Placeholder
        <div class="col-3">
            <div class="card p-0 shadow-sm" style="width: 18rem;">
              <img src="index_img/card(2).jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p  class="me-2" style="display: inline";>Rp</p><h5 class="card-title"  style="display: inline";>2,608 M</h5>
                <p class="card-text text-muted">Jl. Eka Rasmi, Medan Johor, Medan, Sumatera Utara</p>
                  <div class="text-muted">
                        <span class="detail">Rumah</span>
                        <span class="detail">217 m²</span>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0 shadow-sm" style="width: 18rem;">
              <img src="index_img/card(3).jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p  class="me-2" style="display: inline";>Rp</p><h5 class="card-title"  style="display: inline";>1,728 M</h5>
                <p class="card-text text-muted">Jl .Karya Sari, Medan Johor, Medan, Sumatera Utara</p>
                  <div class="text-muted">
                        <span class="detail">Rumah</span>
                        <span class="detail">148 m²</span>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0 shadow-sm" style="width: 18rem;">
              <img src="index_img/card(4).jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p  class="me-2" style="display: inline";>Rp</p><h5 class="card-title"  style="display: inline";>785 JT</h5>
                <p class="card-text text-muted">Medan Selayang, Medan, Sumatera Utara</p>
                  <div class="text-muted">
                        <span class="detail">Ruko</span>
                        <span class="detail">90 m²</span>
                  </div>
              </div>
            </div>
        </div>
        -->
        <br>
        <!--awal article Pembaruan Terbaru-->
        
        <!--awal article Diskon
        <h1 class="my-5">Diskon</h1>
        <div class="row">
        <div class="col-3">
            <div class="card p-0 shadow-sm" style="width: 18rem;">
              <img src="index_img/card(5).jpg" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                    <p class="card-text bottom-left text-white" style="font-size: 14px">Rp <s>2,6667 M</s>
                        <img src="index_img/arrowdown.png" style="height: 20px"/>
                    </p>
                </div>
              <div class="card-body">
                <p  class="me-2" style="display: inline";>Rp</p><h5 class="card-title"  style="display: inline";>2,2 M</h5>
                <p class="card-text text-muted">Jl.Tilak, Sei Rengas I, Medan, Medan Kota, Medan, Sumatera Utara</p>
                  <div class="text-muted">
                        <span class="detail">Ruko</span>
                        <span class="detail">334 m²</span>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0 shadow-sm" style="width: 18rem;">
              <img src="index_img/card(6).jpg" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                    <p class="card-text bottom-left text-white" style="font-size: 14px">Rp <s>667.570.000</s>
                        <img src="index_img/arrowdown.png" style="height: 20px"/>
                    </p>
                </div>
              <div class="card-body">
                <p  class="me-2" style="display: inline";>Rp</p><h5 class="card-title"  style="display: inline";> 600 JT</h5>
                <p class="card-text text-muted">Jalan Abdul Hakim, Setiabudi, Medan, Sumatera Utara</p>
                  <div class="text-muted">
                        <span class="detail">Apartment</span>
                        <span class="detail">44 m²</span>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0 shadow-sm" style="width: 18rem;">
              <img src="index_img/card(7).jpg" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                    <p class="card-text bottom-left text-white" style="font-size: 14px">Rp <s>2,34415 M</s>
                        <img src="index_img/arrowdown.png" style="height: 20px"/>
                    </p>
                </div>
              <div class="card-body">
                <p  class="me-2" style="display: inline";>Rp</p><h5 class="card-title"  style="display: inline";>2,1088 M</h5>
                <p class="card-text text-muted">Jl. Merci Raya, Deli Tua, Deli Serdang, Sumatera Utara</p>
                  <div class="text-muted">
                        <span class="detail">Rumah</span>
                        <span class="detail">238 m²</span>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0 shadow-sm" style="width: 18rem;">
              <img src="index_img/card(8).jpg" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                    <p class="card-text bottom-left text-white" style="font-size: 14px">Rp <s>5,669 M</s>
                        <img src="index_img/arrowdown.png" style="height: 20px"/>
                    </p>
                </div>
              <div class="card-body">
                <p  class="me-2" style="display: inline";>Rp</p><h5 class="card-title"  style="display: inline";>4,85 M</h5>
                <p class="card-text text-muted">Jalan Putri Hijau No.1, Medan Barat, Medan, Sumatera Utara</p>
                  <div class="text-muted">
                        <span class="detail">Apartment</span>
                        <span class="detail">145 m²</span>
                  </div>
              </div>
            </div>
        </div>
        </div>
    </div>
    akhir article Diskon-->
    
    
    <!--awal Tentang Kami-->
    <div class="container-fluid px-5 pb-5" id="containerbg">
        <h1 class="mb-0 mt-5 py-5">Tentang Kami</h1>
            <div class="row cardfont">
                <div class="col-4 p-0">
                <div class="card p-0 h-100" >
                  <img src="index_img/profile.png" class="card-img-top px-5 mt-3" alt="...">
                  <div class="card-body pt-0 pb-5 px-4">
                    <h5 class="card-title mb-3">Siapa Kami</h5>
                    <p class="card-text" style="font-size: 12px">Sejak 2005, Rumahin.com tetap kompetitif dengan memanfaatkan jalur data yang kuat yang dibangun di atas hubungan MLS terbaik di seluruh 50 provinsi. Itu berarti Anda mendapatkan daftar terbaru 24 jam sehari, 365 hari setahun.</p>
                  </div>
                </div>
                </div>
                
                <div class="col-4 p-0">
                <div class="card p-0 h-100" >
                  <img src="index_img/investment.png" class="card-img-top px-5 mt-3" alt="...">
                  <div class="card-body pt-0 pb-5 px-4">
                    <h5 class="card-title mb-3">Kelebihan Kami</h5>
                    <p class="card-text" style="font-size: 12px">Database terbaru kami memungkinkan Anda mencari rumah impian atau menemukan nilai rumah Anda saat ini. Kemudian kami akan menghubungkan Anda dalam beberapa menit dengan salah satu agen lokal terbaik kami.</p>
                  </div>
                </div>
                </div>
                
                <div class="col-4 p-0">
                <div class="card p-0 h-100">
                  <img src="index_img/portfolio.png" class="card-img-top px-5 mt-3" alt="...">
                  <div class="card-body pt-0 pb-5 px-4">
                    <h5 class="card-title mb-3">Kenapa Bekerja Dengan Kami</h5>
                    <p class="card-text" style="font-size: 12px">Kami dapat mengubah masa depan real estat dengan teknologi canggih, alat komunikasi klien terbaru, informasi pasar, teknologi AI adaptif, dan tim pemasar khusus, koordinator transaksi, dan ilmuwan data.</p>
                  </div>
                </div>
                </div>
            </div>
    </div>
    <!--akhir Tentang kami-->
    
    
    
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
</html>