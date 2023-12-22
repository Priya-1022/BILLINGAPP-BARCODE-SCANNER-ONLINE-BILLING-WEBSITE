<!-- cart-delete.php -->

<?php
include("inc/db.php");
$id = $_GET['id'];
$sel = "SELECT * FROM cart WHERE cart_id='$id'";
$rs = $con->query($sel);
$row = $rs->fetch_assoc();
$d = "DELETE FROM cart WHERE cart_id='$id'";
$con->query($d);
header("location:cart.php?cid=".$id);
?>