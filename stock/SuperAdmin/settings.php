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
                        <a href="SuperStockBalance.php">
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
                        <a class="active" href="javascript:;">
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

                        <h1>User Control Settings</h1>
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="content-panel">

                                    <?php
                                    include("connect.php");
                                    $add_user_query = "SELECT * FROM users where status='active'";
                                    $add_user_query_run = mysqli_query($conn, $add_user_query);
                                    ?>

                                    <button class="btn btn-success" style="float: left; margin-right: 10px;" data-toggle="modal"
                                        data-target="#AttAddAttendanceRule">Add User</button>

                                    <input type="text" id="SettingsSearchInput" class="form-control" placeholder="Search for History..." style="margin-bottom: 10px; margin-right: 3%; width: 250px; float: right;">

                                    <a href="#" class="btn btn-success text-white" id="settingExportBtn" style="float: right; margin-right: 10px;">
                                        <span>Export</span>
                                    </a>
                                    <a href="#" class="btn btn-info text-white" id="settingPrintBtn" style="float: right; margin-right: 10px;">
                                        <span>Print</span>
                                    </a>

                                    <section id="unseen">
                                        <table class="table table-bordered table-striped table-condensed" id="SettingsTable" style="table-layout: auto;">
                                            <thead>
                                                <tr>
                                                    <th>USER ID</th>
                                                    <th>USER NAME</th>
                                                    <th>PASSWORD</th>
                                                    <th>FULL NAME</th>
                                                    <th>PHONE NUMBER</th>
                                                    <th>DEPARTMENT</th>
                                                    <th>ROLE</th>
                                                    <th>SUB ROLE</th>
                                                    <th>STATUS</th>
                                                    <th>DATE</th>
                                                    <th colspan="2">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($add_user_query_run) {
                                                    foreach ($add_user_query_run as $add_user_row) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $add_user_row['user_id']; ?></td>
                                                            <td><?php echo $add_user_row['username']; ?></td>
                                                            <td class="numeric"><?php echo $add_user_row['password']; ?></td>
                                                            <td class="numeric"><?php echo $add_user_row['fullname']; ?></td>
                                                            <td class="numeric"><?php echo $add_user_row['phonenumber']; ?></td>
                                                            <td class="numeric"><?php echo $add_user_row['department']; ?></td>
                                                            <td class="numeric"><?php echo $add_user_row['role']; ?></td>
                                                               <td class="numeric"><?php echo $add_user_row['sub_role']; ?></td>

                                                            <td class="numeric"><?php echo $add_user_row['status']; ?></td>
                                                            <td class="numeric"><?php echo $add_user_row['registerd_date']; ?></td>

                                                            <td><button class="btn btn-primary editUserBtn" data-toggle="modal"
                                                                    data-target="#editUserData"
                                                                    data-id="<?php echo $add_user_row['user_id']; ?>"><i class="fas fa-pen"></i></button></td>





                                                            <td><button class="btn btn-danger diactivateUserBtn" data-toggle="modal"
                                                                    data-target="#diactivateUser"
                                                                    data-id="<?php echo $add_user_row['user_id']; ?>"><i class="fas fa-trash"></i></button></td>
                                                        </tr>
                                                <?php

                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </section>

                                    <!-- Pagination Controls -->
                                    <div id="historyPaginationControls">
                                        <button id="settingPrevBtn" class="btn btn-primary">Previous</button>
                                        <button id="settingNextBtn" class="btn btn-primary">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal for Adding Attendance Rule -->
                    <div class="modal fade" id="AttAddAttendanceRule" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
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
                                    <form method="POST" action="../assets/php_query/super_admin_query/UserRoleQuery.php">

                                        <div class="form-group col-md-4">
                                            <label for="user_name">USER NAME</label>
                                            <input type="text" name="user_name" id="user_name" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="password">PASSWORD</label>
                                            <input type="text" name="password" id="password" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="full_name">FULL NAME</label>
                                            <input type="text" name="full_name" id="full_name" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="phone_number">PHONE NUMBER</label>
                                            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="role">Role</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="administrator">Super Admin</option>
                                                <option value="admin">Store Admin</option>
                                                <option value="team1">Team 1</option>
                                                <option value="team2">Team 2</option>

                                                <!-- Add more departments as needed -->
                                            </select>
                                        </div>
                                           <div class="col-md-12 form-group">
                                            <label for="sub_role">Sub-Role</label>
                                            <select class="form-control" id="sub_role" name="sub_role" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="admin">admin</option>
                                                <option value="paint_main">paint main</option>
                                                <option value="fiber_main">fiber main</option>

                                                         <option value="paint_mini">paint mini</option>

                                                                  <option value="fiber_mini">fiber mini</option>

                                                <option value="fixed_asset">fixed asset</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="department">Department</label>
                                            <select class="form-control" id="department" name="department" required>
                                                <option value="" disabled selected>Select </option>
                                                <option value="administrator">administrator</option>
                                                <option value="main_store">MAIN STORE</option>
                                                <option value="fiber_mini_Store">FIBER MINI STORE</option>
                                                <option value="paint_mini_store">PAINT MINI STORE</option>
                                                <option value="fiber_mini_mini_store">FIBER MINI-MINI STORE</option>
                                                <option value="paint_mini_mini_store">PAINT MINI-MINI STORE</option>
                                                <!-- Add more departments as needed -->
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="AddUser">Add Rule</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- edit user status modal -->
                    <div class="modal fade" id="editUserData" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit User Settings</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="../assets/php_query/super_admin_query/UserRoleQuery.php">
                                        <!-- Hidden field for user ID -->

                                        <div class="form-group col-md-12" style="display: none;">
                                            <label for="user_id">USER ID</label>
                                            <input type="text" name="user_id" id="user_id" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="edit_user_name">USER NAME</label>
                                            <input type="text" name="edit_user_name" id="edit_user_name" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="edit_password">PASSWORD</label>
                                            <input type="text" name="edit_password" id="edit_password" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="edit_full_name">FULL NAME</label>
                                            <input type="text" name="edit_full_name" id="edit_full_name" class="form-control" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="edit_phone_number">PHONE NUMBER</label>
                                            <input type="text" name="edit_phone_number" id="edit_phone_number" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="UpdateUser">Update User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- diactivate user data -->
                    <div class="modal fade" id="diactivateUser" tabindex="-1" role="dialog"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="deleteForm" action="../assets/php_query/super_admin_query/UserRoleQuery.php" method="post">
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
                                        <label for="remark" style="font-size: large; color: red;"> Are you sure you want diactivate this user ?
                                            this action can't be undone!!!</label>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="Diactivate_User">Confirm</button>


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
        const hist_rowsPerPage = 8;
        let hist_currentPage = 1;
        let hist_allRows = Array.from(document.querySelectorAll('#SettingsTable tbody tr'));
        let hist_filteredRows = [...hist_allRows];

        const hist_table = document.getElementById('SettingsTable');
        const hist_tbody = hist_table.querySelector('tbody');
        const hist_searchInput = document.getElementById('SettingsSearchInput');
        const hist_prevBtn = document.getElementById('settingPrevBtn');
        const hist_nextBtn = document.getElementById('settingNextBtn');
        const hist_exportBtn = document.getElementById('settingExportBtn');
        const hist_printBtn = document.getElementById('settingPrintBtn');

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
            const visibleRows = document.querySelectorAll('#SettingsTable tbody tr');

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
            const visibleRows = document.querySelectorAll('#SettingsTable tbody tr');

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
            $('#SettingsTable').on('click', '.editUserBtn', function() {
                var $row = $(this).closest('tr'); // Get the closest table row
                var firstCellData = $row.find('td:eq(0)').text().trim(); // First cell
                var secondCellData = $row.find('td:eq(1)').text().trim(); // Second cell
                var thirdCellData = $row.find('td:eq(2)').text().trim(); // third cell
                var forthCellData = $row.find('td:eq(3)').text().trim(); // forth cell
                var fifthCellData = $row.find('td:eq(4)').text().trim(); // fifth cell
                var sixthCellData = $row.find('td:eq(5)').text().trim(); // six cell
                var seventhCellData = $row.find('td:eq(6)').text().trim(); // six cell
                // Optional: Set the values in input fields
                $('#user_id').val(firstCellData);
                $('#edit_user_name').val(secondCellData);
                $('#edit_password').val(thirdCellData);
                $('#edit_full_name').val(forthCellData);
                $('#edit_phone_number').val(fifthCellData);
                $('#edit_role').val(sixthCellData);
                $('#edit_department').val(seventhCellData);
                // Show modal
                $('#editUserData').modal('show');
            });
        });
    </script>

    <script>
        // this one is for diactivating users
        $(document).ready(function() {
            $('#SettingsTable').on('click', '.diactivateUserBtn', function() {
                var $row = $(this).closest('tr'); // Get the closest table row
                var firstCellData = $row.find('td:eq(0)').text().trim(); // First cell

                // Optional: Set the values in input fields
                $('#diactivate_id').val(firstCellData);

                // Show modal
                $('#diactivateUser').modal('show');
            });
        });
    </script>


</body>

</html>