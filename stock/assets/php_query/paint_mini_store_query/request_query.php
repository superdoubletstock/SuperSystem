<?php

include('connect.php');
session_start();
$role = $_SESSION['role'];
$fullname = $_SESSION['fullname'];
// Check if the form was submitted
if (isset($_POST['delete_stock_item'])) {
    // //this code is for when main store cancel request because of error 
    // and the request will be removed from active request and displayed in the arrchive

    $transaction_id = $_POST['deleteDepartmentId'];
    $remark = $_POST['remark'];
    $cancel = 1; // 1 means the request have been cancelled


    // Prepared statement
    $stmt = $conn->prepare("UPDATE paint_mini_store_request SET InFrom_OutTo = ?, cancel = ? WHERE transaction_id = ?");
    $stmt->bind_param("ssi", $remark, $cancel, $transaction_id);

    if ($stmt->execute()) {
?>
        <script>
            alert("Cancelled Successfully");
            window.location = "../../../paint_mini_store/store/request.php";
        </script>
    <?php


        exit();
    } else {
        // Handle error before any output
        echo "Error updating transaction: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['accept_request'])) {

    // this is tasks we do when team1 and team2 accept the request sent by main store

    $acceptItemCode = $_POST['acceptItemCode']; // this is the transaction id
    $acceptItemCode2 = $_POST['acceptItemCode2']; //this is the item code

    if ($role == "team1") {
      
        $team1 = 1;
        $team1_accept = $fullname . "  " . "Accepted";
        // Prepared statement
        $stmt = $conn->prepare("UPDATE paint_mini_store_request SET team1 = ?,team1_accepet=? WHERE transaction_id = ?");
        $stmt->bind_param("ssi", $team1, $team1_accept, $acceptItemCode);
        if ($stmt->execute()) {
            // Redirect after successful update
            header('Location:../../../paint_mini_store/team1/request.php');
            exit();
        } else {
            // Handle error before any output
            echo "Error updating transaction: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
   
   
    } else if ($role == "team2") {
        // dawit
        $team2 = 1;
        $team2_accept = $fullname . "  " . "Accepted";

         $stmt = $conn->prepare("UPDATE paint_mini_store_request SET team2 = ?,team2_accept=? WHERE transaction_id = ?");
        $stmt->bind_param("ssi", $team2, $team2_accept, $acceptItemCode);

        if ($stmt->execute()) {
            // Redirect after successful update
            header('Location:../../../paint_mini_store/team2/request.php');
            exit();
        } else {
            // Handle error before any output
            echo "Error updating transaction: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();



    
    }
}

if (isset($_POST['reject_request'])) {
    // Get data from POST request
    $rejectItemCode = $_POST['rejectItemCode'];
    if ($role == "team1") {
        $team1 = 2;
        $team1_reject = $fullname . "  " . "Rejected";

        // Prepared statement
        $stmt = $conn->prepare("UPDATE paint_mini_store_request SET team1 = ?,team1_accepet=? WHERE transaction_id = ?");
        $stmt->bind_param("ssi", $team1, $team1_reject, $rejectItemCode);
        if ($stmt->execute()) {
            // Redirect after successful update
            header('Location:../../../paint_mini_store/team1/request.php');
            exit();
        } else {
            // Handle error before any output
            echo "Error updating transaction: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else if ($role == "team2") {

        $team2 = 2;
        $team2_reject = $fullname . "  " . "Rejected";
        // Prepared statement
        $stmt = $conn->prepare("UPDATE paint_mini_store_request SET team2 = ?,team2_accept=? WHERE transaction_id = ?");
        $stmt->bind_param("ssi", $team2, $team2_reject, $rejectItemCode);

        if ($stmt->execute()) {
            // Redirect after successful update
            header('Location:../../../paint_mini_store/team2/request.php');
            exit();
        } else {
            // Handle error before any output
            echo "Error updating transaction: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}



