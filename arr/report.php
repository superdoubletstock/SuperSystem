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
                        <a href="stock.php" >
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
                        <a href="report.php"  class="active">
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
                      
                      
  <h1>Main Store Report</h1>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">

                <?php
                include("connect.php");
                $main_store_query = "SELECT 
                    main_store_report.item_code, main_store_report.stock_in, main_store_report.stock_out, 
                    main_store_report.balance, main_store_report.saved_by, main_store_report.saved_date,
                    inventory_items.item_description AS item_description,
                    inventory_items.category AS category, inventory_items.uom AS uom
                    FROM main_store_report 
                    INNER JOIN inventory_items ON main_store_report.item_code = inventory_items.item_code";
                
                $main_store_query_run = mysqli_query($conn, $main_store_query);
                $main_store_query_run_data = mysqli_fetch_all($main_store_query_run, MYSQLI_ASSOC);
                ?>

                <input type="text" id="ReportSearchInput" class="form-control" placeholder="Search for History..." style="margin-bottom: 10px; margin-right: 3%; width: 250px; float: right;">

                <a href="#" class="btn btn-success text-white" id="exportBtn" style="float: right; margin-right: 10px;">
                    <span>Export</span>
                </a>
                <a href="#" class="btn btn-info text-white" id="printBtn" style="float: right; margin-right: 10px;">
                    <span>Print</span>
                </a>

                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed" id="reportTable" style="table-layout: auto;">
                        <thead>
                            <tr>
                                <th>R.NO</th>
                                <th>Item Code</th>
                                <th>Item Description</th>
                                <th>UOM</th>
                                <th>Category</th>
                                <th>Stock In</th>
                                <th>Stock Out</th>
                                <th>Balance</th>
                                <th>Prepared By</th>
                                <th>Saved Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($main_store_query_run_data as $request): ?>
                                <tr class="reportRow">
                                 <td><?= $request['report_id']; ?></td>
                                  
                                    <td><?= $request['item_code']; ?></td>
                                    <td><?= $request['item_description']; ?></td>
                                    <td><?= $request['uom']; ?></td>
                                    <td><?= $request['category']; ?></td>
                                    <td><?= $request['stock_in']; ?></td>
                                    <td><?= $request['stock_out']; ?></td>
                                    <td><?= $request['balance']; ?></td>
                                    <td><?= $request['saved_by']; ?></td>
                                    <td><?= $request['saved_date']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <div id="paginationControls">
                    <button id="reportprevBtn" class="btn btn-primary">Previous</button>
                    <button id="reportnextBtn" class="btn btn-primary">Next</button>
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
    const rowsPerPage = 10;
    let currentPage = 1;
    let allReportRows = [];

    const reportTableBody = document.querySelector('#reportTable tbody');
    const reportSearchInput = document.getElementById('ReportSearchInput');
    const reportPrevBtn = document.getElementById('reportprevBtn');
    const reportNextBtn = document.getElementById('reportnextBtn');
    const exportBtn = document.getElementById('exportBtn');
    const printBtn = document.getElementById('printBtn');

    function loadOriginalReportRows() {
        const rows = document.querySelectorAll('#reportTable tbody tr');
        allReportRows = Array.from(rows).map(row => row.innerHTML);
    }

    function getFilteredReportRows() {
        const searchTerm = reportSearchInput.value.toLowerCase();
        return allReportRows.filter(rowHTML => rowHTML.toLowerCase().includes(searchTerm));
    }

    function renderReportTable(filteredRows) {
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const rowsToDisplay = filteredRows.slice(start, end);

        reportTableBody.innerHTML = '';
        rowsToDisplay.forEach((rowHTML, index) => {
            const tr = document.createElement('tr');
            tr.innerHTML = rowHTML;
            tr.children[0].textContent = start + index + 1; // R.NO
            reportTableBody.appendChild(tr);
        });

        reportPrevBtn.disabled = currentPage === 1;
        reportNextBtn.disabled = currentPage >= Math.ceil(filteredRows.length / rowsPerPage);
    }

    function updateReportTable() {
        const filteredRows = getFilteredReportRows();
        if (currentPage > Math.ceil(filteredRows.length / rowsPerPage)) {
            currentPage = 1;
        }
        renderReportTable(filteredRows);
    }

    reportSearchInput.addEventListener('input', () => {
        currentPage = 1;
        updateReportTable();
    });

    reportPrevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            updateReportTable();
        }
    });

    reportNextBtn.addEventListener('click', () => {
        currentPage++;
        updateReportTable();
    });

    printBtn.addEventListener('click', () => {
        const visibleRows = document.querySelectorAll('#reportTable tbody tr');

        let tableHTML = '<table border="1" style="width: 100%; border-collapse: collapse;">';
        tableHTML += '<thead><tr><th>R.NO</th><th>Item Code</th><th>Item Description</th><th>UOM</th><th>Category</th><th>Stock In</th><th>Stock Out</th><th>Balance</th><th>Requested By</th><th>Saved Date</th></tr></thead><tbody>';

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
         printWindow.document.write('<h4 style="text-align: center;">Daily Report</h4><br>');
        printWindow.document.write(tableHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });

    exportBtn.addEventListener('click', () => {
        const visibleRows = document.querySelectorAll('#reportTable tbody tr');
        
        let csvContent = 'WE TRUST IN GOD\nSuper double T General Trading Plc\n\n';
        csvContent += 'R.NO,Item Code,Item Description,UOM,Category,Stock In,Stock Out,Balance,Prepared By,Saved Date\n';

        visibleRows.forEach((row, index) => {
            const cells = row.querySelectorAll('td');
            const rowData = [index + 1]; // R.NO

            for (let i = 1; i < cells.length; i++) {
                let cellText = cells[i].textContent.trim();

                if (i === 9) {
                    const date = new Date(cellText);
                    if (!isNaN(date.getTime())) {
                        cellText = date.toISOString().split('T')[0];
                    }
                }

                if (cellText.includes(',') || cellText.includes('"')) {
                    cellText = `"${cellText.replace(/"/g, '""')}"`;
                }

                rowData.push(cellText);
            }

            csvContent += rowData.join(',') + '\n';
        });

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'report.csv';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    document.addEventListener('DOMContentLoaded', () => {
        loadOriginalReportRows();
        updateReportTable();
    });
</script>

</body>

</html>