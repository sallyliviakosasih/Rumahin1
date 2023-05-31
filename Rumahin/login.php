<?php
    session_start();                        //Untuk mengakses $_SESSION, diperlukan session_start()
    include("koneksi.php");                 //$conn akan didapatkan dari sini
    include("fungsi.php");

    if(cek_login($conn)){
        header("Location: index.php");
        die;
    }

    if(($_SERVER['REQUEST_METHOD'] == "POST") && (isset($_POST['submit']))){
      if($_POST['submit'] == "login"){
        //Ada sesuatu yang telah di POST
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){    //jika kedua data tidak kosong dan username bukanlah angka
            //baca data dari database
            $query = "SELECT * FROM pengguna WHERE user_name = '$user_name' LIMIT 1";         //mencari data user_name yang sama dengan $user_name di tabel pengguna (limit 1)
            
            $result = mysqli_query($conn, $query);

            if($result && mysqli_num_rows($result) > 0){                    //jika $result ada dan baris data > 0 (data tidak kosong)
                $user_data = mysqli_fetch_assoc($result);
                
                if(password_verify($password, $user_data['password'])){
                    $_SESSION['user_id'] = $user_data['user_id'];           //digunakan untuk mengset sesi pengguna menjadi user_idnya agar tidak redirect terus menerus (sudah masuk)
                                                                            //Catatan : user_id harus int (index array)
                    header("Location: index.php");
                    die;
                }
                else{
                    echo "Password salah";
                }
            }
            else{
                echo "Username tidak ditemukan";
            }
        }
        else{
            echo "Informasi yang dimasukkan tidak valid";
        }
      } else if ($_POST['submit'] == "signup") {
        //Ada sesuatu yang telah di POST
        $user_name = strtolower(htmlspecialchars($_POST['user_name']));
        $nama = htmlspecialchars($_POST['nama']);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password_confirm = mysqli_real_escape_string($conn, $_POST['password2']);
        $email = htmlspecialchars($_POST['email']);
        $no_telepon = htmlspecialchars($_POST['no_telepon']);

        if(!empty($user_name) && cek_username($user_name) && !empty($nama) && !empty($password) && !empty($password_confirm) 
          && $password === $password_confirm && !is_numeric($user_name)){    //jika kedua data tidak kosong dan username bukanlah angka
            //enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            //simpan ke database
            $user_id = create_id(20);
            $query = "INSERT INTO pengguna (user_id, admin, user_name, password, nama_pengguna, email, no_telepon)
                      VALUES ('$user_id', '0', '$user_name', '$password', '$nama', '$email', '$no_telepon')";

            mysqli_query($conn, $query);

            header("Location: login.php");
            die;
        }
        else{
            echo "Informasi yang dimasukkan tidak valid";
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Rumahin.com : Log in | Sign up</title>
  <link rel="icon" href="index_img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'><link rel="stylesheet" href="./style-login.css">

</head>
<body>
      <div class="d-flex justify-content-center">
        <h1 class="navbar-brand" href="#" style="position: center; cursor: pointer;" onclick="location.href='index.php'"><img src="index_img/logo.png" width="72px" height="72px" class="me-2">Rumahin.com</h1> 
      </div>

  <!--View Login-->
    <?php if ((isset($_GET['view'])) && ($_GET['view'] == "daftar")) : ?>
    <!-- View Register -->
    <div class="cont">
        <div class="form sign-in">
          <form action="" method="post" style="overflow: auto; max-height: 450px" autocomplete="off">
            <h2>Time to feel like home,</h2>
            <label>
              <span>Username</span>
              <input type="text" name="user_name" required>
            </label>
            <label>
              <span>Nama Lengkap</span>
              <input type="text" name="nama" required>
            </label>
            <label>
              <span>Email</span>
              <input type="email" name="email">
            </label>
            <label>
              <span>No Telepon</span>
              <input type="text" name="no_telepon" required>
            </label>
            <label>
              <span>Password</span>
              <input type="password" name="password" required>
            </label>
            <label>
              <span>Confirm Password</span>
              <input type="password" name="password2" required>
            </label>
            <input type="hidden" name="submit" value="signup">
            <button type="submit" class="submit">Sign Up</button>
            <button type="button" class="fb-btn."><span></span></button>
          </form>
        </div>
    <div class="sub-cont">
      <div class="img">
          <div class="img__text m--up">
            <h2>New here?</h2>
            <p>Sign up and discover great amount of new opportunities!</p>
          </div>
          <div class="img__text m--in">
            <h2>One of us?</h2>
            <p>If you already has an account, just sign in. We've missed you!</p>
          </div>
          <div class="img__btn">
            <span class="m--up">Sign Up</span>
            <span class="m--in">Log In</span>
          </div>
        </div>
      <form action="" method="post" autocomplete="off">
        <div class="form sign-up">
          <h2>Welcome back,</h2>
          <label>
            <span>Username</span>
            <input type="text" name="user_name" required>
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password" required>
          </label>
          <!--<p class="forgot-pass">Forgot password?</p>-->
          <input type="hidden" name="submit" value="login">
          <button type="submit" class="submit">Log In</button>
          <button type="button" class="fb-btn."><span></span></button>
        </div>
      </form>
    </div>
    </div>
  <?php else : ?>
  <div class="cont">
  <form action="" method="post" autocomplete="off">
    <div class="form sign-in">
      <h2>Welcome back,</h2>
      <label>
        <span>Username</span>
        <input type="text" name="user_name" required>
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password" required>
      </label>
      <!--<p class="forgot-pass">Forgot password?</p>-->
      <input type="hidden" name="submit" value="login">
      <button type="submit" class="submit">Log In</button>
      <button type="button" class="fb-btn."><span></span></button>
    </div>
  </form>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Log In</span>
      </div>
    </div>
    <div class="form sign-up">
      <form action="" method="post" style="overflow: auto; max-height: 450px" autocomplete="off">
        <h2>Time to feel like home,</h2>
        <label>
          <span>Username</span>
          <input type="text" name="user_name" required>
        </label>
        <label>
          <span>Nama Lengkap</span>
          <input type="text" name="nama" required>
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="email">
        </label>
        <label>
          <span>No Telepon</span>
          <input type="text" name="no_telepon" required>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password" required>
        </label>
        <label>
          <span>Confirm Password</span>
          <input type="password" name="password2" required>
        </label>
        <input type="hidden" name="submit" value="signup">
        <button type="submit" class="submit">Sign Up</button>
        <button type="button" class="fb-btn."><span></span></button>
      </form>
    </div>
  </div>
  <?php endif; ?>
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

  <script src="./script.js"></script>

</body>
</html>
