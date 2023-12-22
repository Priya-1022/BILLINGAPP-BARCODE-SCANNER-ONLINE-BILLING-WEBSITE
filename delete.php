<!-- delete.php -->

<?php
include("inc/db.php");
$id = $_GET['id'];
$sel = "SELECT * FROM products WHERE pid='$id'";
$rs = $con->query($sel);
$row = $rs->fetch_assoc();
$d = "DELETE FROM products WHERE pid='$id'";
$con->query($d);
header("location:cart.php");
?>