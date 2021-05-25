<?php 
    session_start();
    $_SESSION = array(); 
    header('Location:../index');
    $result -> free_result();
    exit();
?>
