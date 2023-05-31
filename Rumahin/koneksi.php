<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "progweb_db";

    if(!$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name)){
        die("koneksi ke server gagal.");
    }
?>