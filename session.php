<?php 
session_start();
if(!isset($_SESSION['function'])){
    header("Location:../login_side/");
    };
?>