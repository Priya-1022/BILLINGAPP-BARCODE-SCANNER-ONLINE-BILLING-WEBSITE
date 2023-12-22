<!-- print.php -->

<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("location:login.php");
}
include("inc/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div class="container">

        <h2>SITM MART</h2>
        <pre>
Raja Rammohan Road, Siriti Crossing,
Tollygunge,
Kolkata- 700053

PH- 1234567890
</pre>

        <?php
        $total = 0;
        $cid = $_GET['cid'];
        $sel = "SELECT * FROM customer WHERE c_id='$cid'";
        $rs = $con->query($sel);
        $row = $rs->fetch_assoc();
        ?>

        <p>Name:
            <?php echo $row['c_name']; ?>
        </p>
        <p>ph.no:
            <?php echo $row['ph_no']; ?>
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th>product Name</th>

                    <th>Barcode</th>
                    <th>product Price</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sel = "SELECT products.*,cart.* FROM cart INNER JOIN products ON products.barcode=cart.barcode";
                $rs = $con->query($sel);
                while ($row = $rs->fetch_assoc()) {

                    $total = $total + $row['pprice'];
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['pname'] ?>
                        </td>

                        <td>
                            <?php echo $row['barcode'] ?>
                        </td>

                        <td>
                            <?php echo $row['pprice'] ?>
                        </td>

                    </tr>
                <?php } ?>

                <tr>
                    <th colspan="2" style="text-align:right">Total</th>
                    <th>
                        <?php echo $total; ?>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</body>



<script>
    window.print();
    setTimeout(function () { window.close(); }, 5000);
</script>

<?php
$sel = "SELECT products.*,cart.* FROM cart INNER JOIN products ON products.barcode=cart.barcode";
$rs = $con->query($sel);
while ($row = $rs->fetch_assoc()) {

    $d = "DELETE FROM cart WHERE barcode='" . $row['barcode'] . "'";
    $con->query($d);

    $d = "DELETE FROM products WHERE pid='" . $row['pid'] . "'";
    $con->query($d);
}
?>

</html>