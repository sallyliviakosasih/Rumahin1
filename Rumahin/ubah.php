<?php
    session_start();
    include("koneksi.php");
    include("fungsi.php");

    $user_data = cek_login($conn);

    if(!$user_data){                                    //jika user belum login ($user_data tidak valid)
        header("Location: login.php");
        die;
    }

    $id = $_GET["id"];
    $data_jual = ambil_data_jual($id);
    
    if(!$user_data['admin'] && ($_SESSION['user_id'] != $data_jual['user_id'])){
        echo "<script>alert('Anda tidak memiliki akses untuk mengubah data ini.');
        document.location.href = 'jual.php';</script>";
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Ada sesuatu yang telah di POST
        if(edit_data_jual($id, $_POST, $_FILES, $user_data) > 0){
            echo "
                <script>
                    alert('Data berhasil diedit.');
                    document.location.href = 'jual.php';
                </script>
                ";
        }
        else{
            echo "
                <script>
                    alert('Data gagal diedit pada database');
                    document.location.href = 'jual.php';
                </script>
                ";
            echo "Error : ";
            echo mysqli_error($conn);
            echo "<br>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rumahin.com : Ubah Data Penjualan</title>
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
            <h2 style="display: inline;margin-left:15px">Edit Data Bangunan</h2>
            <button onclick="location.href='jual.php'" id="kembali">Kembali</button>
            <hr>
            <form name="finput" id="finput" autocomplete="off" action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <input type="hidden" name="user_id" value="<?php echo $data_jual["user_id"];?>">
                <input type="hidden" name="nama_penjual" value="<?php echo $data_jual["nama_penjual"];?>">
                <input type="hidden" name="email" value="<?php echo $data_jual["email"];?>">
                <input type="hidden" name="no_telepon" value="<?php echo $data_jual["no_telepon"];?>">

                <input type="hidden" name="gambar_lama" value="<?php echo $data_jual["gambar_bangunan"];?>">

                <div class="row justify-content-around">
                    <div class="col-5">
                        <h5>Data Diri</h5>
                        <input type="text" placeholder="Nama Anda" id="inpname" name="nama_penjual" value="<?= $data_jual["nama_penjual"]; ?>" disabled>
                        <br>
                        <br>
                        <br>
                        <h5>Data Bangunan</h5>
                        <input type="text" placeholder="Nama Bangunan" id="inpBangunan" name="nama_bangunan" value="<?= $data_jual["nama_bangunan"]; ?>" required>
                        <br>
                        <?php $selected = $data_jual["tipe_bangunan"];?>
                        <select id="inpTipe" name="tipe_bangunan">
                            <option value="Apartemen" <?php if($selected == 'Apartemen'){echo ("selected");}?>>Apartemen</option>
                            <option value="Ruko" <?php if($selected == 'Ruko'){echo ("selected");}?>>Ruko</option>
                            <option value="Rumah" <?php if($selected == 'Rumah'){echo ("selected");}?>>Rumah</option>
                            <option value="Gedung" <?php if($selected == 'Gedung'){echo ("selected");}?>>Gedung</option>
                        </select>
                        <br>
                        <input type="text" placeholder="Lokasi" id="inpLokasi" name="lokasi_bangunan" value="<?= $data_jual["lokasi_bangunan"]; ?>" required>
                        <input type="number" placeholder="Luas Bangunan m&sup2" id="inpLuas" name="luas_bangunan" value="<?= $data_jual["luas_bangunan"]; ?>"  required>
                        <input type="number" placeholder="Harga (Rp)" id="inpHarga" name="harga_bangunan" value="<?= $data_jual['harga_bangunan'] ?>" required>
                        <br>
                        <textarea placeholder="Keterangan" id="inpKet" name="keterangan" required><?= $data_jual["keterangan"]; ?></textarea>
                    </div>
                    <div class="pemisah"></div>
                    <div class="col-5">
                        <h5>Unggah Gambar Bangunan</h5>
                        <br>
                        <input type="file" name="gambar_bangunan" value="<?php echo $data_jual["gambar_bangunan"];?>">
                        <p>Gambar sebelumnya</p>
                        <img src="image/<?php echo $data_jual["gambar_bangunan"] ?>" width="200px"><br>
                    </div>
                </div>
                <br>
                <div class="row">
                        <div class="col" style="margin: 0 44%">
                            <input type="submit" value="Simpan Perubahan" id="post">
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