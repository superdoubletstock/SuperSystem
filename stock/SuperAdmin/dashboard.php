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
                        <a href="dashboard.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Super Store List</span>
                        </a>
                        <ul class="sub">
                            <!-- main store -->
                            <li  class="sub-menu">
                                <a href="../main_store/dashboard.php">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Main Store</span>
                                </a>
                            </li>

                            <!-- main store -->

                            <!-- mini Store -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-desktop"></i>
                                    <span>Mini Store</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="../fiber_mini_store/dashboard.php">FIBER MINI STORE</a></li>
                                    <li><a href="../paint_mini_store/dashboard.php">PAINT MINI STORE</a></li>
                                </ul>
                            </li>
                            <!-- mini store -->

                            <!-- mini mini Store -->
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-desktop"></i>
                                    <span>Mini-Mini Store</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="../paint_mini_mini_store/dashboard.php">PAINT MINI MINI STORE</a></li>
                                    <li><a href="../fiber_mini_mini_store/dashboard.php">FIBER MINI MINI STORE</a></li>

                                </ul>
                            </li>
                            <!-- mini mini  store -->
                             <!-- calcium store -->
                               <li  class="sub-menu">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Calcium store</span>
                                </a>
                            </li>
                             <!-- calcium store -->

                                  <!-- marble store -->
                               <li  class="sub-menu">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Marble store</span>
                                </a>
                            </li>
                             <!-- marble store -->

                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="inventoryItems.php">
                            <i class="fa fa-th"></i>
                            <span>Inventory Items</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="SuperStockBalance.php">
                            <i class="fa fa-th"></i>
                            <span>Super Stock Balance</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="capitalixation.php">
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
                        <a href="settings.php">
                            <i class="fa fa-th"></i>
                            <span>Settings</span>
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
                    <div class="col-lg-9 main-chart">
                        <?php
                        include('connect.php');



                        // Define the status to look for
                        $count = 0;
                        $status = "active";

                        //total inventory items count
                        $inventory_query = "SELECT COUNT(*) as total FROM inventory_items WHERE item_code=? AND status_of_item =? ";
                        $stmt = mysqli_prepare($conn, $inventory_query);
                        mysqli_stmt_bind_param($stmt, "is", $count, $status);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $total_item);
                        mysqli_stmt_fetch($stmt);
                        mysqli_stmt_close($stmt);

                        // total users count
                        $user_query = "SELECT COUNT(*) as total FROM users WHERE user_id=? AND status =? ";
                        $stmt1 = mysqli_prepare($conn, $user_query);
                        mysqli_stmt_bind_param($stmt1, "is", $count, $status);
                        mysqli_stmt_execute($stmt1);
                        mysqli_stmt_bind_result($stmt1, $total_users);
                        mysqli_stmt_fetch($stmt1);
                        mysqli_stmt_close($stmt1);


                        ?>
                        <div class="row mtbox">
                            <div class="col-md-3 col-sm-3  box0">
                                <div class="box1">
                                    <span class="li_heart"></span>
                                    <h3><?= $total_item ?></h3>
                                </div>
                                <p>There are <?= $total_item ?> Items you Super Double T Inventory </p>
                            </div>
                            <div class="col-md-3 col-sm-3 box0">
                                <div class="box1">
                                    <span class="li_cloud"></span>
                                    <h3><?= $total_users ?></h3>
                                </div>
                                <p>There are <?= $total_users ?> Users in the system</p>
                            </div>
                            <div class="col-md-3 col-sm-3 box0">
                                <div class="box1">
                                    <span class="li_stack"></span>
                                    <h3>23</h3>
                                </div>
                                <p>There are 23 Departments Registered in the system</p>
                            </div>
                            <div class="col-md-3 col-sm-3 mb box0">
                                <div class="box1">
                                    <span class="li_news"></span>
                                    <h3>10000000 Br.</h3>
                                </div>
                                <p>10000000 Birr is the total capital of the company</p>
                            </div>

                        </div>
                        <!-- /row mt -->


                        <div class="row mt">
                            <!-- SERVER STATUS PANELS -->
                            <div class="col-md-4 col-sm-4 mb">
                                <div class="white-panel pn donut-chart">
                                    <div class="white-header">
                                        <h5>SERVER LOAD</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6 goleft">
                                            <p><i class="fa fa-database"></i> 70%</p>
                                        </div>
                                    </div>
                                    <canvas id="serverstatus01" height="120" width="120"></canvas>
                                    <script>
                                        var doughnutData = [{
                                            value: 70,
                                            color: "#68dff0"
                                        }, {
                                            value: 30,
                                            color: "#fdfdfd"
                                        }];
                                        var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                                    </script>
                                </div>
                                <! --/grey-panel -->
                            </div>
                            <!-- /col-md-4-->


                            <div class="col-md-4 col-sm-4 mb">
                                <div class="white-panel pn">
                                    <div class="white-header">
                                        <h5>TOP PRODUCT</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6 goleft">
                                            <p><i class="fa fa-heart"></i> 122</p>
                                        </div>
                                        <div class="col-sm-6 col-xs-6"></div>
                                    </div>
                                    <div class="centered">
                                        <img src="../assets/img/product.png" width="120">
                                    </div>
                                </div>
                            </div>
                            <!-- /col-md-4 -->

                            <div class="col-md-4 mb">
                                <!-- WHITE PANEL - TOP USER -->
                                <div class="white-panel pn">
                                    <div class="white-header">
                                        <h5>TOP USER</h5>
                                    </div>
                                    <p><img src="../assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
                                    <p><b>Zac Snider</b></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="small mt">MEMBER SINCE</p>
                                            <p>2012</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="small mt">TOTAL SPEND</p>
                                            <p>$ 47,60</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /col-md-4 -->


                        </div>
                        <!-- /row -->


                        <div class="row">
                            <!-- TWITTER PANEL -->
                            <div class="col-md-4 mb">
                                <div class="darkblue-panel pn">
                                    <div class="darkblue-header">
                                        <h5>DROPBOX STATICS</h5>
                                    </div>
                                    <canvas id="serverstatus02" height="120" width="120"></canvas>
                                    <script>
                                        var doughnutData = [{
                                            value: 60,
                                            color: "#68dff0"
                                        }, {
                                            value: 40,
                                            color: "#444c57"
                                        }];
                                        var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                                    </script>
                                    <p>April 17, 2014</p>
                                    <footer>
                                        <div class="pull-left">
                                            <h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
                                        </div>
                                        <div class="pull-right">
                                            <h5>60% Used</h5>
                                        </div>
                                    </footer>
                                </div>
                                <! -- /darkblue panel -->
                            </div>
                            <!-- /col-md-4 -->


                            <div class="col-md-4 mb">
                                <!-- INSTAGRAM PANEL -->
                                <div class="instagram-panel pn">
                                    <i class="fa fa-instagram fa-4x"></i>
                                    <p>@THISISYOU<br /> 5 min. ago
                                    </p>
                                    <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
                                </div>
                            </div>
                            <!-- /col-md-4 -->

                            <div class="col-md-4 col-sm-4 mb">
                                <!-- REVENUE PANEL -->
                                <div class="darkblue-panel pn">
                                    <div class="darkblue-header">
                                        <h5>REVENUE</h5>
                                    </div>
                                    <div class="chart mt">
                                        <div class="sparkline" data-type="line" data-resize="true" data-height="75"
                                            data-width="90%" data-line-width="1" data-line-color="#fff"
                                            data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                            data-spot-radius="4"
                                            data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                                    </div>
                                    <p class="mt"><b>$ 17,980</b><br />Month Income</p>
                                </div>
                            </div>
                            <!-- /col-md-4 -->

                        </div>
                        <!-- /row -->

                        <div class="row mt">
                            <!--CUSTOM CHART START -->
                            <div class="border-head">
                                <h3>VISITS</h3>
                            </div>
                            <div class="custom-bar-chart">
                                <ul class="y-axis">
                                    <li><span>10.000</span></li>
                                    <li><span>8.000</span></li>
                                    <li><span>6.000</span></li>
                                    <li><span>4.000</span></li>
                                    <li><span>2.000</span></li>
                                    <li><span>0</span></li>
                                </ul>
                                <div class="bar">
                                    <div class="title">JAN</div>
                                    <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip"
                                        data-placement="top">85%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">FEB</div>
                                    <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip"
                                        data-placement="top">50%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">MAR</div>
                                    <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip"
                                        data-placement="top">60%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">APR</div>
                                    <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip"
                                        data-placement="top">45%</div>
                                </div>
                                <div class="bar">
                                    <div class="title">MAY</div>
                                    <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip"
                                        data-placement="top">32%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">JUN</div>
                                    <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip"
                                        data-placement="top">62%</div>
                                </div>
                                <div class="bar">
                                    <div class="title">JUL</div>
                                    <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip"
                                        data-placement="top">75%</div>
                                </div>
                            </div>
                            <!--custom chart end-->
                        </div>
                        <!-- /row -->

                    </div>
                    <!-- /col-lg-9 END SECTION MIDDLE -->


                    <div class="col-lg-3 ds">
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top"
                                        style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div>
                        <!--COMPLETED ACTIONS DONUTS CHART-->
                        <h3>NOTIFICATION</h3>
                        <?php
                        include('connect.php');
                        $feedback_query = "SELECT 
    customer_support.feedback,
    customer_support.sent_date,
    users.user_id AS user_id,
    users.fullname AS fullname,
    users.department AS department
