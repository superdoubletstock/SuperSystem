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

    <title>Super Double "T" General Trading Plc.</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
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

                    <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
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
                        <a href="stock.php" class="active">
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
   <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12 main-chart">
                        <h1>Main Store Stock Balance</h1>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="content-panel">
                                    <!-- Search Bar -->

                                    <input type="text" id="StocksearchInput" class="form-control" placeholder="Search for departments..."
                                        style="margin-bottom: 10px; margin-right: 3%; width: 250px; float: right;"
                                        placeholder="Search for departments...">


                                    <?php

                                    if ($role == "admin") {
                                    ?>

                                        <button class="btn btn-success" style="float: left; margin-right: 10px;" data-toggle="modal"
                                            data-target="#StockINModal">STOCK IN</button>

                                        <button class="btn btn-success" style="float: left; margin-right: 20px;" data-toggle="modal" data-target="#StockOUTModal">STOCK OUT</button>

                                    <?php
                                    }

                                    ?>




                       


                                    <?php
                                    include("connect.php");
                                    $dashboard_query = "SELECT 
                main_store_balance.balance,
                inventory_items.item_description AS item_description ,inventory_items.item_code AS item_code ,inventory_items.category AS category, inventory_items.uom AS uom,inventory_items.origin AS origin
                FROM main_store_balance INNER JOIN inventory_items ON main_store_balance.item_code = inventory_items.item_code WHERE status='active' ";
                                    $dashboard_run = mysqli_query($conn, $dashboard_query);
                                    $dashboard_data = mysqli_fetch_all($dashboard_run, MYSQLI_ASSOC);
                                    ?>
                                    <section id="unseen">
                                        <table class="table table-bordered table-striped table-condensed" id="StockTable" style="table-layout: auto;">
                                            <thead>
                                                <tr>
                                                    <th>Item Code</th>
                                                    <th>Item Description</th>
                                                    <th>UOM</th>
                                                    <th>Origin</th>
                                                    <th>Category</th>
                                                    <th class="numeric">Balance</th>
                                                    <!-- <th colspan="2" style="text-align: center;">Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dashboard_data as $request): ?>

                                                    <tr class="attendanceRow">
                                                        <td><?= $request['item_code']; ?></td>

                                                        <td><?= $request['item_description']; ?></td>
                                                        <td><?= $request['uom']; ?></td>
                                                        <td><?= $request['origin']; ?></td>
                                                        <td><?= $request['category']; ?></td>
                                                        <td><?= $request['balance']; ?></td>
                                                        <!-- <td><button class="btn btn-danger deleteEmpBtn" data-toggle="modal"
                                            data-target="#deleteEmpModal"
                                            data-id="<?php echo $request['item_code']; ?>">Deactivate</button></td> -->

                                                    </tr>
                                                <?php endforeach; ?>


                                            </tbody>
                                        </table>
                                    </section>
                                    <!-- Pagination Controls -->
                                    <div id="paginationControls">
                                        <button id="StockprevBtn" class="btn btn-primary">Previous</button>
                                        <button id="StocknextBtn" class="btn btn-primary">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- stock in -->
                        <div class="modal fade" id="StockINModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="width: 30%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addModalLabel">STOCK IN</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addForm" action="../assets/php_query/main_store_query/stock_query.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <?php
                                                include('connect.php');
                                                $inventory_sql = "SELECT item_code, item_description, uom FROM inventory_items";
                                                $result = $conn->query($inventory_sql);
                                                ?>

                                                <div class="col-md-12 form-group">
                                                    <label for="inventorySelect">Inventory</label>
                                                    <select class="form-control" id="inventorySelect" name="inventorySelect" required>
                                                        <option value="" disabled selected>Select Item</option>
                                                        <?php
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<option value='" . $row['item_code'] . "'>" . $row['item_description'] . " - " . $row['uom'] . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option value='' disabled>No items available</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label for="Qnty">QNTY</label>
                                                    <input type="number" class="form-control" id="Qnty" name="Qnty"
                                                        placeholder="Enter Qnty" required>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="Recived_by">Recived By</label>
                                                    <input type="text" class="form-control" id="Recived_by" name="Recived_by"
                                                        placeholder="Enter full name" required value="<?php echo $fullname ?>" readonly>
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <label for="Recived_by">Department</label>
                                                    <select class="form-control" id="department" name="department" required>
                                                        <option value="" disabled selected>Select </option>
                                                        <option value="main_store">MAIN STORE</option>
                                                        <option value="fiber_mini_Store">FIBER MINI STORE</option>
                                                        <option value="paint_mini_store">PAINT MINI STORE</option>
                                                        <option value="fiber_mini_mini_store">FIBER MINI-MINI STORE</option>
                                                        <option value="paint_mini_mini_store">PAINT MINI-MINI STORE</option>
                                                        <!-- Add more departments as needed -->
                                                    </select>
                                                </div>


                                                <div class="col-md-12 form-group">
                                                    <label for="remark"> Stock In Remark</label>
                                                    <input type="text" class="form-control" id="remark" name="remark"
                                                        placeholder="Enter Remark" required>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary " name="StockIn">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- stock out -->

                        <div class="modal fade" id="StockOUTModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="width: 30%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addModalLabel">STOCK OUT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addForm" action="../assets/php_query/main_store_query/stock_query.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <?php
                                                include('connect.php');
                                                $inventory_sql = "SELECT item_code, item_description, uom FROM inventory_items";
                                                $result = $conn->query($inventory_sql);
                                                ?>

                                                <div class="col-md-12 form-group">
                                                    <label for="inventorySelect">Inventory</label>
                                                    <select class="form-control" id="inventorySelect" name="inventorySelect" required>
                                                        <option value="" disabled selected>Select Item</option>
                                                        <?php
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<option value='" . $row['item_code'] . "'>" . $row['item_description'] . " - " . $row['uom'] . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option value='' disabled>No items available</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="qnty">QNTY</label>
                                                    <input type="number" class="form-control" id="qnty" name="Qnty"
                                                        placeholder="Enter Qnty" required>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="received_by">Requested By</label>
                                                    <input type="text" class="form-control" id="Received_by" name="Received_by"
                                                        placeholder="Enter Remark" required value="<?php echo $fullname ?>" readonly>
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <label for="Recived_by">Department</label>
                                                    <select class="form-control" id="department" name="department" required>
                                                        <option value="" disabled selected>Select </option>
                                                        <option value="main_store">MAIN STORE</option>
                                                        <option value="sales">SALES</option>
                                                        <option value="fiber_mini_Store">FIBER MINI STORE</option>
                                                        <option value="paint_mini_store">PAINT MINI STORE</option>
                                                        <option value="fiber_mini_mini_store">FIBER MINI-MINI STORE</option>
                                                        <option value="paint_mini_mini_store">PAINT MINI-MINI STORE</option>
                                                        <option value="others">OTHERS</option>
                                                        <!-- Add more departments as needed -->
                                                    </select>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label for="remark"> Stock Out Remark</label>
                                                    <input type="text" class="form-control" id="remark" name="remark"
                                                        placeholder="Enter full name" required>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary " name="StockOut">Send</button>
                                        </form>
                                    </div>
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

    <!-- pagnation and search bar Employe table -->
    <script>
        const EmpRowsPerPage = 9; // Number of rows per page
        let EmpCurrentPage = 1;
        let EmpAllRows = Array.from(document.querySelectorAll('#StockTable tbody tr')); // All rows in the table
        let EmpFilteredRows = [...EmpAllRows]; // Start with all rows being the filtered set

        const EmpTable = document.getElementById('StockTable');
        const EmpTbody = EmpTable.querySelector('tbody');
        const EmpSearchInput = document.getElementById('StocksearchInput');
        const EmpPrevBtn = document.getElementById('StockprevBtn');
        const EmpNextBtn = document.getElementById('StocknextBtn');

        function EmpUpdatePaginationButtons() {
            const EmpTotalPages = Math.ceil(EmpFilteredRows.length / EmpRowsPerPage);
            EmpPrevBtn.disabled = EmpCurrentPage === 1;
            EmpNextBtn.disabled = EmpCurrentPage === EmpTotalPages;
        }

        function EmpGetPageData(EmpPage) {
            const EmpStartIndex = (EmpPage - 1) * EmpRowsPerPage;
            const EmpEndIndex = EmpPage * EmpRowsPerPage;
            return EmpFilteredRows.slice(EmpStartIndex, EmpEndIndex);
        }

        function EmpDisplayTable(EmpRowsToDisplay) {
            EmpTbody.innerHTML = ''; // Clear the table body
            EmpRowsToDisplay.forEach(EmpRow => {
                EmpTbody.appendChild(EmpRow);
            });
        }

        function EmpHandleSearch() {
            const EmpSearchTerm = EmpSearchInput.value.toLowerCase();

            // Filter all rows based on the content of any cell in each row
            EmpFilteredRows = EmpAllRows.filter(EmpRow =>
                Array.from(EmpRow.cells).some(EmpCell =>
                    EmpCell.textContent.toLowerCase().includes(EmpSearchTerm)
                )
            );

            // Reset to the first page after a new search
            EmpCurrentPage = 1;
            EmpDisplayTable(EmpGetPageData(EmpCurrentPage));
            EmpUpdatePaginationButtons();
        }

        EmpPrevBtn.addEventListener('click', () => {
            if (EmpCurrentPage > 1) {
                EmpCurrentPage--;
                const EmpPageData = EmpGetPageData(EmpCurrentPage);
                EmpDisplayTable(EmpPageData);
                EmpUpdatePaginationButtons();
            }
        });

        EmpNextBtn.addEventListener('click', () => {
            const EmpTotalPages = Math.ceil(EmpFilteredRows.length / EmpRowsPerPage);
            if (EmpCurrentPage < EmpTotalPages) {
                EmpCurrentPage++;
                const EmpPageData = EmpGetPageData(EmpCurrentPage);
                EmpDisplayTable(EmpPageData);
                EmpUpdatePaginationButtons();
            }
        });

        EmpSearchInput.addEventListener('input', EmpHandleSearch);

        // Initial table display
        const EmpInitialData = EmpGetPageData(EmpCurrentPage);
        EmpDisplayTable(EmpInitialData);
        EmpUpdatePaginationButtons();
    </script>

</body>

</html>