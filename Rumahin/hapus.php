<?php
    session_start();
    include("koneksi.php");
    include("fungsi.php");

    if(!cek_login($conn)){                                    //jika user belum login ($user_data tidak valid)
        header("Location: login.php");
        die;
    }
    
    $id = $_GET["id"];

    $user_data = cek_login($conn);
    $data_jual = ambil_data_jual($id);
       
    if(!$user_data['admin'] && ($_SESSION['user_id'] != $data_jual['user_id'])){
        echo "<script>alert('Anda tidak memiliki akses untuk mengubah data ini.');
        document.location.href = 'jual.php';</script>";
    }

    if(hapus_data_jual($id) > 0){
        echo "
            <script>
                alert('Data berhasil dihapus.');
                document.location.href = 'jual.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus.');
                document.location.href = 'jual.php';
            </script>
        ";
    }
?>