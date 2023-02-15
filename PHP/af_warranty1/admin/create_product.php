<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include('server/connect/connect.php');
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CREATE PRODUCT</title>

    <!-- Custom fonts for this template -->
    <?php include "components/link/head.php"; ?>
    <link href="components/form/form.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "components/sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include "components/topbar.php"; ?>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Import Excel</h6>
                        </div>
                        <div class="card-header py-3 d-flex justify-content-between m-auto col-xl-10 col-12 row">
                            <form method="post" id="import_excel" enctype="multipart/form-data" class="mr-2 col-xl-7 col-12">
                                <div class="row">
                                    <div class="btn btn-default col-9" style="border: 1px solid;">
                                        <input type="file" name="file" id="file">
                                    </div>
                                    <button type="submit" id="submit" name="Import" class="btn btn-primary col-3">
                                        <i class="fa fa-plus"></i> Import
                                    </button>
                                </div>
                            </form>
                            <form action="data/create_product//DownloadFormat.php" method="POST" class="col-xl-4 col-12 d-flex justify-content-center ssss">
                                <button type="submit" class="btn btn-success " id="1" name='view_exm'>
                                    <i class="fa fa-server"></i> Download Format
                                </button>
                            </form>
                        </div>
                        <div class="card-body d-none" id="table-show-create">
                            <div class="table-responsive">
                                <div id="table-text-create">
                                </div>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>หมายเลขเครื่อง</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>หมายเลขเครื่อง</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="tBody" class="h5 font-weight-bold">
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <h5 class="text-danger col-12">หมายเหตุ*</h5>
                                <p class="col-12"><span class="text-success ">SUCCESS : </span>หมายเลขเครื่องบันทึกลงฐานข้อมูลเรียบร้อยเเล้ว</p>
                                <p class="col-12"><span class="text-danger  ">FAIL : </span>หมายเลขเครื่องไม่ถูกต้องหรือมีหมายเลขเครื่องนั้นอยู่เเล้ว</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">เพิ่มสินค้า</h6>
                        </div>
                        <div class="card-body">
                            <?php include 'components/form/create_product/form_create_product.php'; ?>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>

            <!-- Footer -->
            <?php include "components/footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include "components/link/footer.php"; ?>
    <script src="components/form/get_amphure/script.js"></script>
    <script src="data/create_product/create_product.js"></script>
    <script src="components/form/form.js">
    </script>

</body>

</html>