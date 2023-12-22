<?php
include("inc/db.php");
if (isset($_POST["save2"])) {
    $cid = $_POST['cid'];
    $bc = $_POST['barcode'];

    $ins = "INSERT INTO cart SET barcode='$bc',cu_id='$cid'";
    if ($con->query($ins)) {
        header("location:cart.php?cid=".$cid);
    }
}
?>