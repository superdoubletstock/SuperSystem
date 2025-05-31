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
    $val = "AND i.category = '$PAINT'";
} else if ($sub_role == "fiber_main") {
    $FIBER = "FIBER";
    $val = "AND i.category = '$FIBER'";
} else if ($sub_role == "fixed_asset") {
    $FIXED_ASSET = "FIXED_ASSET";
    $val = "AND i.category = '$fixed_asset'";
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
    <title>SDT</title>
    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/lineicons/style.css">
    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
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

                    <p class="centered"><a href="profile.html"><img src="../../assets/img/ui-sam.jpg" class="img-circle"
                                width="60"></a></p>
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
                        <a href="request.php">
                            <i class="fa fa-book"></i>
                            <span>Request</span>
                        </a>

                    </li>
                    <li class="sub-menu">
                        <a class="active" href="incoming_notification.php">
                            <i class="fa fa-book"></i>
                            <span>Incoming Notification</span>
                        </a>

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
                        <h1>Multi-Store Alerts</h1>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="content-panel">
                                    <?php
                                    include("connect.php");
                                    // Run the UNION ALL query
                                    $query = "
SELECT 
    pm.in_out,
    pm.team2_accept,
    pm.department,
    pm.team1_accepet,
    pm.qnty,
    pm.transaction_id,
    pm.requested_date,
    pm.InFrom_OutTo,
    pm.requested_by,
    pm.in_out,
    i.item_description,
    i.item_code,
    i.category,
    i.uom,
    'paint_mini_store_request' AS source_table
FROM paint_mini_store_request pm
INNER JOIN inventory_items i ON pm.item_code = i.item_code
WHERE pm.department = 'main_store' AND pm.team1 = '1' AND pm.team2 = '1' $val

UNION ALL

SELECT 
    fm.in_out,
    fm.team2_accept,
    fm.department,
    fm.team1_accepet,
    fm.qnty,
    fm.transaction_id,
    fm.requested_date,
    fm.InFrom_OutTo,
    fm.requested_by,
    fm.in_out,
    i.item_description,
    i.item_code,
    i.category,
    i.uom,
    'fiber_mini_store_request' AS source_table
FROM fiber_mini_store_request fm
INNER JOIN inventory_items i ON fm.item_code = i.item_code
WHERE fm.department = 'main_store' AND fm.team1 = '1' AND fm.team2 = '1' $val

UNION ALL

SELECT 
    pmm.in_out,
    pmm.team2_accept,
    pmm.department,
    pmm.team1_accepet,
    pmm.qnty,
    pmm.transaction_id,
    pmm.requested_date,
    pmm.InFrom_OutTo,
    pmm.requested_by,
    pmm.in_out,
    i.item_description,
    i.item_code,
    i.category,
    i.uom,
    'paint_mini_mini_store_request' AS source_table
FROM paint_mini_mini_store_request pmm
INNER JOIN inventory_items i ON pmm.item_code = i.item_code
WHERE pmm.department = 'main_store' AND pmm.team1 = '1' AND pmm.team2 = '1' $val

UNION ALL

SELECT 
    fmm.in_out,
    fmm.team2_accept,
    fmm.department,
    fmm.team1_accepet,
    fmm.qnty,
    fmm.transaction_id,
    fmm.requested_date,
    fmm.InFrom_OutTo,
    fmm.requested_by,
    fmm.in_out,
    i.item_description,
    i.item_code,
    i.category,
    i.uom,
    'fiber_mini_mini_store_request' AS source_table
FROM fiber_mini_mini_store_request fmm
INNER JOIN inventory_items i ON fmm.item_code = i.item_code
WHERE fmm.department = 'main_store' AND fmm.team1 = '1' AND fmm.team2 = '1' $val
";

                                    // Execute the query
                                    $main_store_query_run = mysqli_query($conn, $query);

                                    // Fetch all results into an array
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
                                                    <!-- <th>Department</th> -->
                                                    <th>UOM</th>
                                                    <th>In/Out</th>
                                                    <th>Qnty</th>
                                                    <th>Requested By</th>
                                                    <th>Requested Date</th>
                                                    <th>Remark</th>
                                                    <th>Requesting Department</th>

                                                    <th colspan="1" style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($main_store_query_run_data as $request): ?>
                                                    <tr class="attendanceRow">
                                                        <td><?= htmlspecialchars($request['transaction_id']) ?></td>
                                                        <td><?= htmlspecialchars($request['item_code']) ?></td>
                                                        <td><?= htmlspecialchars($request['item_description']) ?></td>
                                                        <td><?= htmlspecialchars($request['category']) ?></td>
                                                        <!-- <td><?= htmlspecialchars($request['department']) ?></td> -->
                                                        <td><?= htmlspecialchars($request['uom']) ?></td>
                                                        <td><?= htmlspecialchars($request['in_out']) ?></td>
                                                        <td><?= htmlspecialchars($request['qnty']) ?></td>
                                                        <td><?= htmlspecialchars($request['requested_by']) ?></td>
                                                        <td><?= htmlspecialchars($request['requested_date']) ?></td>
                                                        <td><?= htmlspecialchars($request['InFrom_OutTo']) ?></td>

                                                        <?php

                                                        $store = "UNKNOWN STORE"; // Default fallback
                                                        if ($request['source_table'] == "paint_mini_store_request") {
                                                            $store = "paint_mini_store";
                                                        } else  if ($request['source_table'] == "fiber_mini_store_request") {
                                                            $store = "fiber_mini_store";
                                                        } else  if ($request['source_table'] == "paint_mini_mini_store_request") {
                                                            $store = "paint_mini_mini_store";
                                                        } else  if ($request['source_table'] == "fiber_mini_mini_store_request") {
                                                            $store = "fiber_mini_mini_store";
                                                        }
                                                        ?>


                                                        <td><?= htmlspecialchars($store) ?></td>

                                                        <!-- Add empty Action columns if needed -->
                                                        <!-- <td>
                                                            <button class="btn btn-warning acceptRequestBtn"
                                                                data-toggle="modal" data-target="#AcceptRequestModal"
                                                                data-id="<?php echo $request['transaction_id']; ?>"
                                                                disabled>Cancel</button>
                                                        </td> -->
                                                        <td>
                                                            <button class="btn btn-primary forwardRequestBtn"
                                                                data-toggle="modal" data-target="#ForwardRequestModal"
                                                                data-id="<?php echo $request['transaction_id']; ?>">Forward</button>
                                                        </td>
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
                                <form id="deleteForm" action="../../assets/php_query/main_store_query/request_query.php" method="post">
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


                    <!-- we will add forward function here -->
                    <div class="modal fade" id="ForwardRequestModal" tabindex="-1" role="dialog"
                        aria-labelledby="acceptModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="acceptForm" action="../../assets/php_query/main_store_query/request_query.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="acceptModalLabel">Forward Request</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                   
                                    <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="ForwardTransactionID"
                                            name="ForwardTransactionID" placeholder="transaction Id" readonly>

                                    </div>
                                     <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="requsted_by"
                                            name="requsted_by" value="<?= $fullname ?>"  readonly>

                                    </div>



                                    <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="FrowardItemCode"
                                            name="FrowardItemCode" placeholder="Item code" readonly>

                                    </div>

                                       <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="ForwardQnty"
                                            name="ForwardQnty" placeholder="forwarded item qnty" readonly>

                                    </div>

                                       <div class="modal-body" style="display: none;">
                                        <input type="text" class="form-control mb-3" id="requestng_department"
                                            name="requestng_department" placeholder="requestng_department" readonly>

                                    </div>

                                    
                                    <div class="modal-body" style="display: block;">

                                    <label for="" style="color:red; font-size:large;">whats the reason for the request?</label>
                                        <input type="text" class="form-control mb-3" id="remark"
                                            name="remark" placeholder="remark" required>

                                    </div>


                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="forward_request">Confirm
                                            Forward</button>
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
        $(document).ready(function() {


            //forward buutton
            $('.forwardRequestBtn').click(function() {
                var transactionId = $(this).data('id');
                $('#ForwardTransactionID').val(transactionId);
                // Find the second column data in the same row as the clicked button
                var secondColumnData = $(this).closest('tr').find('td:eq(1)').text().trim();
                $('#FrowardItemCode').val(secondColumnData);
                  var sixthColumnData = $(this).closest('tr').find('td:eq(6)').text().trim();
                $('#ForwardQnty').val(sixthColumnData);

                  var tenthColumnData = $(this).closest('tr').find('td:eq(10)').text().trim();
                $('#requestng_department').val(tenthColumnData);
            });

        });
    </script>

</body>

</html>