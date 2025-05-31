<?php
session_start();


// Set session timeout (e.g., 3min minutes)
$timeout_duration = 3000;

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // Timeout: Destroy session and redirect to login
    session_unset();
    session_destroy();
    header("Location: ../../index.php?timeout=1");
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time

// Now you can access all user data
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];
$department = $_SESSION['department'];
$role = $_SESSION['role'];
$sub_role = $_SESSION['sub_role'];
$phone = $_SESSION['phonenumber'];
$password = $_SESSION['password']; // Not recommended to show



if ($sub_role == "paint_main") {
    $PAINT = "PAINT";
    $val = "WHERE category = '$PAINT'";
} else if ($sub_role == "fiber_main") {
    $FIBER = "FIBER";
    $val = "WHERE category = '$FIBER'";
} else if ($sub_role == "fixed_asset") {
    $FIXED_ASSET = "FIXED_ASSET";
    $val = "WHERE category = '$fixed_asset'";
} else if ($sub_role == "admin") {
    $val = "";  // No category filter for admin
} else {
    $val = "";  // Default/fallback behavior
}
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
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
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
                    <span style="opacity:0">---------</span> We trust in God !! <span style="opacity:0">-----------------------------------</span> እግዚአብሔር ይባረክ !!

                </h2>


            </div>

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../../index.php">Logout</a></li>
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

                    <p class="centered"><a href="profile.html"><img src="../../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                    <h5 class="centered"><?php echo $fullname; ?></h5>
                    <?php
                    if ($role == "administrator") {

                    ?>
                        <!-- Go back to home page icon (using Font Awesome) -->
                        <li class="mt">
                            <a href="../../SuperAdmin/dashboard.php" title="Go to Home Page" style="text-decoration: none;">
                                <i class="fas fa-home" style="font-size: 24px; margin-left: 10px;"></i>
                                <span>Admin Home Page</span>
                            </a>
                        </li>


                    <?php
                    }
                    ?>
                       <li class="mt">
                        <a  href="dashboard.php">
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
                        <a href="request.php">
                            <i class="fa fa-book"></i>
                            <span>Request</span>
                        </a>

                    </li>

                 
                    <li class="sub-menu">
                        <a  class="active" href="history.php">
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

                        <h1>Paint Mini Store History</h1>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="content-panel">

                                    <?php
                                    include("connect.php");
                                    $pmt1_store_query = "SELECT 
                    paint_mini_store_history.transaction_id,
                     paint_mini_store_history.item_code,
                      paint_mini_store_history.requested_by,
                    paint_mini_store_history.team1_accept, 
                    paint_mini_store_history.team2_accept, 
                    paint_mini_store_history.stock_in,
                    paint_mini_store_history.stock_out, 
                    paint_mini_store_history.balance, 
                    paint_mini_store_history.saved_date,
                    inventory_items.item_description AS item_description,
                     inventory_items.category AS category, 
                    inventory_items.uom AS uom
                    FROM paint_mini_store_history 
                    INNER JOIN inventory_items ON paint_mini_store_history.item_code = inventory_items.item_code $val";
                                    $pmt1_store_query_run = mysqli_query($conn, $pmt1_store_query);
                                    $pmt1_store_query_run_data = mysqli_fetch_all($pmt1_store_query_run, MYSQLI_ASSOC);

                                    $request_query = "SELECT * FROM paint_mini_store_request where status='active'";
                                    $request_query_run = mysqli_query($conn, $request_query);

                                    if ($request_query_run) {

                                        $total_rows = mysqli_num_rows($request_query_run);
                                        $x = 0;
                                        $y = 0;

                                        foreach ($request_query_run as $request_row) {

                                            $t1 = $request_row['team1']; //1
                                            $t2 = $request_row['team2']; //1
                                            if ($t1 == 1) {
                                                $x++;
                                            }
                                            if ($t2 == 1) {
                                                $y++;
                                            }
                                        }
                                        if ($x == $y) {
                                            $disabled = " ";
                                        } else {
                                            $disabled = "disabled";
                                        }
                                    }

                                    ?>

                                    <input type="text" id="historySearchInput" class="form-control" placeholder="Search for History..." style="margin-bottom: 10px; margin-right: 3%; width: 250px; float: right;">

                                    <a href="#" class="btn btn-success text-white" id="historyExportBtn" style="float: right; margin-right: 10px;">
                                        <span>Export</span>
                                    </a>
                                    <a href="#" class="btn btn-info text-white" id="historyPrintBtn" style="float: right; margin-right: 10px;">
                                        <span>Print</span>
                                    </a>

                                    <section id="unseen">
                                        <table class="table table-bordered table-striped table-condensed" id="historyTable" style="table-layout: auto;">
                                            <thead>
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Item Code</th>
                                                    <th>Item Description</th>
                                                    <th>UOM</th>
                                                    <th>Category</th>
                                                    <th>Stock In</th>
                                                    <th>Stock Out</th>
                                                    <th>Balance</th>
                                                    <th>Requested By</th>
                                                    <th colspan="2" style="text-align: center;">Accepted</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pmt1_store_query_run_data as $request): ?>
                                                    <tr class="historyRow">
                                                        <td><?= $request['transaction_id']; ?></td>
                                                        <td><?= $request['item_code']; ?></td>
                                                        <td><?= $request['item_description']; ?></td>
                                                        <td><?= $request['uom']; ?></td>
                                                        <td><?= $request['category']; ?></td>
                                                        <td><?= $request['stock_in']; ?></td>
                                                        <td><?= $request['stock_out']; ?></td>
                                                        <td><?= $request['balance']; ?></td>
                                                        <td><?= $request['requested_by']; ?></td>
                                                        <td><?= $request['team1_accept']; ?></td>
                                                        <td><?= $request['team2_accept']; ?></td>
                                                        <td><?= $request['saved_date']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </section>

                                    <!-- Pagination Controls -->
                                    <div id="historyPaginationControls">
                                        <button id="historyPrevBtn" class="btn btn-primary">Previous</button>
                                        <button id="historyNextBtn" class="btn btn-primary">Next</button>
                                    </div>
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
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../../assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="../../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../../assets/js/sparkline-chart.js"></script>
    <script src="../../assets/js/zabuto_calendar.js"></script>


    <script>
        const hist_rowsPerPage = 10;
        let hist_currentPage = 1;
        let hist_allRows = Array.from(document.querySelectorAll('#historyTable tbody tr'));
        let hist_filteredRows = [...hist_allRows];

        const hist_table = document.getElementById('historyTable');
        const hist_tbody = hist_table.querySelector('tbody');
        const hist_searchInput = document.getElementById('historySearchInput');
        const hist_prevBtn = document.getElementById('historyPrevBtn');
        const hist_nextBtn = document.getElementById('historyNextBtn');
        const hist_exportBtn = document.getElementById('historyExportBtn');
        const hist_printBtn = document.getElementById('historyPrintBtn');

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
            rowsToDisplay.forEach((row, index) => {
                row.cells[0].textContent = (hist_currentPage - 1) * hist_rowsPerPage + index + 1;
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
            const visibleRows = document.querySelectorAll('#historyTable tbody tr');

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
            const visibleRows = document.querySelectorAll('#historyTable tbody tr');

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

</body>

</html>