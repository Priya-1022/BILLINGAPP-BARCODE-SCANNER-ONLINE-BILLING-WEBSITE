<!-- ins-customer.php -->

<?php
include("inc/db.php");
if (isset($_POST["save2"])) {
    $cn = $_POST['name'];
    $cp = $_POST['ph_no'];

    $ins = "INSERT INTO customer SET c_name='$cn',ph_no='$cp'";
    if ($con->query($ins)) {
        header("location:list-customer.php");
    }
}
?>