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
    <title>USER</title>
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
                            <h6 class="m-0 font-weight-bold text-primary">สมาชิก</h6>
                            <a href="create_user.php" type="button" class="btn btn-warning">เพิ่ม</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>username</th>
                                            <th>password</th>
                                            <th>level</th>
                                            <th>date time</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM users ORDER BY id DESC";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row["username"]; ?></td>
                                                <td><?php echo $row["password"]; ?></td>
                                                <td><?php echo $row["lavel"]; ?></td>
                                                <td><?php echo $row["created_at"]; ?></td>
                                                <td>
                                                    <ion-icon type="button" id="<?php echo $row["id"]; ?>" name="trash-outline" class="btn btn-danger btn-xs delete_data"></ion-icon>
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
    <script src="data/user/user.js"></script>
</body>

</html>