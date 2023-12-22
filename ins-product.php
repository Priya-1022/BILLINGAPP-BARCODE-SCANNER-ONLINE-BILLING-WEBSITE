<!-- ins-product.php -->

<?php
include("inc/db.php");
if (isset($_POST["save"])) {
    $pn = $_POST['pname'];
    $pr = $_POST['pprice'];
    $pb = $_POST['pbar'];
    $ins = "INSERT INTO products SET pname='$pn',pprice='$pr',barcode='$pb'";
    if ($con->query($ins)) {
        header("location:list-product.php");
    }
}
?>