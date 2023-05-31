<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        unset($_SESSION['user_id']);    //keluar dari sesi
    }

    header("Location: login.php");
    die;
?>