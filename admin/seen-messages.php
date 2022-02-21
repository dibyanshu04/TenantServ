<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsaid'] == 0)) {
    header('location:logout.php');
} else {

    //code to unread the message
    if (isset($_GET['rid'])) {
        $rvid = intval($_GET['rid']);
        $query = mysqli_query($con, "update tblcontact set status='0' where id='$rvid'");
        echo '<script>alert("Message Moved to Unread.")</script>';
        echo "<script>window.location.href='seen-messages.php'</script>";
    }

    //Delete the message
    if (isset($_GET['delrid'])) {
        $rvid = intval($_GET['delrid']);
        $query = mysqli_query($con, "delete from tblcontact where id='$rvid'");
        echo '<script>alert("Message deleted.")</script>';
        echo "<script>window.location.href='seen-messages.php'</script>";
    }
?>
    <!doctype html>
    <html lang="en">

    <head>

        <title>Manage Messages || Real Estate Management System</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <?php include_once('includes/header.php'); ?>

            <?php include_once('includes/sidebar.php'); ?>

            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="container-fluid  dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Messages</h2>

                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="messages.php" class="breadcrumb-link"> Messages</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Seen Messages</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic table  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Seen Messages</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                <tr>
                                                    <th>S.NO</th>

                                                    <th>Name</th>
                                                    <th>Email </th>
                                                    <th>Phone</th>
                                                    <th>Message Date</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $pid = intval($_GET['proid']);
                                                $qry = mysqli_query($con, "SELECT * FROM `tblcontact`  where status='1' ORDER BY `tblcontact`.`message_date` DESC");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($qry)) {

                                                ?>

                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>

                                                        <td>
                                                            <?php echo $row['name']; ?>
                                                        </td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['phone']; ?></td>
                                                        <td><?php echo $row['message_date']; ?></td>
                                                        <td><?php echo $row['message']; ?></td>
                                                        <td>
                                                            <a href="seen-messages.php?rid=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to Mark this message as Unread ?')">Mark Unread</a> |
                                                            <a href="seen-messages.php?delrid=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to Delete this message  ?')">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $cnt = $cnt + 1;
                                                } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic table  -->
                        <!-- ============================================================== -->
                    </div>




                </div>
                <!-- ============================================================== -->
                <?php include_once('includes/footer.php'); ?>
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
        <script src="assets/libs/js/main-js.js"></script>
        <script src="../../../../../cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/vendor/datatables/js/data-table.js"></script>
        <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="../../../../../cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
        <script src="../../../../../cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
        <script src="../../../../../cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

    </body>

    </html>
<?php }  ?>