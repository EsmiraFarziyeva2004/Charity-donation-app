<?php
    session_start();
    // ini_set('display_errors', 0);
    // ini_set('display_startup_errors', 0);
    // error_reporting(0); // E_ALL
    
    define('ROOT', 'charity');
    define('HOST', 'http://localhost/charity');

    $error      = [];
    $error_msg  = [];

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    global $db;
   
?>