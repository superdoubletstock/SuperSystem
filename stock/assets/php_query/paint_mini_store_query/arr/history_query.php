<?php
include('connect.php');
session_start();

$role     = $_SESSION['role'];
$fullname = $_SESSION['fullname'];

if (isset($_POST['save_report'])) {

    // Get the date from the POST request
    $report_date = $_POST['report_date'];

    // Strict date validation
    $dateObj = DateTime::createFromFormat('Y-m-d', $report_date);
    if (!$dateObj || $dateObj->format('Y-m-d') !== $report_date) {
        echo "Invalid date format. Please use YYYY-MM-DD.";
        exit;
    }

    // Check if a report already exists for this date
    $check_sql = "SELECT 1 FROM paint_mini_store_report WHERE saved_date = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    if (!$check_stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($check_stmt, "s", $report_date);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        echo "A report for the date $report_date has already been saved.";
        exit;
    }

    // Generate report data
    $sql = "
        SELECT 
            msh.item_code,
            SUM(msh.stock_in) AS total_stock_in,
            SUM(msh.stock_out) AS total_stock_out,
            msb.balance AS current_balance
        FROM 
            paint_mini_store_history msh
        LEFT JOIN 
            paint_mini_store_balance msb ON msh.item_code = msb.item_code
        WHERE 
            msh.saved_date = ?
        GROUP BY 
            msh.item_code, msb.balance;
    ";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "s", $report_date);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {

        // Begin transaction
        mysqli_begin_transaction($conn);

        try {
            $insert_sql = "INSERT INTO paint_mini_store_report (item_code, stock_in, stock_out, balance, saved_by, saved_date) VALUES (?, ?, ?, ?, ?, ?)";
            $insert_stmt = mysqli_prepare($conn, $insert_sql);
            if (!$insert_stmt) {
                throw new Exception("Prepare failed: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                // Handle NULL balances
                $balance = is_null($row['current_balance']) ? 0 : $row['current_balance'];

                mysqli_stmt_bind_param(
                    $insert_stmt,
                    "siiiss",
                    $row['item_code'],
                    $row['total_stock_in'],
                    $row['total_stock_out'],
                    $balance,
                    $fullname,
                    $report_date
                );

                if (!mysqli_stmt_execute($insert_stmt)) {
                    throw new Exception("Insert failed for item_code " . $row['item_code'] . ": " . mysqli_stmt_error($insert_stmt));
                }
            }

            // Optional: update status in another table after successful inserts
            $update_sql = "UPDATE main_store_request SET status = 'inactive' WHERE requested_date = ?";
            $update_stmt = mysqli_prepare($conn, $update_sql);
            if (!$update_stmt) {
                throw new Exception("Prepare failed: " . mysqli_error($conn));
            }
            mysqli_stmt_bind_param($update_stmt, "s", $report_date);
            mysqli_stmt_execute($update_stmt);

            // Commit transaction
            mysqli_commit($conn);
            echo "Report saved successfully for date: $report_date";

            // Optional: Redirect
            // header('Location: ../../../index.php');
            // exit();

        } catch (Exception $e) {
            mysqli_rollback($conn);
            echo "Failed to save report: " . $e->getMessage();
        }

    } else {
        echo "No data found in paint_mini_store_history for the given date: $report_date.";
    }
}
?>
