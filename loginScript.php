<?php
include('connect.php');
session_start();
if (isset($_POST['login'])) {
  $username = trim($_POST['username'] ?? '');
  $password = trim($_POST['password'] ?? '');
  // echo "username --> " . htmlspecialchars($username) . "<br>";
  // echo "password --> " . htmlspecialchars($password) . "<br>";

  if (!empty($username) && !empty($password)) {
    // Query to find user with matching username and password
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
      $user = $result->fetch_assoc();

      // Store all user data in session
      $_SESSION['loggedin'] = true;
      $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['fullname'] = $user['fullname'];
      $_SESSION['department'] = $user['department'];
      $_SESSION['phonenumber'] = $user['phonenumber'];
      $_SESSION['role'] = $user['role'];
      $_SESSION['sub_role'] = $user['sub_role'];
      $_SESSION['password'] = $user['password'];


      // we need if condition to route the pages


      if ($user['department'] == "administrator") {

        header("Location: stock/SuperAdmin/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "main_store" && $user['role'] == "admin" && $user['sub_role'] == "admin") { // this means yshi!!
        header("Location: stock/main_store/store/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "main_store" && $user['role'] == "admin" && $user['sub_role'] == "paint_main") { // this means haymi!!
        header("Location: stock/main_store/store/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "main_store" && $user['role'] == "admin" && $user['sub_role'] == "fiber_main") { // this means biftu!!
        header("Location: stock/main_store/store/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "main_store" && $user['role'] == "team1" && $user['sub_role'] == "fiber_main") { // this means nati!!
        header("Location: stock/main_store/team1/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "main_store" && $user['role'] == "team1" && $user['sub_role'] == "paint_main") { // this means yesmaw!!
        header("Location: stock/main_store/team1/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "main_store" && $user['role'] == "team1" && $user['sub_role'] == "fixed_asset") { // this means ketema!! main store
        header("Location: stock/main_store/team1/dashboard.php?timeout=1");
        exit;
      }else if ($user['department'] == "main_store" && $user['role'] == "team2" && $user['sub_role'] == "fiber_main") { // this means nati!!msin store
        header("Location: stock/main_store/team1/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "main_store" && $user['role'] == "team2" && $user['sub_role'] == "paint_main") { // this means yesmaw!! main store
        header("Location: stock/main_store/team1/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "main_store" && $user['role'] == "team2" && $user['sub_role'] == "fixed_asset") { // this means ketema!!main store
        header("Location: stock/main_store/team1/dashboard.php?timeout=1");
        exit;
      }else if ($user['department'] == "paint_mini_store" && $user['role'] == "admin" && $user['sub_role'] == "admin") { // this means nati!! paint mini store
        header("Location: stock/paint_mini_store/store/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "paint_mini_store" && $user['role'] == "team1" && $user['sub_role'] == "paint_mini") { // this means yesmaw!!paint mini store
        header("Location: stock/paint_mini_store/team1/dashboard.php?timeout=1");
        exit;
      } else if ($user['department'] == "paint_mini_store" && $user['role'] == "team2" && $user['sub_role'] == "paint_mini") { // this means ketema!! paint mini store
        header("Location: stock/paint_mini_store/team2/dashboard.php?timeout=1");
        exit;
      }











    } else {
      echo "<p style='color:red;'>Invalid username or password.</p>";
    }
  } else {
    echo "<p style='color:red;'>All fields are required.</p>";
  }
}
