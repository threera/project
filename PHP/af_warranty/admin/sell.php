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
                    <form method="post" action="data/sell/export.php" id="submit_export_product" class="ml-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ผู้ขาย</h6>
                                <div class="d-flex justify-content-between">
                                    <a type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs" onClick="return confirm('คุณเเน่ใจใช่ไมที่ต้องการจะลบ?');">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a>
                                        <button type="submit" class="btn btn-primary ml-4" disabled name="export" id="submit_export_product" onClick="return confirm('คุณต้องการ EXPORT ใชไม?');">
                                            <ion-icon name="exit-outline"></ion-icon>
                                        </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm" id="dataTable" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>เลือกเพื่อลบ</th>
                                                <th>หมายเลขเครื่อง</th>
                                                <th>วันที่ลงทะเบียน</th>
                                                <th>ร้านค้า</th>
                                                <th>ชื่อ-นามสกุล</th>
                                                <th>เบอร์โทร</th>
                                                <th>เพิ่มเติม</th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th class="d-none"></th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM register_sell ORDER BY id DESC";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="checkbox_value[<?php echo $row["id"]; ?>]" class="delete_checkbox" value="<?php echo $row["id"]; ?>" />
                                                    </td>
                                                    <td><?php echo $row["SerialNumber"]; ?></td>
                                                    <td><?php echo date_edit($row["Register_date"]); ?></td>
                                                    <td><?php echo $row["Dealer"]; ?></td>
                                                    <td><?php echo $row["Customer_name"]; ?></td>
                                                    <td><?php echo $row["Tel"]; ?></td>
                                                    <td><?php echo $row["Comment"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Purchase_date"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Brand"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Product"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Model"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Email"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Warranty"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Number"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Soi"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Road"]; ?></td>
                                                    <td class="d-none"><?php echo $row["Village"]; ?></td>
                                                    <td class="d-none"><?php echo $row["province"]; ?></td>
                                                    <td class="d-none"><?php echo $row["amphure"]; ?></td>
                                                    <td class="d-none"><?php echo $row["district"]; ?></td>
                                                    <td class="d-none"><?php echo $row["zipcode"]; ?></td>
                                                    <td class="d-flex justify-content-between">
                                                        <a type="button" class="btn btn-info btn-xs view_data mr-1" id="<?php echo $row["id"]; ?>">
                                                            <ion-icon name="eye-outline"></ion-icon>
                                                        </a>
                                                        <a type="button" class="btn btn-warning btn-xs edit_data mr-1 <?php echo ($_SESSION["lavel"] == 'Member') ? 'disabled' : ''; ?>" id="<?php echo $row["id"]; ?>">
                                                            <ion-icon name="construct-outline"></ion-icon>
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
                    </form>
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
    <script src="data/sell/sell.js"></script>
    <script src="components/form/form.js"></script>
</body>

</html>