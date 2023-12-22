<?php
include("inc/db.php");
$id = $_GET['id'];
$sel = "SELECT * FROM customer WHERE c_id='$id'";
$rs = $con->query($sel);
$row = $rs->fetch_assoc();
$d = "DELETE FROM customer WHERE c_id='$id'";
$con->query($d);
header("location:list-customer.php");
?>