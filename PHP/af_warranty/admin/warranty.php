<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include('server/connect/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>WARRANTY</title>
    <!-- Custom fonts for this template -->
    <?php include "components/link/head.php"; ?>
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
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 ">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>หมายเลขเครื่อง</th>
                                            <th>วันที่ลงทะเบียน</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>รับประกัน(ปี)</th>
                                            <th>วันที่เริ่ม</th>
                                            <th>วันที่สิ้นสุด(ปี+7วัน)</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM product ORDER BY id DESC";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["SerialNumber"]; ?></td>
                                                <td><?php echo date_edit($row["Register_date"]); ?></td>
                                                <td><?php echo $row["Customer_name"]; ?></td>
                                                <td><?php echo $row["Warranty"]; ?></td>
                                                <td><?php echo date_edit_start($row["Purchase_date"]); ?></td>
                                                <td><?php echo date_edit_start(date_edit_warranty($row["Purchase_date"], $row["Warranty"])); ?></td>
                                                <td><?php
                                                    if (compareDate(date_edit_warranty_edit($row["Purchase_date"], $row["Warranty"]), date('Y-m-d')) == 1) {
                                                        echo "<h5 class='green1'>รับประกัน</h5>";
                                                    } else {
                                                        echo "<h5 class='red1'>หมดอายุ</h5>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <?php

            //<!-- Footer -->
            include "components/footer.php";
            //<!-- End of Footer -->

            ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include "components/link/footer.php"; ?>
    <script src="data/warranty/warranty.js"></script>
    <script src="components/form/form.js">
        $(document).ready(function() {
            $('#select_all').on('click', function() {
                if (this.checked) {
                    $('.checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });
            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
                }
            });
        });
    </script>
</body>

</html>