<?php
    session_start();
    include("koneksi.php");
    include("fungsi.php");

    $user_data = cek_login($conn);

    if(!$user_data){                                    //jika user belum login ($user_data tidak valid)
        header("Location: login.php");
        die;
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Ada sesuatu yang telah di POST
        if(add_data_jual($_POST, $_FILES, $user_data) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan.');
                    document.location.href = 'jual.php';
                </script>
                ";
        }
        else{
            echo "
                <script>
                    alert('Data gagal ditambahkan ke dalam database');
                </script>
                ";
            echo "Error : ";
            echo mysqli_error($conn);
            echo "<br>";
        }
    }
?>

<!Doctype html>
<html>
    <head>
        <title>Rumahin.com : Tambah Penjualan</title>
        <link rel="icon" href="index_img/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fira+Sans:wght@500&display=swap" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1 id="brand"><img src="index_img/logo.png" id="logo">Rumahin.com</h1>
        
        <!--Form Post-->
        <div class="container shadow-lg p-3 mb-5 bg-body" id="Container1">
            <h2 style="display: inline;margin-left:15px">Jual Bangunan</h2>
            <button onclick="location.href='jual.php'" id="kembali">Kembali</button>
            <hr>
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-5">
                        <h5>Data Diri</h5>
                        <input type="text" placeholder="Nama Anda" id="inpname" name="nama_penjual" value="<?php echo $user_data['nama_pengguna']; ?>" disabled>
                        <br>
                        <br>
                        <br>
                        <h5>Data Bangunan</h5>
                        <input type="text" placeholder="Nama Bangunan" id="inpBangunan" name="nama_bangunan" required>
                        <br>
                        <select id="inpTipe" name="tipe_bangunan" required>
                            <option value="Apartemen">Apartemen</option>
                            <option value="Ruko">Ruko</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Gedung">Gedung</option>
                        </select>
                        <br>
                        <input type="text" placeholder="Lokasi" id="inpLokasi" name="lokasi_bangunan" required>
                        <input type="number" placeholder="Luas Bangunan m&sup2" id="inpLuas" name="luas_bangunan" required>
                        <input type="number" placeholder="Harga (Rp)" id="inpHarga" name="harga_bangunan" required>
                        <br>
                        <textarea placeholder="Keterangan" id="inpKet" name="keterangan" required></textarea>
                    </div>
                    <div class="pemisah"></div>
                    <div class="col-5">
                        <h5>Unggah Gambar Bangunan</h5>
                        <br>
                        <p><input type="file" name="gambar_bangunan" value="" required></p>
                        <!--
                        <div class="container">
                            <div class="row">
                                <div class="col-5" id="pic1">
                                    <img src="img/Rumah1.jpg" style="width:100%">
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                    
                </div>
                <br>
                <div class="row">
                        <div class="col" style="margin: 0 44%">
                            <input type="submit" value="Simpan" id="post">
                    </div>
                    </div>
                </div>    
            </form>
        </div>
        <!--Akhir Form Post-->
        <br>
        <!--Footer-->
        <footer>
            <div class="container-fluid" id="footer">
                <div class="row">
                    <div class="col" id="desFooter"><b>"Gak Punya Rumah? Rumahin aja"</b></div>
                </div>
                <div class="row justify-content-center" style="text-align: center;color: white ">
                    <div class="col-2" style="font-size: 20px"><b>Contact Us</b></div>
                    <div class="col-2">
                        <a href="#" class="linkFooter"><img src="img/fb.png" style="width: 30px;margin-right: 10px;">Rumahin.com</a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="linkFooter"><img src="img/ig.png" style="width: 30px;margin-right: 10px;">Rumahin.com</a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="linkFooter"><img src="img/twitter.png" style="width: 30px;margin-right: 10px;">Rumahin.com</a>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 2%; text-align: center">
                    <div class="col-3"><a href="#" class="linkFooter"><b>Kebijakan dan Privasi</b></a></div>
                    <div class="col-3"><a href="#" class="linkFooter"><b>Syarat dan Ketentuan</b></a></div>
                </div>
            </div>
        </footer>
        <!--Akhir Footer-->
    </body>
</html>