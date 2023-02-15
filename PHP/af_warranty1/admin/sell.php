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
    <title>TABLE SELL</title>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">ผู้ขาย</h6>
                            <form method="post" action="data/sell/export.php" id="submit_export_product1">
                                <button type="submit" class="btn btn-primary" name="export" id="submit_export_product">
                                    Export
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>หมายเลขเครื่อง</th>
                                            <th>วันที่ลงทะเบียน</th>
                                            <th>ร้านค้า</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>เบอร์โทร</th>
                                            <th>เพิ่มเติม</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM register_sell ORDER BY id DESC";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {

                                            $Register_date = $row["Register_date"];
                                            $Register_date = new DateTime($Register_date);
                                            $Register_date = $Register_date->format('d/m/Y');
                                        ?>
                                            <tr>
                                                <td><?php echo $row["SerialNumber"]; ?></td>
                                                <td><?php echo $Register_date; ?></td>
                                                <td><?php echo $row["Dealer"]; ?></td>
                                                <td><?php echo $row["Customer_name"]; ?></td>
                                                <td><?php echo $row["Tel"]; ?></td>
                                                <td><?php echo $row["Comment"]; ?></td>
                                                <td class="d-flex justify-content-between">
                                                    <a type="button" class="btn btn-info btn-xs view_data mr-1" id="<?php echo $row["id"]; ?>">
                                                        <ion-icon name="eye-outline"></ion-icon>
                                                    </a>
                                                    <a type="button" class="btn btn-warning btn-xs edit_data mr-1 <?php echo ($_SESSION["lavel"] == 'Member') ? 'disabled' : ''; ?>" id="<?php echo $row["id"]; ?>">
                                                        <ion-icon name="construct-outline"></ion-icon>
                                                    </a>
                                                    <a type="button" class="btn btn-danger delete_data <?php echo ($_SESSION["lavel"] == 'Member') ? 'disabled' : ''; ?>" id="<?php echo $row["id"]; ?>">
                                                        <ion-icon name="trash-outline"></ion-icon>
                                                    </a>
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
            // modal
            include "components/modal/product/details_modal.php";
            include "components/modal/product/add_edit_modal.php";

            //<!-- Footer -->
            include "components/footer.php";
            //<!-- End of Footer -->

            ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include "components/link/footer.php"; ?>
    <script src="components/form/get_amphure/script.js"></script>
    <script src="data/sell/sell.js"></script>
    <script src="components/form/form.js"></script>
</body>

</html>