FROM customer_support
INNER JOIN users ON customer_support.user_id = users.user_id
WHERE feedback_status='active'
ORDER BY customer_support.sent_date DESC
LIMIT 4";

                        $feedback_run = mysqli_query($conn, $feedback_query);

                        if ($feedback_run) {
                            $main_store_query_run_data = mysqli_fetch_all($feedback_run, MYSQLI_ASSOC);

                            foreach ($main_store_query_run_data as $row) {
                                // Begin dynamic output
                        ?>
                                <div class="desc" style="margin-bottom: 20px;">
                                    <div class="thumb">
                                        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                    <div class="details" style="width: 80%;">
                                        <span class="muted"><?php echo htmlspecialchars($row['sent_date']); ?></span><br />
                                        <span
                                            class="muted"><?php echo htmlspecialchars($row['fullname']) . " | " . htmlspecialchars($row['department']); ?></span><br />
                                        <p class="full-width">
                                            <?php echo nl2br(htmlspecialchars($row['feedback'])); ?>
                                        </p>
                                    </div>
                                </div>
                        <?php
                                // End dynamic output
                            }
                        } else {
                            echo "Query error: " . mysqli_error($conn);
                        }

                        $conn->close();
                        ?>





                        <!-- USERS ONLINE SECTION -->
                        <h3>SYETEM ADMINS</h3>
                        <?php
                        // Include the connection file
                        include('connect.php');
                        // Query to fetch the data from the 'users' table
                        $teams_query = "SELECT fullname,phonenumber, department, role FROM users where department='$department'";

                        $feedback_run = mysqli_query($conn, $teams_query);

                        if ($teams_query) {
                            $teams_data = mysqli_fetch_all($feedback_run, MYSQLI_ASSOC);

                            foreach ($teams_data as $row) {
                                // Begin dynamic output
                        ?>
                                <div class="desc" style="margin-bottom: 20px;">
                                    <div class="thumb">
                                        <img class="img-circle" src="../assets/img/ui-divya.jpg" width="35px" height="35px">
                                    </div>
                                    <div class="details" style="width: 80%;">
                                        <span class="muted"><?php echo htmlspecialchars($row['fullname']); ?></span><br />
                                        <span
                                            class="muted"><?php echo htmlspecialchars($row['role']); ?></span><br />
                                        <p class="full-width">
                                            <?php echo nl2br(htmlspecialchars($row['phonenumber'])); ?>
                                        </p>
                                    </div>
                                </div>
                        <?php
                                // End dynamic output
                            }
                        } else {
                            echo "Query error: " . mysqli_error($conn);
                        }
                        // Close the connection
                        $conn->close();
                        ?>


                    </div>
                    <!-- /col-lg-3 -->
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

    <script type="application/javascript">
        // Calendar initialization code (if needed)
        $(document).ready(function() {
            $("#date-popover").popover({
                html: true,
                trigger: "manual"
            });
            $("#date-popover").hide();
            $("#date-popover").click(function(e) {
                $(this).hide();
            });

            // Initialize the calendar with current date
            $("#my-calendar").zabuto_calendar({
                action: function() {
                    return myDateFunction(this.id, false);
                },
                action_nav: function() {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },

                // Set the default date to today's date
                today: true, // Displays the "Today" button
                start_date: new Date() // Automatically set the calendar's start date to today
            });
        });

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

</body>

</html>