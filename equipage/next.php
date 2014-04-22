<?php
session_start();
$m=$_SESSION['pgno'];
$m++;
$_SESSION['pgno']=$m;
header('Location: ../equipage/results.php');
?>