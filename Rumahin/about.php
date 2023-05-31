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
?>

<html>
<head>
  <title>Rumahin.com : About</title>
  <link rel="icon" href="index_img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/ourteam.css">
</head>
<body>

  <!-- awal navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
    <div class="container-fluid">
      <img src="about_img/logo.jpeg" height="50px" class="me-2">
      <h4>Rumahin.com</h4>
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
            <a class="nav-link ms-5" href="#">Tentang Kami</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link ms-5" href="">EN | IDN</a>
          </li>
          -->
        </ul>
        <?php if(!$user_data) : ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link me-3" href="login.php">Login</a>
            </li>
          </ul>
          <button type="button" class="navbar-btn btn-default" id="button" onclick="location.href='login.php?view=daftar'">Sign Up</button>
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

  <!-- awal carousel-->

    <div class="container">
      <div class="row">
        
        <div class="col-md-12">
          <div class="hero featured-carousel owl-carousel">
            <div class="item">
              <div class="work">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url(about_img/rumah1.jpg);">

                </div>
              </div>
            </div>
            <div class="item">
              <div class="work">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url(about_img/rumah2.jpg);">

                </div>
              </div>
            </div>
            <div class="item">
              <div class="work">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url(about_img/rumah3.jpg);">

                </div>
              </div>
            </div>
            <div class="item">
              <div class="work">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url(about_img/rumah4.jpg);">

                </div>
              </div>
            </div>
            <div class="item">
              <div class="work">
                <div class="img d-flex align-items-center justify-content-center" style="background-image: url(about_img/rumah5.jpg);">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- akhir carousel-->

  <div class= "team-page">
    <div class= "cont">
      <div class = "row1">
        <h1> Rumahin.com </h1>
        <br>
        Rumahin merupakan perusahaan yang bergerak dalam bidang properti, khususnya properti residensial. Berdiri sejak 2 Januari 2005, perusahaan kami selalu mengedepankan kualitas. Melalui berbagai program dari perusahaan, perusahaan kami telah berhasil menjadi penyedia properti yang terpercaya. Adapun properti residensial yang ditawarkan oleh perusahaan kami adalah bangunan yang siap dipakai sebagai tempat tinggal atau hunian seperti rumah pribadi, perumahan, rumah susun, apartemen, bangunan asrama, villa dan sejenisnya. 
        <br>
        Usaha ini mulai dirintis oleh Bapak Ari Gunawan Sutoyo, SE, sejak 2 Januari 2005. Berawal dari usaha mengelola, memasarkan, dan memproduksi rumah dari hasil kerjasama dengan Investor pemilik tanah, saat ini Rumahin.com telah mulai mencoba untuk mengelola, memproduksi ,dan memasarkan produk dari usaha sendiri. Rumahin.com senantiasa berusaha mengembangkan kegiatan usaha serta memberikan pelayanan kepada pembeli atau rekanan kerja dengan lebih baik.<br>
        <br>
        <b>Ijin Operasional :</b><br>
        Rumahin.com didirikan secara resmi dengan Akta Pendirian Perusahaan yang dibuat di hadapan Notaris,dengan kelengkapan ijin operasional sebagai berikut :<br>
        Akta pendirian perusahaan No.04, tanggal 07 Oktober 2005<br>
        Pengesahan Pendirian oleh Menteri Kehakiman Republik Indonesia No.C-29792 HT.01.01.TH.2005, tertanggal 27 Oktober 2005<br>
        NPWP PT. No.02.477.912.6-542.000<br>
        Terdaftar di Kota Medan No.381/BH.12-02/XI/2005<br>
        TDP No.120217000819<br>
        SIUP No.503/04/1655/PK/XI/2005<br>
        Izin Gangguan(HO) No.503/7887/HO/2005<br>
        Keanggotaan REI(RealEstate Indonesia) NPA 10.00120<br>
        <br>
        <b>Komitmen Perusahaan :</b><br>
        Rumahin.com memberikan produk perumahan berupa kavling siap bangun. Dengan produk semacam ini, diharapkan kualitas bangunan menjadi sebagaimana yang diinginkan, karena akan terjadi kontrol bersama antara developer dan pembeli pada saat proses pembangunan berlangsung, serta jaminan kualitas dan bentuk atau model bangunan seperti yang diharapkan. Dengan tidak meninggalkan unsur pelayanan yang memuaskan dan sesuai dengan kebutuhan masyarakat pada saat ini.<br>
        <br>
        <h3>Visi & Misi :</h3><br>
        <b>Visi :</b><br>
        Menjadi perusahaan Developer, Property Consultan & Investment yang ber-Standar Nasional Indonesia (SNI) mampu berkompetisi dalam pasar Global serta menjadi terbaik dalam bidang perumahan , produktif, menguntungkan, lebih berorientasi kedepan serta mampu berkompetisi di pasar global. Dengan berasas kekeluargaan tetap menjunjung tinggi profesionalisme kerja yang baik.<br>
        <br>
        <b>Misi :</b><br>
        Menghasilan profit didukung produk berkualitas , aman dan sehat serta mengutamakan konsep Green Home Environment.<br>
        Menciptakan sistem operasional yang efisien (low cost operations.<br>
        Memberikan profit kepada shareholder dan stakeholder.<br>
        Memperhatikan kesejahteraan karyawan.<br>
        Berpartisipasi dalam usaha untuk kesejahteraan masyarakat.<br>
        
        <h1> Our Team </h1>

        <div class= "team-pictures">
          <div class= "cont">
            <div class= "row1">

             <div class = "col-md-3">
               <img src="about_img/bryan.jpeg" class="img-circle" style="width:200px;height:200px;">
             </div>
             <div class = "col-md-3">
               <img src="about_img/sally.jpeg" class="img-circle" style="width:200px;height:200px;">
             </div>

             <div class = "col-md-3">
              <img src="about_img/ellena.jpeg" class="img-circle" style="width:200px;height:200px;">
            </div>

            <div class = "col-md-3">
              <img src="about_img/zefania.jpeg" class="img-circle" style="width:200px;height:200px;">
            </div>
            <div class = "col-md-3">
              <img src="about_img/kevin.jpeg" class="img-circle" style="width:200px;height:200px;">
            </div>
          </div>
        </div>
      </div>


      <div class= "cont">
        <div class= "row1">
          <div class = "col-md-3">
            <h4> Brian Wijaya </h4>
            <h5> 201401042 </h5>
            <ul class="listunstyled listinline"> 
              <p> Brian Wijaya dengan NIM 201401042 dari KOM A angkatan 2020 Fakultas Ilmu Komputer dan Teknologi Informasi (FASILKOM-TI) dengan program studi Ilmu Komputer (S1) Universitas Sumatera Utara (USU). Untuk kontak, dapat menghubungi lewat email brianwijaya2003@gmail.com. </p> 
            </div>

            <div class = "col-md-3">
              <h4> Sally Livia </h4>
              <h5> 201401025 </h5>
              <ul class="listunstyled listinline"> 
                <p> Sally Livia Kosasih dengan NIM 201401025 dari KOM A angkatan 2020 Fakultas Ilmu Komputer dan Teknologi Informasi (FASILKOM-TI) dengan program studi Ilmu Komputer (S1) Universitas Sumatera Utara (USU). Untuk kontak, dapat menghubungi lewat email sallyliviak.1807@gmail.com. </p> 
              </div>
              <div class = "col-md-3">
                <h4> Ellena </h4>
                <h5> 201401004 </h5>
                <ul class="listunstyled listinline"> 
                  <p>Ellena Amanda dengan NIM 201401004 dari KOM A angkatan 2020 Fakultas Ilmu Komputer dan Teknologi Informasi (FASILKOM-TI) dengan program studi Ilmu Komputer (S1) Universitas Sumatera Utara (USU). Untuk kontak, dapat menghubungi lewat email ellenaamanda846@gmail.com. </p>
                </div>

                <div class = "col-md-3">
                  <h4> Zefania </h4>
                  <h5> 201401020 </h5>
                  <ul class="listunstyled listinline"> 
                    <p> Zefania Agustina Lumban Gaol dengan NIM 201401020 dari KOM A angkatan 2020 Fakultas Ilmu Komputer dan Teknologi Informasi (FASILKOM-TI) dengan program studi Ilmu Komputer (S1) Universitas Sumatera Utara (USU). Untuk kontak, dapat menghubungi lewat email zefanialumbangaol@gmail.com. </p>
                  </div>

                  <div class = "col-md-3">
                    <h4> Kevin Wijaya </h4>
                    <h5> 201401144 </h5>
                    <ul class="listunstyled listinline"> 
                      <p> Kevin Wijaya dengan NIM 201401144 dari KOM A angkatan 2020 Fakultas Ilmu Komputer dan Teknologi Informasi (FASILKOM-TI) dengan program studi Ilmu Komputer (S1) Universitas Sumatera Utara (USU). Untuk kontak, dapat menghubungi lewat email kevinwijaya3004@gmail.com. </p>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="team-page">
        <div class="cont">
          <div class="row1">
          <h1>Penghargaan</h1>
          <center>
          <img src="about_img/penghargaan1.jpg" style="width: 340px; margin: 10px">
          <img src="about_img/penghargaan2.jpg" style="width: 340px; margin: 10px">
          <img src="about_img/penghargaan3.jpg" style="width: 340px; margin: 10px">
          <img src="about_img/penghargaan4.jpg" style="width: 340px; margin: 10px">
          <img src="about_img/penghargaan5.jpg" style="width: 340px; margin: 10px">
          </center>
          </div>
        </div>
        </div>
        <link rel="stylesheet" href="css-1.css">
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

        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>
      </body>
      </html>    