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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #csvInput {
            display: none;
        }
    </style>
</head>

<body>

    <section id="container">

        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>SDT</b></a>
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu ">


                    <li id="header_inbox_bar" class="dropdown pull-right top-menu">
                        <a href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">0</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../index.php">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
             <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered">
                        <a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a>
                    </p>

                    <h5 class="centered"><?php echo $fullname; ?></h5>

                    <li class="mt">
                        <a  href="dashboard.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Super Store List</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sub">
                            <!-- main store -->
                            <li class="sub-menu">
                                <a href="../main_store/store/dashboard.php">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Main Store</span>
                                </a>
                            </li>

                            <!-- mini Store -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-desktop"></i>
                                    <span>Mini Store</span>
                                    <i class="fa fa-angle-right pull-right"></i>
                                </a>
                                <ul class="sub">
                                    <li><a href="../fiber_mini_store/store/dashboard.php">FIBER MINI STORE</a></li>
                                    <li><a href="../paint_mini_store/store/dashboard.php">PAINT MINI STORE</a></li>
                                </ul>
                            </li>
                            <!-- mini mini Store -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-desktop"></i>
                                    <span>Mini-Mini Store</span>
                                    <i class="fa fa-angle-right pull-right"></i>
                                </a>
                                <ul class="sub">
                                    <li><a href="../paint_mini_mini_store/store/dashboard.php">PAINT MINI MINI STORE</a></li>
                                    <li><a href="../fiber_mini_mini_store/store/dashboard.php">FIBER MINI MINI STORE</a></li>
                                </ul>
                            </li>
                            <!-- calcium store -->
                            <li class="sub-menu">
                                <a href="../calcium_store/store/dashboard.php">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Calcium store</span>
                                </a>
                            </li>
                            <!-- marble store -->
                            <li class="sub-menu">
                                <a href="../marble_store/store/dashboard.php">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Marble store</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a  href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Inventory Items</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sub">
                    
                            <li class="sub-menu">
                                <a href="RawMaterials.php">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Raw Material</span>
                                </a>
                            </li>
                       
                            <li class="sub-menu">
                                <a href="FixedAssets.php">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Fixed Asset</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a class="active" href="SuperStockBalance.php">
                            <i class="fa fa-th"></i>
                            <span>Super Stock Balance</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a  href="capitalization.php">
                            <i class="fa fa-th"></i>
                            <span>Stock Capitalization</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="status.php">
                            <i class="fa fa-th"></i>
                            <span>Stock Status</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a  href="asset_managment.php">
                            <i class="fa fa-th"></i>
                            <span>Asset Management</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a  href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Admin Tools</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sub">
                        
                            <li class="sub-menu">
                                <a  href="Settings.php">
                                    <i class="fa fa-th"></i>
                                    <span>Setings</span>
                                </a>
                            </li>
                          
                            <li class="sub-menu">
                                <a href="User_Role.php">
                                    <i class="fa fa-th"></i>
                                    <span>Feedback Center</span>
                                </a>
                            </li>

                            <li class="sub-menu">
                                <a href="User_Role.php">
                                    <i class="fa fa-th"></i>
                                    <span>Users & Roles</span>
                                </a>
                            </li>

                            <li class="sub-menu">
                                <a  href="activity_history.php">
                                    <i class="fa fa-th"></i>
                                    <span>Activity History</span>
                                </a>
                            </li>


                        </ul>
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
                        <h1>SUPER STOCK BALANCE </h1>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="content-panel">
                                    <?php
                                    include("connect.php");
                                    $inventory_query = "SELECT * FROM inventory_items where status_of_item='active'";
                                    $inventory_query_run = mysqli_query($conn, $inventory_query);
                                    ?>
                                    <button class="btn btn-success" style="float: left; margin-right: 10px;" data-toggle="modal"
                                        data-target="#AddItems">Add Item</button>

                                    <button onclick="handleButtonClick()" class="btn btn-success" style="float: left; margin-right: 20px;" id="uploadButton">
                                        Import CSV
                                    </button>
                                    <input type="file" id="csvInput" accept=".csv" onchange="handleFileSelected()">

                                    <div id="result" style="float: left; margin-right: 10px;"></div>



                                    <input type="text" id="ItemSearchInput" class="form-control" placeholder="Search for History..." style="margin-bottom: 10px; margin-right: 3%; width: 250px; float: right;">

                                    <a href="#" class="btn btn-success text-white" id="ItemExportBtn" style="float: right; margin-right: 10px;">
                                        <span>Export</span>
                                    </a>
                                    <a href="#" class="btn btn-info text-white" id="ItemPrintBtn" style="float: right; margin-right: 10px;">
                                        <span>Print</span>
                                    </a>

                                    <section id="unseen">
                                        <table class="table table-bordered table-striped table-condensed" id="StockBalanceItemTable" style="table-layout: auto;">
                                            <thead>
                                                <tr>
                                                    <th>ITEM CODE</th>
                                                    <th>DISCRIPTION</th>
                                                    <th>UOM</th>
                                                    <th>M.STORE</th>
                                                    <th>FM. STORE</th>
                                                    <th>PM. STORE</th>
                                                    <th>FMM. STORE</th>
                                                    <th>PMM. STORE</th>
                                                    <th>FINISHING STORE</th>
                                                    <th>METAL STORE</th>
                                                    <th>GENDA GETEMA</th>
                                                    <th>FP. STORE</th>
                                                    <th>Total Balance</th>
                                                    <th colspan="2" style="text-align: center;">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>13</td>
                                                <td><button class="btn btn-primary editItemBtn" data-toggle="modal"
                                                        data-target="#editItemData"
                                                        data-id=""><i class="fas fa-pen"></i></button></td>

                                                <td><button class="btn btn-danger diactivateItemBtn" data-toggle="modal"
                                                        data-target="#diactivateItem"
                                                        data-id=""><i class="fas fa-trash"></i></button></td>


                                            </tbody>
                                        </table>
                                    </section>

                                    <!-- Pagination Controls -->
                                    <div id="historyPaginationControls">
                                        <button id="ItemPrevBtn" class="btn btn-primary">Previous</button>
                                        <button id="ItemNextBtn" class="btn btn-primary">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Adding Items -->
                    <div class="modal fade" id="AddItems" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">main store settings</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="../assets/php_query/super_admin_query/inventory_items.php">

                                        <div class="form-group col-md-12">
                                            <label for="Item_Description">Item Description</label>
                                            <input type="text" name="Item_Description" id="Item_Description" class="form-control" required>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" id="category" name="category" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="Paint">Paint</option>
                                                <option value="Fiber">Fiber</option>
                                                <option value="Fixed_Asset">Fixed Asset</option>
                                                <option value="Others">Others</option>

                                                <!-- Add more departments as needed -->
                                            </select>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="uom">Uom</label>
                                            <select class="form-control" id="uom" name="uom" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="KG">kg</option>
                                                <option value="DRUM">Drum</option>
                                                <option value="BAG">Bag</option>
                                                <option value="ROLL">Roll</option>
                                                <option value="PCS">Pcs</option>
                                                <option value="SET">Set</option>
                                                <option value="PKT">Packet</option>
                                                <option value="JERICAN">Jerican</option>
                                                <option value="PAIL">Pail</option>
                                                <option value="TIN">Tin</option>
                                                <option value="MTR">Meter</option>
                                                <option value="LTR">Liter</option>
                                                <option value="KUNTAL">Kuntal</option>
                                                <option value="TON">Ton</option>

                                                <!-- Add more departments as needed -->
                                            </select>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="uom">Origin</label>
                                            <select class="form-control" id="Origin" name="Origin" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="CHINA">China</option>
                                                <option value="DUBAI">Dubai</option>
                                                <option value="INDIA">India</option>
                                                <option value="IRAN">Iran</option>
                                                <option value="EGIPT">Egipt</option>
                                                <option value="GERMANY">Germany</option>
                                                <option value="JAPAN">Japan</option>
                                                <option value="TURKEY">turkey</option>
                                                <option value="DJIBOUTI">Djibouti</option>
                                                <option value="KENIYA">Kenya</option>
                                                <option value="SUDAN">Sudan</option>


                                                <!-- Add more departments as needed -->
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Conversion_rate">Converion Rate</label>
                                            <input type="text" name="Conversion_rate" id="Conversion_rate" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="Unit_cost">Unit Cost</label>
                                            <input type="number" name="Unit_cost" id="Unit_cost" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="unit_price">Unit Price</label>
                                            <input type="number" name="unit_price" id="unit_price" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="AddItem">Add Item</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- edit Item status modal -->
                    <div class="modal fade" id="editItemData" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Item Description</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="../assets/php_query/super_admin_query/inventory_items.php">
                                        <div class="form-group col-md-12" style="display:none">
                                            <label for="edit_Item_code">Item Code</label>
                                            <input type="text" name="edit_Item_code" id="edit_Item_code" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Item_description">Item Description</label>
                                            <input type="text" name="edit_Item_description" id="edit_Item_description" class="form-control" required>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" id="edit_category" name="edit_category" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="PAINT">Paint</option>
                                                <option value="FIBER">Fiber</option>
                                                <option value="FIXED_ASSET">Fixed Asset</option>
                                                <option value="OTHERS">Others</option>

                                                <!-- Add more departments as needed -->
                                            </select>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="edit_uom">Uom</label>
                                            <select class="form-control" id="edit_uom" name="edit_uom" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="KG">kg</option>
                                                <option value="DRUM">Drum</option>
                                                <option value="BAG">Bag</option>
                                                <option value="ROLL">Roll</option>
                                                <option value="PCS">Pcs</option>
                                                <option value="SET">Set</option>
                                                <option value="PKT">Packet</option>
                                                <option value="JERICAN">Jerican</option>
                                                <option value="PAIL">Pail</option>
                                                <option value="TIN">Tin</option>
                                                <option value="MTR">Meter</option>
                                                <option value="LTR">Liter</option>
                                                <option value="KUNTAL">Kuntal</option>
                                                <option value="TON">Ton</option>

                                                <!-- Add more departments as needed -->
                                            </select>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="edit_Origin">Origin</label>
                                            <select class="form-control" id="edit_Origin" name="edit_Origin" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="CHINA">China</option>
                                                <option value="DUBAI">Dubai</option>
                                                <option value="INDIA">India</option>
                                                <option value="IRAN">Iran</option>
                                                <option value="EGIPT">Egipt</option>
                                                <option value="GERMANY">Germany</option>
                                                <option value="JAPAN">Japan</option>
                                                <option value="TURKEY">turkey</option>
                                                <option value="DJIBOUTI">Djibouti</option>
                                                <option value="KENIYA">Kenya</option>
                                                <option value="SUDAN">Sudan</option>


                                                <!-- Add more departments as needed -->
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="conversion_rate">Converion Rate</label>
                                            <input type="text" name="edit_conversion_rate" id="edit_conversion_rate" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="unit_cost">Unit Cost</label>
                                            <input type="number" name="edit_unit_cost" id="edit_unit_cost" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="unit_price">Unit Price</label>
                                            <input type="number" name="edit_unit_price" id="edit_unit_price" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="UpdateItems">Edit Item</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- diactivate user data -->
                    <div class="modal fade" id="diactivateItem" tabindex="-1" role="dialog"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="deleteForm" action="../assets/php_query/super_admin_query/inventory_items.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Diactivate user</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class=" col-md-12 form-group" style="display: none;">

                                        <input type="text" class="form-control" id="diactivate_id" name="diactivate_id" placeholder="Enter id">

                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="remark" style="font-size: large; color: red;"> Are you sure you want Remove this Item ?
                                            this action can't be undone!!!</label>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="Diactivate_Item">Confirm</button>


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
                2014 - Alvarez.is
                <a href="index.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
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
        const hist_rowsPerPage = 10;
        let hist_currentPage = 1;
        let hist_allRows = Array.from(document.querySelectorAll('#StockBalanceItemTable tbody tr'));
        let hist_filteredRows = [...hist_allRows];

        const hist_table = document.getElementById('StockBalanceItemTable');
        const hist_tbody = hist_table.querySelector('tbody');
        const hist_searchInput = document.getElementById('ItemSearchInput');
        const hist_prevBtn = document.getElementById('ItemPrevBtn');
        const hist_nextBtn = document.getElementById('ItemNextBtn');
        const hist_exportBtn = document.getElementById('ItemExportBtn');
        const hist_printBtn = document.getElementById('ItemPrintBtn');

        function hist_updatePaginationButtons() {
            const totalPages = Math.ceil(hist_filteredRows.length / hist_rowsPerPage);
            hist_prevBtn.disabled = hist_currentPage === 1;
            hist_nextBtn.disabled = hist_currentPage === totalPages;
        }

        function hist_getPageData(page) {
            const startIndex = (page - 1) * hist_rowsPerPage;
            const endIndex = page * hist_rowsPerPage;
            return hist_filteredRows.slice(startIndex, endIndex);
        }

        function hist_displayTable(rowsToDisplay) {
            hist_tbody.innerHTML = '';
            rowsToDisplay.forEach((row) => {
                hist_tbody.appendChild(row);
            });
        }

        function hist_handleSearch() {
            const searchTerm = hist_searchInput.value.toLowerCase();
            hist_filteredRows = hist_allRows.filter(row =>
                Array.from(row.cells).some(cell =>
                    cell.textContent.toLowerCase().includes(searchTerm)
                )
            );
            hist_currentPage = 1;
            hist_displayTable(hist_getPageData(hist_currentPage));
            hist_updatePaginationButtons();
        }

        hist_prevBtn.addEventListener('click', () => {
            if (hist_currentPage > 1) {
                hist_currentPage--;
                hist_displayTable(hist_getPageData(hist_currentPage));
                hist_updatePaginationButtons();
            }
        });

        hist_nextBtn.addEventListener('click', () => {
            const totalPages = Math.ceil(hist_filteredRows.length / hist_rowsPerPage);
            if (hist_currentPage < totalPages) {
                hist_currentPage++;
                hist_displayTable(hist_getPageData(hist_currentPage));
                hist_updatePaginationButtons();
            }
        });

        hist_searchInput.addEventListener('input', hist_handleSearch);

        // Print Button
        hist_printBtn.addEventListener('click', () => {
            console.log('Print button clicked');
            const visibleRows = document.querySelectorAll('#StockBalanceItemTable tbody tr');

            let tableHTML = '<table border="1" style="width: 100%; border-collapse: collapse;">';
            tableHTML += '<thead><tr><th>R.NO</th><th>Item Code</th><th>Item Description</th><th>UOM</th><th>Category</th><th>Stock In</th><th>Stock Out</th><th>Balance</th><th>Requested By</th><th>Accepted 1</th><th>Accepted 2</th><th>Date</th></tr></thead><tbody>';

            visibleRows.forEach((row, index) => {
                const cells = row.querySelectorAll('td');
                tableHTML += '<tr>';
                tableHTML += `<td>${index + 1}</td>`;
                for (let i = 1; i < cells.length; i++) {
                    tableHTML += `<td>${cells[i].textContent.trim()}</td>`;
                }
                tableHTML += '</tr>';
            });

            tableHTML += '</tbody></table>';

            const printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Print Report</title></head><body>');
            printWindow.document.write('<h1 style="text-align: center;">WE TRUST IN GOD</h1>');
            printWindow.document.write('<h2 style="text-align: center;">Super double T General Trading Plc</h2><br>');
            printWindow.document.write('<h4 style="text-align: center;">Transaction History</h4><br>');
            printWindow.document.write(tableHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });

        // Export Button
        hist_exportBtn.addEventListener('click', () => {
            console.log('Export button clicked');
            const visibleRows = document.querySelectorAll('#StockBalanceItemTable tbody tr');

            let csvContent = 'WE TRUST IN GOD\nSuper double T General Trading Plc\n\n';
            csvContent += 'R.NO,Item Code,Item Description,UOM,Category,Stock In,Stock Out,Balance,Requested By,Accepted 1,Accepted 2,Date\n';

            visibleRows.forEach((row, index) => {
                const cells = row.querySelectorAll('td');
                const rowData = [index + 1];

                for (let i = 1; i < cells.length; i++) {
                    let cellText = cells[i].textContent.trim();
                    if (cellText.includes(',') || cellText.includes('"')) {
                        cellText = `"${cellText.replace(/"/g, '""')}"`;
                    }
                    rowData.push(cellText);
                }

                csvContent += rowData.join(',') + '\n';
            });

            const blob = new Blob([csvContent], {
                type: 'text/csv;charset=utf-8;'
            });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'history_report.csv';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        // Initial load
        hist_displayTable(hist_getPageData(hist_currentPage));
        hist_updatePaginationButtons();
    </script>
    <script>
        //this one is for editing user data
        $(document).ready(function() {
            $('#StockBalanceItemTable').on('click', '.editItemBtn', function() {
                var $row = $(this).closest('tr'); // Get the closest table row
                var firstCellData = $row.find('td:eq(0)').text().trim(); // First cell
                var secondCellData = $row.find('td:eq(1)').text().trim(); // Second cell
                var thirdCellData = $row.find('td:eq(2)').text().trim(); // third cell
                var forthCellData = $row.find('td:eq(3)').text().trim(); // forth cell
                var fifthCellData = $row.find('td:eq(4)').text().trim(); // fifth cell
                var sixthCellData = $row.find('td:eq(5)').text().trim(); // six cell
                var seventhCellData = $row.find('td:eq(6)').text().trim(); // seventh cell
                var eigthCellData = $row.find('td:eq(7)').text().trim(); // eigth cell
                // Optional: Set the values in input fields
                $('#edit_Item_code').val(firstCellData);
                $('#edit_Item_description').val(secondCellData);
                $('#edit_conversion_rate').val(thirdCellData);
                $('#edit_category').val(forthCellData);
                $('#edit_uom').val(fifthCellData);
                $('#edit_Origin').val(sixthCellData);
                $('#edit_unit_cost').val(seventhCellData);
                $('#edit_unit_price').val(eigthCellData);
                // Show modal
                $('#editItemData').modal('show');
            });
        });
    </script>
    <script>
        // this one is for diactivating users
        $(document).ready(function() {
            $('#StockBalanceItemTable').on('click', '.diactivateItemBtn', function() {
                var $row = $(this).closest('tr'); // Get the closest table row
                var firstCellData = $row.find('td:eq(0)').text().trim(); // First cell

                // Optional: Set the values in input fields
                $('#diactivate_id').val(firstCellData);

                // Show modal
                $('#diactivateItem').modal('show');
            });
        });
    </script>
    <script>
        let fileSelected = false;

        function handleButtonClick() {
            if (!fileSelected) {
                document.getElementById('csvInput').click();
            } else {
                uploadCSV(); // Call your existing function
            }
        }

        function handleFileSelected() {
            const input = document.getElementById('csvInput');
            if (input.files.length > 0) {
                fileSelected = true;
                document.getElementById('uploadButton').innerText = 'Submit';
            }
        }

        function uploadCSV() {
            const input = document.getElementById('csvInput');
            const resultDiv = document.getElementById('result');

            // Display loading GIF
            resultDiv.innerHTML = '<img src="https://i.gifer.com/ZZ5H.gif" alt="Loading..." style="width: 24px;">';


            if (!input.files.length) {
                resultDiv.innerHTML = "Please select a CSV file.";
                return;
            }

            const formData = new FormData();
            formData.append('file', input.files[0]);

            fetch('../assets/php_query/super_admin_query/inventory_items.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.text())
                .then(response => {
                    resultDiv.innerHTML = response;
                    resetUploadButton();
                })
                .catch(error => {
                    console.error("Upload error:", error);
                    resultDiv.innerHTML = "Something went wrong.";
                    resetUploadButton();
                });
        }

        function resetUploadButton() {
            fileSelected = false;
            document.getElementById('uploadButton').innerText = 'Upload';
            document.getElementById('csvInput').value = '';
        }
    </script>


</body>

</html>