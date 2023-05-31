<?php
    session_start();
    include("koneksi.php");
    include("fungsi.php");

    $user_data = cek_login($conn);

    /*
    if(!$user_data){                                    //jika user belum login ($user_data tidak valid)
        header("Location: login.php");
        die;
    }
    */

    //Pagination
    $dataPerHalaman = 3;
    $dataCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM daftar_jual"));
    $jumlahHalaman = ceil($dataCount / $dataPerHalaman);
    $halamanAktif = isset($_GET['page']) ? $_GET['page'] : 1;
    $indeksAwal = ($dataPerHalaman * ($halamanAktif - 1));

    $result = mysqli_query($conn, "SELECT * FROM daftar_jual ORDER BY id DESC LIMIT $indeksAwal, $dataPerHalaman");

    if($result && mysqli_num_rows($result) > 0){
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;                                     //menyimpan data per baris dari database ke array rows
        }
        $daftar_jual = $rows;
    }


    if(isset($_GET['cari']) && $_GET['cari']){
        $daftar_jual = filter($_GET['keyword'], $_GET['tipe_bangunan']);
        if($_GET['keyword'] == "" && $_GET['tipe_bangunan'] == "") $_GET = [];

        if($daftar_jual){
            $dataPerHalaman = 3;
            $dataCount = count($daftar_jual);
            $jumlahHalaman = ceil($dataCount / $dataPerHalaman);
            $halamanAktif = isset($_GET['page']) ? $_GET['page'] : 1;
            $indeksAwal = ($dataPerHalaman * ($halamanAktif - 1));
    
            $daftar_jual = array_slice($daftar_jual, $indeksAwal, $dataPerHalaman);
        }
    }

    if(!$daftar_jual) $daftar_jual = [];
?>

