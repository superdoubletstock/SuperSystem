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
                        <a class="active" href="#">
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
                    <div class="col-lg-9 main-chart">
                        <?php
                        include('connect.php');
                        // ***************************inventory_query*******************************************
                        $main_store_request_query = "SELECT * FROM main_store_request where status='active'";
                        $main_store_request_query_run = mysqli_query($conn, $main_store_request_query);
                        if ($main_store_request_query_run) {

                            $x = 0;
                            $y = 0;
                            $z = 0;
                            $count = 0;
                            if (mysqli_num_rows($main_store_request_query_run) > 0) {
                                foreach ($main_store_request_query_run as $request_row) {
                                    $t1 = $request_row['team1'];
                                    $t2 = $request_row['team2'];

                                    if ($t1 == 1 && $t2 == 1) {
                                        //accepted
                                        $x++;
                                    } else if (($t1 == 0 && $t2 == 1) || ($t1 == 1 && $t2 == 0) || ($t1 == 0 && $t2 == 0)) {
                                        // pending
                                        $y++;
                                    } else {
                                        //rejected
                                        $z++;
                                    }
                                    $count++;
                                }
                                // we need to do a lot of calculating 
                                $pending_percent = $y / $count * 100;
                                $accept_percent = $x / $count * 100;
                                $reject_percent = $z / $count * 100;
                                $pending = floatval(rtrim($pending_percent, '%'));
                                $accept = floatval(rtrim($accept_percent, '%'));
                                $reject = floatval(rtrim($reject_percent, '%'));
                            } else {

                                $pending_percent = 0;
                                $accept_percent = 0;
                                $reject_percent = 0;
                            }
                        } else {
                            echo "Database query failed: " . mysqli_error($conn);
                        }

                        // ***************************inventory_query*******************************************

                        ?>

                        <div class="col-md-12 col-sm-12 mb">
                            <div class="white-panel">
                                <div class="white-header">
                                    <h5 style="color: black;">Transaction Status</h5>
                                </div>

                                <svg id="piechart" width="200" height="200" viewBox="0 0 32 32" style="transform: rotate(-90deg);">
                                    <!-- Pie slices will be inserted here -->
                                </svg>

                                <div>
                                    <span style="color:#FFCE56;">&#9632;</span> <span style="color: black;">Pending (<?= round($pending_percent, 2) ?>%) </span> &nbsp;
                                    <span style="color:#4BC0C0;">&#9632; </span><span style="color: black;">Accepted (<?= round($accept_percent, 2) ?>%) </span> &nbsp;
                                    <span style="color:#FF6384;">&#9632; </span><span style="color: black;">Rejected (<?= round($reject_percent, 2) ?>%) </span>&nbsp;
                                </div>
                                <br>
                            </div>

                        </div>
                        <div class="row mt">
                            <!--CUSTOM CHART START -->
                            <div class="border-head">
                                <h3>High Transaction Items</h3>
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
                                    <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">FEB</div>
                                    <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">MAR</div>
                                    <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">APR</div>
                                    <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                                </div>
                                <div class="bar">
                                    <div class="title">MAY</div>
                                    <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                                </div>
                                <div class="bar ">
                                    <div class="title">JUN</div>
                                    <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                                </div>
                                <div class="bar">
                                    <div class="title">JUL</div>
                                    <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                                </div>
                            </div>
                            <!--custom chart end-->
                        </div><!-- /row -->

                    </div><!-- /col-lg-9 END SECTION MIDDLE -->


        
                    <div class="col-lg-3 ds">
                        <!--COMPLETED ACTIONS DONUTS CHART-->
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->


                        <!-- USERS ONLINE SECTION -->
                        <h3>TEAM MEMBERS</h3>
                        <?php
                        // Include the connection file
                        include('connect.php');

                        // Query to fetch the data from the 'users' table
                        $sql = "SELECT fullname,phonenumber, department, role FROM users where department='$department' LIMIT 3";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="desc">
                <div class="thumb">
                    <img class="img-circle" src="../../assets/img/ui-divya.jpg" width="35px" height="35px">
                </div>
                <div class="details">
                    <p><a href="#">' . $row['fullname'] . '</a><br />
                        <muted>' . $row['department'] . '</muted><br />
                        <muted>' . $row['role'] . '</muted><br />
                        <muted>' . $row['phonenumber'] . '</muted>

                    </p>
                </div>
              </div>';
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the connection
                        $conn->close();
                        ?>









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

    <script type="text/javascript" src="./../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../../assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="../../assets/js/sparkline-chart.js"></script>
    <script src="../../assets/js/zabuto_calendar.js"></script>

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

    <script>
        const pending = <?= $pending ?>;
        const accept = <?= $accept ?>;
        const reject = <?= $reject ?>;
        const total = pending + accept + reject;

        const cx = 16; // center x
        const cy = 16; // center y
        const r = 16; // radius

        // Function to calculate the SVG path for each slice
        function describeArc(cx, cy, r, startAngle, endAngle) {
            const start = polarToCartesian(cx, cy, r, endAngle);
            const end = polarToCartesian(cx, cy, r, startAngle);

            const largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

            const d = [
                `M ${cx} ${cy}`, // Move to center
                `L ${start.x} ${start.y}`, // Line to start point on circle
                `A ${r} ${r} 0 ${largeArcFlag} 0 ${end.x} ${end.y}`, // Arc to end point
                `Z` // Close path back to center
            ].join(" ");

            return d;
        }

        // Converts polar coords to cartesian
        function polarToCartesian(cx, cy, r, angleInDegrees) {
            const angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;
            return {
                x: cx + (r * Math.cos(angleInRadians)),
                y: cy + (r * Math.sin(angleInRadians))
            };
        }

        // Calculate the angles for each slice (in degrees)
        let startAngle = 0;

        function makeSlice(value) {
            const angle = (value / total) * 360;
            const slice = {
                start: startAngle,
                end: startAngle + angle
            };
            startAngle += angle;
            return slice;
        }

        const slices = [{
                value: pending,
                color: "#FFCE56"
            },
            {
                value: accept,
                color: "#4BC0C0"
            },
            {
                value: reject,
                color: "#FF6384"
            }
        ];

        const piechart = document.getElementById('piechart');
        piechart.innerHTML = ''; // clear chart

        slices.forEach(slice => {
            if (slice.value > 0) {
                // Special case: full circle
                if (slice.value === total) {
                    const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                    circle.setAttribute("cx", cx);
                    circle.setAttribute("cy", cy);
                    circle.setAttribute("r", r);
                    circle.setAttribute("fill", slice.color);
                    piechart.appendChild(circle);
                } else {
                    const s = makeSlice(slice.value);
                    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    path.setAttribute("d", describeArc(cx, cy, r, s.start, s.end));
                    path.setAttribute("fill", slice.color);
                    piechart.appendChild(path);
                }
            }
        });
    </script>

</body>

</html>