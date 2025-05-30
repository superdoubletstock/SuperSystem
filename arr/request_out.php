<?php
session_start();


// Set session timeout (e.g., 3min minutes)
$timeout_duration = 3000;

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // Timeout: Destroy session and redirect to login
    session_unset();
    session_destroy();
    header("Location: ../index.php?timeout=1");
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time

// Now you can access all user data
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];
$department = $_SESSION['department'];
$role = $_SESSION['role'];
$phone = $_SESSION['phonenumber'];
$password = $_SESSION['password']; // Not recommended to show

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>SDT</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <script src="../assets/js/chart-master/Chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>

<body>

    <section id="container">
        <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>SDT</b></a>
         <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
         
        <h2 id="trust" style="
     
            margin: 0;
            font-size: 26px;
            font-weight: bold;
            color: #2e8b57;
            text-align: center;
            text-transform: uppercase;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">
           <span style="opacity:0">---------</span> We trust in God !!  <span style="opacity:0">-----------------------------------</span> እግዚአብሔር  ይባረክ !!

        </h2>
        
  
            </div>
          
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../index.php">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle"
                                width="60"></a></p>
                    <h5 class="centered"><?php echo $fullname; ?></h5>
     <?php
                    if ($role == "administrator") {

                    ?>
                        <!-- Go back to home page icon (using Font Awesome) -->
                        <li class="mt">
                            <a href="../SuperAdmin/dashboard.php" title="Go to Home Page" style="text-decoration: none;">
                            <i class="fas fa-home" style="font-size: 24px; margin-left: 10px;"></i>
                             <span>Admin Home Page</span>
                        </a>
                        </li>


                    <?php
                    }
                    ?>
                    <li class="mt">
                        <a href="dashboard.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="stock.php">
                            <i class="fa fa-desktop"></i>
                            <span>Stock</span>
                        </a>

                    </li>

                     <li class="sub-menu">
                      <a href="javascript:;" >
                     <i class="fa fa-bell" style="position: relative; color: #fff;">
                     </i>
                          <span>Notification</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="request.php">Main Store In request</a></li>
                          <li><a  href="request_out.php">Main Store Out request </a></li>
                          <li><a  href="#">Other</a></li>
                      </ul>
                  </li>
                    <li class="sub-menu">
                        <a href="history.php">
                            <i class="fa fa-book"></i>
                            <span>History</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a href="report.php">
                            <i class="fa fa-tasks"></i>
                            <span>Report</span>
                        </a>

                    </li>


                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12 main-chart">




                        <h1>Main Store Out request </h1>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="content-panel">
                                    <?php
                                    include("connect.php");
                                    $main_store_query = "SELECT 
                 main_store_request.In_out,main_store_request.team2_accept,main_store_request.department,main_store_request.sender_status,main_store_request.status_temp,main_store_request.cancel,main_store_request.team1_accepet,main_store_request.qnty ,main_store_request.transaction_id,main_store_request.requested_date,main_store_request.InFrom_OutTo,main_store_request.requested_by,main_store_request.In_Out,main_store_request.team1,main_store_request.team2 ,
                inventory_items.item_description AS item_description ,inventory_items.item_code AS item_code ,inventory_items.category AS category, inventory_items.uom AS uom
                FROM main_store_request INNER JOIN inventory_items ON main_store_request.item_code = inventory_items.item_code where sender_status='active' and cancel='0'";
                                    $main_store_query_run = mysqli_query($conn, $main_store_query);
                                    $main_store_query_run_data = mysqli_fetch_all($main_store_query_run, MYSQLI_ASSOC);
                                    ?>
                                    <input type="text" id="RequestsearchInput" class="form-control"
                                        placeholder="Search for departments..."
                                        style="margin-bottom: 10px; margin-right: 3%; width: 250px; float: right;">

                                    <a href="#" class="btn btn-success text-white" id="RequestExportBtn"
                                        style="float: right; margin-right: 10px; ">
                                        <span>Export</span>
                                    </a>
                                    <a href="#" class="btn btn-info text-white" id="RequestPrintBtn"
                                        style="float: right; margin-right: 10px;">
                                        <span>Print</span>
                                    </a>

                                    <section id="unseen">
                                        <table class="table table-bordered table-striped table-condensed"
                                            id="RequestTable" style="table-layout:auto">
                                            <thead>
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Item Code</th>
                                                    <th>Item Description</th>
                                                    <th>category</th>
                                                    <th>Department</th>
                                                    <th>UOM</th>
                                                    <th>In/Out</th>
                                                    <th>Qnty</th>
                                                    <th>Requested By</th>
                                                    <th>Requested Date</th>
                                                    <th>Remark</th>
                                                    <?php
                                                    if ($role == "admin") {
                                                        ?>
                                                        <th colspan="2" style="text-align: center;">Accepted By</th>
                                                        <?php
                                                    }
                                                    ?>


                                                    <th colspan="4" style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($main_store_query_run_data as $request): ?>
                                                    <tr class="attendanceRow">
                                                        <td><?= $request['transaction_id']; ?></td>
                                                        <td><?= $request['item_code']; ?></td>

                                                        <td><?= $request['item_description']; ?></td>

                                                        <td><?= $request['category']; ?></td>
                                                        <td><?= $request['department']; ?></td>
                                                        <td><?= $request['uom']; ?></td>
                                                        <td><?= $request['In_Out']; ?></td>
                                                        <td><?= $request['qnty']; ?></td>
                                                        <td><?= $request['requested_by']; ?></td>
                                                        <td><?= $request['requested_date']; ?></td>
                                                        <td><?= $request['InFrom_OutTo']; ?></td>
                                                        <?php
                                                        if ($role == "admin") {
                                                            ?>
                                                            <td>
                                                                <?php
                                                                $val = $request['team2'];
                                                                $val_acc = $request['team2_accept'];
                                                                if ($val == 0) {
                                                                    $msg = "Pending";
                                                                } else {
                                                                    $msg = $val_acc;
                                                                }
                                                                echo $msg;

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $val = $request['team1'];
                                                                $val_acc = $request['team1_accepet'];
                                                                if ($val == 0) {
                                                                    $msg = "Pending";
                                                                } else {
                                                                    $msg = $val_acc;
                                                                }
                                                                echo $msg;

                                                                ?>
                                                            </td>

                                                            <?php
                                                        }


                                                        ?>

                                                        <?php

                                                        if ($role == "admin") {
                                                            if ($request['team1'] == 1 && $request['team1'] == 1) {
                                                                ?>
                                                                <td>
                                                                    <button class="btn btn-warning deleteRequestBtn"
                                                                        disabled>Cancel</button>
                                                                </td>
                                                                <?php

                                                            } else {
                                                                ?>
                                                                <td>
                                                                    <button class="btn btn-warning deleteRequestBtn"
                                                                        data-toggle="modal" data-target="#deleteRequestmodal"
                                                                        data-id="<?php echo $request['transaction_id']; ?>">Cancel</button>
                                                                </td>
                                                                <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($request['department'] == "sales" || $request['In_Out'] == "IN") {
                                                                $disabled = "disabled";
                                                            } else {
                                                                $disabled = "";
                                                            }

                                                            ?>
                                                            <td>
                                                                <button class="btn btn-primary forwardRequestBtn"
                                                                    data-toggle="modal" data-target="#ForwardRequestModal"
                                                                    data-id="<?php echo $request['transaction_id']; ?>"
                                                                    <?= $disabled ?>>Forward</button>
                                                            </td>

                                                            <?php

                                                        } else if ($role == "team1" && $request['status_temp']=="active") {

                                                            $team1 = $request['team1'];
                                                            $team2 = $request['team2'];
                                                            if ($team1 == 1 || $team1 == 2) {


                                                                ?>
                                                                    <td>
                                                                        <button class="btn btn-success acceptRequestBtn"
                                                                            data-toggle="modal" data-target="#AcceptRequestModal"
                                                                            data-id="<?php echo $request['transaction_id']; ?>"
                                                                            disabled>accept</button>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-danger rejectRequestBtn"
                                                                            data-toggle="modal" data-target="#RejectRequestModal"
                                                                            data-id="<?php echo $request['transaction_id']; ?>"
                                                                            disabled>Reject</button>
                                                                    </td>
                                                                <?php
                                                            } else if ($team1 == 0 || $team2 == 0) {
                                                                ?>
                                                                        <td>
                                                                            <button class="btn btn-success acceptRequestBtn"
                                                                                data-toggle="modal" data-target="#AcceptRequestModal"
                                                                                data-id="<?php echo $request['transaction_id']; ?>">accept</button>
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-danger rejectRequestBtn"
                                                                                data-toggle="modal" data-target="#RejectRequestModal"
                                                                                data-id="<?php echo $request['transaction_id']; ?>">Reject</button>
                                                                        </td>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                        } else if ($role == "team2" && $request['status_temp']=="active") {
                                                            $team1 = $request['team1'];
                                                            $team2 = $request['team2'];
                                                            if ($team2 == 1 || $team2 == 2) {

                                                                ?>
                                                                        <td>
                                                                            <button class="btn btn-success acceptRequestBtn"
                                                                                data-toggle="modal" data-target="#AcceptRequestModal"
                                                                                data-id="<?php echo $request['transaction_id']; ?>"
                                                                                disabled>accept</button>
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-danger rejectRequestBtn"
                                                                                data-toggle="modal" data-target="#RejectRequestModal"
                                                                                data-id="<?php echo $request['transaction_id']; ?>"
                                                                                disabled>Reject</button>
                                                                        </td>
                                                                <?php
                                                            } else if ($team1 == 0 || $team2 == 0) {
                                                                ?>
                                                                            <td>
                                                                                <button class="btn btn-success acceptRequestBtn"
                                                                                    data-toggle="modal" data-target="#AcceptRequestModal"
                                                                                    data-id="<?php echo $request['transaction_id']; ?>">accept</button>
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-danger rejectRequestBtn"
                                                                                    data-toggle="modal" data-target="#RejectRequestModal"
                                                                                    data-id="<?php echo $request['transaction_id']; ?>">Reject</button>
                                                                            </td>
                                                                <?php
                                                            }
                                                            ?>



                                                            <?php

                                                        }

                                                        ?>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </section>

                                    <!-- Pagination Controls -->
                                    <div id="paginationControls">
                                        <button id="prevBtn" class="btn btn-primary">Previous</button>
                                        <button id="nextBtn" class="btn btn-primary">Next</button>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <!-- cancel transaction  Modal request table -->
                    <div class="modal fade" id="deleteRequestmodal" tabindex="-1" role="dialog"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="deleteForm" action="../assets/php_query/main_store_query/request_query.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Cancel Request</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class=" col-md-12 form-group" style="display: none;">
                                        <input type="text" class="form-control" id="deleteDepartmentId"
                                            name="deleteDepartmentId" placeholder="Enter employee id">

                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="remark"> Why Do You want To Cancel It?</label>
                                        <input type="text" class="form-control" id="remark" name="remark"
                                            placeholder="This action can't be undone!!" required>
                                    </div>


                                    <div class="modal-footer">
                                        <button class="btn btn-danger deleteEmpBtn" data-toggle="modal"
                                            data-target="#deleteEmpModal" name="delete_stock_item"
                                            data-id="1">Confirm</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- accept transaction for request table -->

                    <div class="modal fade" id="AcceptRequestModal" tabindex="-1" role="dialog"
                        aria-labelledby="acceptModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="acceptForm" action="../assets/php_query/main_store_query/request_query.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="acceptModalLabel">Accept Request</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="acceptItemCode"
                                            name="acceptItemCode" placeholder="Item code" readonly>

                                    </div>
                                    <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="acceptItemCode2"
                                            name="acceptItemCode2" placeholder="Item code" readonly>

                                    </div>
                                    <div class="modal-body">
                                        <label for="" style="color:red; font-size:large;">make sure you check every
                                            detail before accepting!! this action can't be undone!!</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="accept_request">Confirm
                                            Accept</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- reject transaction for request table -->
                    <div class="modal fade" id="RejectRequestModal" tabindex="-1" role="dialog"
                        aria-labelledby="acceptModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="acceptForm" action="../assets/php_query/main_store_query/request_query.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="acceptModalLabel">Reject Request</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="rejectItemCode"
                                            name="rejectItemCode" placeholder="Item code" readonly>

                                    </div>
                                    <div class="modal-body">
                                        <label for="" style="color:red; font-size:large;">make sure you check every
                                            detail before Rejecting!! this action can't be undone!!</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="reject_request">Confirm
                                            Accept</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- we will add forward function here -->
                      <div class="modal fade" id="ForwardRequestModal" tabindex="-1" role="dialog"
                        aria-labelledby="acceptModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="acceptForm" action="../assets/php_query/main_store_query/request_query.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="acceptModalLabel">Forward Request</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="forward_ItemCode"
                                            name="forward_ItemCode" placeholder="Item code" readonly>

                                    </div>
                                    <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="forward_ItemCode"
                                            name="store_name" value="<?php echo $fullname; ?>" placeholder="Item code" readonly>

                                    </div>
                                    <div class="modal-body">
                                        <label for="" style="color:red; font-size:large;">make sure you check every
                                            detail before forward!! this acction can't be undone!!</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="forward_request">Confirm
                                            Accept</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                </div><!-- /col-lg-3 -->
                </div>

            </section>
        </section>

        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
           © 2025 Super Double T General Trading Plc.
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../assets/js/sparkline-chart.js"></script>
    <script src="../assets/js/zabuto_calendar.js"></script>



    <script>
        // Variables for pagination and control
        const msr_rowsPerPage = 10;
        let msr_currentPage = 1;

        // Elements
        const msr_table = document.getElementById('RequestTable');
        const msr_tbody = msr_table.querySelector('tbody');
        const msr_searchInput = document.getElementById('RequestsearchInput');
        const msr_prevBtn = document.getElementById('prevBtn');
        const msr_nextBtn = document.getElementById('nextBtn');
        const msr_exportBtn = document.getElementById('RequestExportBtn');
        const msr_printBtn = document.getElementById('RequestPrintBtn');

        // Table data (rows)
        let msr_allRows = Array.from(msr_tbody.querySelectorAll('tr'));
        let msr_filteredRows = [...msr_allRows];

        function msr_updatePaginationButtons() {
            const totalPages = Math.ceil(msr_filteredRows.length / msr_rowsPerPage);
            msr_prevBtn.disabled = msr_currentPage === 1;
            msr_nextBtn.disabled = msr_currentPage >= totalPages;
        }

        function msr_getPageData(page) {
            const startIndex = (page - 1) * msr_rowsPerPage;
            const endIndex = page * msr_rowsPerPage;
            return msr_filteredRows.slice(startIndex, endIndex);
        }

        function msr_displayTable(rowsToDisplay) {
            msr_tbody.innerHTML = '';
            rowsToDisplay.forEach(row => {
                msr_tbody.appendChild(row);
            });
        }

        function msr_handleSearch() {
            const searchTerm = msr_searchInput.value.toLowerCase();
            msr_filteredRows = msr_allRows.filter(row =>
                Array.from(row.cells).some(cell =>
                    cell.textContent.toLowerCase().includes(searchTerm)
                )
            );
            msr_currentPage = 1;
            msr_displayTable(msr_getPageData(msr_currentPage));
            msr_updatePaginationButtons();
        }

        // Event Listeners
        msr_prevBtn.addEventListener('click', () => {
            if (msr_currentPage > 1) {
                msr_currentPage--;
                msr_displayTable(msr_getPageData(msr_currentPage));
                msr_updatePaginationButtons();
            }
        });

        msr_nextBtn.addEventListener('click', () => {
            const totalPages = Math.ceil(msr_filteredRows.length / msr_rowsPerPage);
            if (msr_currentPage < totalPages) {
                msr_currentPage++;
                msr_displayTable(msr_getPageData(msr_currentPage));
                msr_updatePaginationButtons();
            }
        });

        msr_searchInput.addEventListener('input', msr_handleSearch);

        // Print functionality
        msr_printBtn.addEventListener('click', () => {
            const visibleRows = msr_tbody.querySelectorAll('tr');

            let tableHTML = '<table border="1" style="width: 100%; border-collapse: collapse;">';

            // Define the column indices to include in the printout (e.g., include columns 0, 2, and 3)
            const columnsToPrint = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]; // Specify column indices to include

            // Filter the table header to only include the specified columns
            let headers = msr_table.querySelectorAll('thead th');
            let filteredHeaders = '';
            headers.forEach((header, index) => {
                if (columnsToPrint.includes(index)) {
                    filteredHeaders += `<th>${header.textContent.trim()}</th>`;
                }
            });
            tableHTML += `<thead><tr>${filteredHeaders}</tr></thead>`;

            // Filter the table rows to only include the specified columns
            tableHTML += '<tbody>';
            visibleRows.forEach(row => {
                tableHTML += '<tr>';
                row.querySelectorAll('td').forEach((cell, index) => {
                    if (columnsToPrint.includes(index)) {
                        tableHTML += `<td>${cell.textContent.trim()}</td>`;
                    }
                });
                tableHTML += '</tr>';
            });
            tableHTML += '</tbody></table>';

            // Open a print window and populate the content
            const printWindow = window.open('', '', 'height=700,width=1000');
            printWindow.document.write('<html><head><title>Print Request Report</title></head><body>');
            printWindow.document.write('<h2 style="text-align: center;">Super Double T General Trading Plc</h2>');
            printWindow.document.write('<h3 style="text-align: center;">Main Store Requests</h3><br>');
            printWindow.document.write(tableHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });


        // Export functionality
        msr_exportBtn.addEventListener('click', () => {
            const visibleRows = msr_tbody.querySelectorAll('tr');

            let csvContent = 'Super Double T General Trading Plc\nMain Store Requests\n\n';
            let headers = [];
            msr_table.querySelectorAll('thead th').forEach(th => {
                headers.push(`"${th.textContent.trim().replace(/"/g, '""')}"`);
            });
            csvContent += headers.join(',') + '\n';

            visibleRows.forEach(row => {
                const rowData = [];
                row.querySelectorAll('td').forEach(cell => {
                    let text = cell.textContent.trim().replace(/"/g, '""');
                    rowData.push(`"${text}"`);
                });
                csvContent += rowData.join(',') + '\n';
            });

            const blob = new Blob([csvContent], {
                type: 'text/csv;charset=utf-8;'
            });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'main_store_requests.csv';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        // Initial load
        msr_displayTable(msr_getPageData(msr_currentPage));
        msr_updatePaginationButtons();
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Cancel button
            $('.deleteRequestBtn').click(function () {
                var transactionId = $(this).data('id');
                $('#deleteDepartmentId').val(transactionId);
            });

            // Accept button
            $('.acceptRequestBtn').click(function () {
                var transactionId = $(this).data('id');
                $('#acceptItemCode').val(transactionId);
                // Find the second column text in the same row as the clicked button
                var secondColumnData = $(this).closest('tr').find('td:eq(1)').text().trim();
                $('#acceptItemCode2').val(secondColumnData);
            });

            //reject buutton
            $('.rejectRequestBtn').click(function () {
                var transactionId = $(this).data('id');
                $('#rejectItemCode').val(transactionId);
                // Find the second column data in the same row as the clicked button
                var secondColumnData = $(this).closest('tr').find('td:eq(1)').text().trim();
                $('#rejectItemCode2').val(secondColumnData);
            });
              //forward buutton
           $('.forwardRequestBtn').click(function () {
                var transactionId = $(this).data('id');
                $('#forward_ItemCode').val(transactionId);
            });

        });
    </script>

</body>

</html>
