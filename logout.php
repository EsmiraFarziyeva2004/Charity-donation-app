<?php 
    include 'system/config.php';
    session_destroy();
    unset($_SESSION['user']);
    unset($_COOKIE['user']);
    setcookie('user', null, time() - (86400 * 30));
    header('location:'.HOST);
?>