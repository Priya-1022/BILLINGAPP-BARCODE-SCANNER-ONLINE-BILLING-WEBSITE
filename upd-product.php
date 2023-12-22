<?php
include("inc/db.php");
if (isset($_POST["save"])) {
    $id=$_POST['id'];
    $pn = $_POST['pname'];
    $pr = $_POST['pprice'];
    $pb = $_POST['pbar'];
    $ins = "UPDATE products SET pname='$pn',pprice='$pr',barcode='$pb' WHERE pid='$id'";
    if ($con->query($ins)) {
        header("location:list-product.php");
    }
}
?>