<!doctype html>
<html>
    <head>
        <title>Rumahin.com : Halaman Penjualan</title>
        <link rel="icon" href="index_img/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fira+Sans:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        <link rel="stylesheet" href="css-1.css">
        <style>
                .showLeft{
                    text-shadow: none !important;
                    color:#000 !important;
                    padding:10px;
                }
                .btn-right {
                    right: 0.4em;
                    position: absolute;
                    top: 0.24em;
                }
                .dropbtn {
                    color: white;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;
                }

                .dropdown-1 {
                    position: absolute;
                    display: inline-block;
                    width: 100px;
                    right: 0.4em;
                }

                .dropdown-content {
                    display: none;
                    position: relative;
                    margin-top: 60px;
                    background-color: #f9f9f9;
                    min-width: 160px;
                    overflow: auto;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                }

                .dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                }

                .dropdown-1 a:hover {background-color: #f1f1f1}

                .show {display:block;}

                #brand{
                font-family: 'Amiri', serif;
                font-size: 25px;
                margin: auto;
                }
                #cardImg{
                    height: 650px;
                }
            
                .akun span{
                    margin-right:20px;
                }
                #acc{
                    width:30px;
                    margin-right:10px;
                }
                .akun button{
                    border:1px solid black;
                    background-color:transparent;
                    padding: 10px 25px;
                    border-radius: 30px;
                }
                #buttonNav{
                    float:right;
                }
                #ImgCardText h1{
                    text-align: center;
                    padding-top: 20%;
                    font-family: 'Anton', sans-serif;
                    font-size: 65px;
                }
                #searchBox{
                    margin-left:inherit; 
                }
                #FilterBox{
                    margin-left:10px;
                    margin-right: 10px;
                }
                #dropdownMenuButton1{
                    border: 1px solid green;
                    background-color:transparent;
                    padding:5px 20px;
                    border-radius: 5px;
                }
                #prev, #next{
                    background-color: black;
                    height:10%;
                    top:50%;
                }
                .btnTambah{
                    
                    padding:5px 40px;
                    background-color:white;
                    border-radius: 5px;
                    border : 3px solid grey;
                }
                
                #Carousel img{ /*image dalam carousel1*/
                    height: 275px;
                }
                .card-body{
                    margin-top: 5%;
                }
                .detail{
                    padding-top: 10px;
                    margin-right:5px;
                    border:2px solid green;
                    border-radius: 15px;
                    padding:5px;
                    text-align: center;
                    vertical-align: middle;
                }
                .identitas span{
                    border:2px solid gray;
                    margin-top:20px;
                    margin-right: 20px;
                    padding:5px;
                    border-radius:15px;
                }
                #inpTipe{
                    padding: 10px 20px;
                    border-radius:10px;
                    border:1px solid grey;
                }
                
                /*Bagian footer*/
                #footer{
                    padding: 3% 10%;
                    color:white;
                    text-align: center;
                }
                #desFooter{
                    font-size:30px;
                    margin-bottom:6%;
                    font-family: 'Amiri', serif;
                }
                .linkFooter:hover, .linkFooter:link, .linkFooter:visited{
                    color: white;
                    text-decoration: none;
                    font-size: 15px;
                }

            </style>
        <script>
            function showDropdown(id) {
                    document.getElementById("myDropdown" + id).classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
            }
        </script>
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
          <div class="container-fluid">
            <img src="index_img/logo.png" height="50px" class="me-2">
              <h2 id="brand">Rumahin.com</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link ms-5" href="index.php">Halaman Utama</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5" aria-current="page" href="#">Jual</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5" href="about.php">Tentang Kami</a>
                </li>
              </ul>
                <?php if(!$user_data) : ?>
                    <ul class="nav navbar-nav navbar-right akun">
                        <li class="nav-item">
                        <a class="nav-link me-3" href="login.php">Login</a>
                        </li>
                        <button type="button" class="navbar-btn btn-default" id="button" onclick="location.href='login.php?view=daftar'">Sign Up</button>
                    </ul>
                <?php else : ?>
                    <ul class="nav navbar-nav navbar-right akun">
                        <li class="nav-item">
                        <img src="index_img/account.jpg" width="20px" class="me-2"><?php echo $user_data['nama_pengguna']; ?>
                        <button id="button" class="navbar-btn btn-default ms-2" onclick="location.href = 'logout.php'">Log Out</button>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
        <!--Akhir Navbar-->
        
        <!--Image Card-->
        <div class="card text-white">
            <img src="index_img/pic2.jpg" class="card-img" id="cardImg" alt="...">
            <div class="card-img-overlay" id="ImgCardText">
                <h1 class="card-title">Jual Bangunan Aman dan Terpercaya</h1>
            </div>
        </div>
        <!--Akhir Image Card-->
        
        <br>
        
        <!--Search Box dan Filter-->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <?php if(isset($_GET['cari']) && $_GET['cari']) : ?>
                    <?php if($_GET['keyword'] != "") : ?>
                        <p>Filter Aktif : <?= $_GET['keyword'] ?></p>
                    <?php else : ?>
                        <?php if($_GET['tipe_bangunan'] != "All") : ?>
                        <p>Filter Aktif : <?= $_GET['tipe_bangunan'] ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <form class="d-flex" id="searchBox" action="" method="get">
                    <input class="form-control me-2" type="text" name="keyword" placeholder="Pencarian..." autocomplete="off" autofocus>
                    <button class="btn btn-outline-success" name="cari" value="true">Cari</button>
                
                    <!--Drop Down Filter-->
                    <?php (isset($_GET['cari'])) ? $selected = $_GET['tipe_bangunan'] : $selected = "All" ?>
                    <div class="dropdown" id="FilterBox">
                        <select id="inpTipe" name="tipe_bangunan">
                            <option value="All" selected>Semua</option>
                            <option value="Apartemen" <?php if($selected == 'Apartemen'){echo ("selected");}?>>Apartemen</option>
                            <option value="Ruko" <?php if($selected == 'Ruko'){echo ("selected");}?>>Ruko</option>
                            <option value="Rumah" <?php if($selected == 'Rumah'){echo ("selected");}?>>Rumah</option>
                            <option value="Gedung" <?php if($selected == 'Gedung'){echo ("selected");}?>>Gedung</option>
                        </select>
                    </div>
                    <!--Akhir Drop Down Filter-->
                </form>
                <button onclick="location.href='tambah_penjualan.php'" class="btnTambah">Tambah</button>
            </div>
        </nav>
        <!--Akhir Search Box dan Filter-->
        
        <br>
        
        <!--Container1-->
        <?php $i = 1 ?>
        <?php foreach($daftar_jual as $item) : ?>
        <div class="container">
            <!--Awal Card-->
            <div class="card mb-3 mx-auto" style="max-width:800px;">
              <div class="row g-0">
                <div class="col-md-4" style="background:black">
                    
                    <!--Awal Carousel1-->
                    <div id="carouselExampleControlsNoTouching1" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner" id="Carousel">
                            <div class="carousel-item active">
                                <img src="<?php echo "image/".$item["gambar_bangunan"] ?>" class="d-block" width="100%" alt="...">
                            </div>
                        </div>
                    </div>
                    <!--Akhir Carousel-->
                    
                </div>
                <?php if(isset($user_data) && ($user_data['user_id'] == $item['user_id'] || $user_data['admin'])) : ?>
                    <div class="dropdown-1">
                        <p class="dropbtn btn-right showLeft" onclick="showDropdown(<?= $item['id'] ?>)">&#10247;</p>
                        <!-- menu -->
                        <div id="myDropdown<?= $item['id'] ?>" class="dropdown-content">
                            <a href="ubah.php?id=<?= $item['id']; ?>">Edit</a>
                            <a href="hapus.php?id=<?php echo $item["id"];?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-md-8" style=" cursor: pointer;" onclick="location.href='show.php?id=<?= $item['id']; ?>'">
                  <div class="card-body">
                    <h3 class="card-title"><?php echo $item["nama_bangunan"] ?></h3>
                    <br>
                    <div class="text-muted">
                        <div class="row">
                        <span class="detail col"><?php echo $item["tipe_bangunan"] ?></span>
                        <span class="detail col-6"><?php echo $item["lokasi_bangunan"] ?></span>
                        <span class="detail col"><?php echo $item["luas_bangunan"] ?>m<sup>2</sup></span>
                        <span class="detail col">Rp <?php echo number_format($item["harga_bangunan"], 2, ',', '.');?></span>
                        </div>
                    </div> 
                    <br>
                    <p class="card-text"><?php echo strlen($item["keterangan"]) > 50 ? substr($item["keterangan"],0,50)."..." : $item["keterangan"]; ?></p>
                    <hr>
                    <div class="identitas">
                        <span><?php echo $item["nama_penjual"] ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Akhir Card-->
            
        </div>
        <?php $i++ ?>
        <?php endforeach; ?>
        <!--Akhir Container1-->

        <!--Pagination-->
        <?php if(count($daftar_jual) > 0) : ?>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if($halamanAktif <= 1) : ?>
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            <?php else: ?>
            <li class="page-item">
            <a class="page-link" href="?page=<?php echo $halamanAktif - 1;
                            if (isset($_GET['cari'])){
                                echo "&keyword=".$_GET['keyword']."&tipe_bangunan=".$_GET['tipe_bangunan']."&cari=true";
                            }
                        ?>">&laquo;</a>
            </li>
            <?php endif; ?>
            <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if($i == $halamanAktif) : ?>
                <li class="page-item active">
                    <span class="page-link">
                        <?= $halamanAktif ?>
                    </span>
                </li>
                <?php else : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $i;
                                    if (isset($_GET['cari'])){
                                        echo "&keyword=".$_GET['keyword']."&tipe_bangunan=".$_GET['tipe_bangunan']."&cari=true";
                                    }
                                    ?>"> <?php echo $i; ?> </a>
                </li>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if($halamanAktif < $jumlahHalaman) : ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $halamanAktif + 1;
                                    if (isset($_GET['cari'])){
                                        echo "&keyword=".$_GET['keyword']."&tipe_bangunan=".$_GET['tipe_bangunan']."&cari=true";
                                    }
                                ?>">&raquo;</a>
            </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
        </nav>
        <!-- Akhir Pagination -->
        
        <!--Footer-->
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
            <h6 style="font-size: 12px"><small>Informasi Rumahin disediakan secara eksklusif untuk penggunaan pribadi dan non-komersial konsumen dan tidak boleh digunakan untuk tujuan apa pun selain untuk mengidentifikasi properti prospektif yang mungkin ingin dibeli oleh konsumen. Informasi yang dianggap dapat diandalkan tetapi tidak dijamin akurat. Pembeli untuk memverifikasi semua informasi. Informasi yang diberikan adalah untuk penggunaan pribadi, non-komersial konsumen dan tidak boleh digunakan untuk tujuan apa pun selain untuk mengidentifikasi properti prospektif yang mungkin tertarik untuk dibeli oleh konsumen. Informasi daftar diperbarui setiap 15 menit. Ketentuan Penggunaan & Kebijakan Privasi. Hak Cipta © 2005 - 2021 Rumahin, Inc. Semua hak dilindungi undang-undang</small></h6>
          </div>
        </footer>
        <!--Akhir Footer-->
    </body>
</html>