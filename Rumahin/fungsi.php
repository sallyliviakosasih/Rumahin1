<?php
    function cek_login($conn){
        if(isset($_SESSION['user_id'])){
            $id = $_SESSION['user_id'];
            $query = "SELECT * FROM pengguna WHERE user_id = $id LIMIT 1";  //mencari data user_id yang sama dengan $id di tabel pengguna (limit 1)

            $result = mysqli_query($conn, $query);
            if($result && mysqli_num_rows($result) > 0){                    //jika $result ada dan baris data > 0 (data tidak kosong)
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        //jika semua yang di atas tidak bekerja, maka redirect pengguna
        return null;
    }

    function cek_username($username){
        global $conn;
        $query = "SELECT user_name FROM pengguna WHERE user_name = '$username'";
        $result = mysqli_query($conn, $query);
        $checkKey = true;
        if($result && mysqli_num_rows($result) > 0){                    //jika $result ada dan baris data > 0 (data tidak kosong)
            $checkKey = false;
            echo "<script>alert('Username telah terpakai.');</script>";
        }
        return $checkKey;
    }

    function check_user_id($str){
        global $conn;
        $query = "SELECT user_id FROM pengguna WHERE user_id = '$str'";
        $result = mysqli_query($conn, $query);
        $checkKey = false;
        if($result && mysqli_num_rows($result) > 0){                    //jika $result ada dan baris data > 0 (data tidak kosong)
            $checkKey = true;
        }
        return $checkKey;
    }

    function create_id($length){
        $text = "0123456789";
        $randStr = substr(str_shuffle($text), 0, $length);

        $checkKey = check_user_id($randStr);

        while($checkKey){                          //selama masih sama, random ulang
            $randStr = substr(str_shuffle($text), 0, $length);
            $checkKey = check_user_id($randStr);
        }

        return $randStr;
    }

    /*function load_array_jual(){
        global $conn;

        $result = mysqli_query($conn, "SELECT * FROM daftar_jual ORDER BY id DESC");

        if($result && mysqli_num_rows($result) > 0){
            $rows = [];
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;                                     //menyimpan data per baris dari database ke array rows
            }
            return $rows;
        }

        return null;
    }*/

    function add_data_jual($data, $files, $user_data){
        global $conn;

        $user_id = $user_data["user_id"];
        $nama_penjual = $user_data['nama_pengguna'];
        $nama_bangunan = htmlspecialchars($data['nama_bangunan']);
        $tipe_bangunan = htmlspecialchars($data['tipe_bangunan']);
        $lokasi_bangunan = htmlspecialchars($data['lokasi_bangunan']);
        $keterangan = htmlspecialchars($data['keterangan']);
        $luas_bangunan = htmlspecialchars($data['luas_bangunan']);
        $harga_bangunan = htmlspecialchars($data['harga_bangunan']);
        
        $email = $user_data["email"];
        $no_telepon = $user_data['no_telepon'];
        $date = date('Y-m-d');
        
        $gambar_bangunan = upload_gambar($files);

        $affected_rows = 0;
        
        if ($gambar_bangunan)  {
            $msg = "Image uploaded successfully";

            $query = "INSERT INTO daftar_jual VALUES ('', '$user_id', '$nama_penjual', '$nama_bangunan', '$tipe_bangunan', '$luas_bangunan',
                    '$harga_bangunan', '$gambar_bangunan', '$lokasi_bangunan', '$keterangan', '$email', '$no_telepon', '$date')";

            //Berhasil, maka masukkan data ke database
            $result = mysqli_query($conn, $query);
            $affected_rows = mysqli_affected_rows($conn);
        } else {
            $msg = "Failed to upload image";
        }

        echo "<script>alert('$msg');</script>";

        return $affected_rows;
    }

    function hapus_data_jual($id){
        global $conn;
        
        $result = mysqli_query($conn, "SELECT * FROM daftar_jual WHERE id = $id");

        $row = mysqli_fetch_assoc($result);

        $filename = "image/".$row['gambar_bangunan'];
        if(!unlink($filename)){
            echo "<script>alert('Gambar gagal dihapus.');";
        }

        $query = "DELETE FROM daftar_jual WHERE id = $id";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function ambil_data_jual($id){
        global $conn;

        $result = mysqli_query($conn, "SELECT * FROM daftar_jual WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    function edit_data_jual($id, $data, $files){
        global $conn;

        //Hapus gambar (karena akan diedit)
        $result = mysqli_query($conn, "SELECT * FROM daftar_jual WHERE id = $id");

        $row = mysqli_fetch_assoc($result);

        $user_id = $data["user_id"];
        $nama_penjual = $data['nama_penjual'];
        $nama_bangunan = htmlspecialchars($data['nama_bangunan']);
        $tipe_bangunan = htmlspecialchars($data['tipe_bangunan']);
        $lokasi_bangunan = htmlspecialchars($data['lokasi_bangunan']);
        $keterangan = htmlspecialchars($data['keterangan']);
        $luas_bangunan = htmlspecialchars($data['luas_bangunan']);
        $harga_bangunan = htmlspecialchars($data['harga_bangunan']);
        $gambar_lama = htmlspecialchars($data['gambar_lama']);
        
        $email = $data["email"];
        $no_telepon = $data['no_telepon'];
        $date = date('Y-m-d');

        $affected_rows = 0;

        if($files['gambar_bangunan']['error'] === 4){
            $gambar_bangunan = $gambar_lama;
        } else {
            $gambar_bangunan = upload_gambar($files);

            if ($gambar_bangunan){
                $msg = "Image uploaded successfully";
    
                //Hapus Gambar Lama yang ada di folder
                $filename = "image/".$row['gambar_bangunan'];
                if(!unlink($filename)){
                    echo "<script>alert('Gambar gagal dihapus.');";
                }
            }else{
                $msg = "Failed to upload image";
                return $affected_rows;
            }

            echo "<script>alert('$msg');</script>";
        }

        $query = "UPDATE daftar_jual SET 
                        user_id = '$user_id',
                        nama_penjual = '$nama_penjual',
                        nama_bangunan = '$nama_bangunan',
                        tipe_bangunan = '$tipe_bangunan',
                        lokasi_bangunan = '$lokasi_bangunan',
                        luas_bangunan = '$luas_bangunan',
                        harga_bangunan = '$harga_bangunan',
                        gambar_bangunan = '$gambar_bangunan',
                        keterangan = '$keterangan',
                        email = '$email',
                        no_telepon = '$no_telepon',
                        date = '$date'
                        WHERE id = $id
                    ";

        //Berhasil, maka masukkan data ke database
        $result = mysqli_query($conn, $query);    
        $affected_rows = mysqli_affected_rows($conn);

        if($affected_rows == 0) echo "<script>alert('Tidak ada data yang berubah');</script>";

        return $affected_rows;
    }

    function upload_gambar($files){
        $name = $files['gambar_bangunan']['name'];
        $tempname = $files['gambar_bangunan']['tmp_name'];
        $folder = "image/".$name;
        $size = $files['gambar_bangunan']['size'];

        $imageValidExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $name);
        $imageExtension = strtolower(end($imageExtension));
        
        if(!in_array($imageExtension, $imageValidExtension)){
            echo "<script>alert('Format image tidak valid.');</script>";
            return false;
        }

        if($size > 52428800){ //50MB
            echo "<script>alert('Ukuran gambar terlalu besar. (Maksimal 50 MB)');</script>";
            return false;
        }

        if(move_uploaded_file($tempname, $folder)){
            return $name;
        }

        return false;
    }

    function filter($keyword, $filter){
        global $conn;

        if($keyword == ""){
            if($filter == "All"){
                $query = "SELECT * FROM daftar_jual ORDER BY id DESC";
            } else {
                $query = "SELECT * FROM daftar_jual WHERE tipe_bangunan = '$filter' ORDER BY id DESC";
            }
        }else{
            if($filter == "All"){
                $query = "SELECT * FROM daftar_jual
                            WHERE nama_bangunan LIKE '%$keyword%'
                            OR nama_penjual LIKE '%$keyword%'
                            OR lokasi_bangunan LIKE '%$keyword%'
                            OR keterangan LIKE '%$keyword%'
                            ORDER BY id DESC
                        ";
            } else {
                $query = "SELECT * FROM daftar_jual
                            WHERE (nama_bangunan LIKE '%$keyword%'
                            OR nama_penjual LIKE '%$keyword%'
                            OR lokasi_bangunan LIKE '%$keyword%'
                            OR keterangan LIKE '%$keyword%')
                            AND tipe_bangunan = '$filter'
                            ORDER BY id DESC
                        ";
            }
        }

        $result = mysqli_query($conn, $query);
        
        if($result && mysqli_num_rows($result) > 0){
            $rows = [];
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;                                     //menyimpan data per baris dari database ke array rows
            }
            return $rows;
        }
    }
?>