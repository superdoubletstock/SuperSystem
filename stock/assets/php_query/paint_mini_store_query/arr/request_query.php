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
    $stmt = $conn->prepare("UPDATE main_store_request SET InFrom_OutTo = ?, cancel = ? WHERE transaction_id = ?");
    $stmt->bind_param("ssi", $remark, $cancel, $transaction_id);

    if ($stmt->execute()) {
?>
        <script>
            alert("Cancelled Successfully");
            window.location = "../../../paint_mini_store/request.php";
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
        $sender_team1_name = $fullname . "  " . "Accepted";
        
        // ***************************requst_query_for_team2*******************************************
        $main_store_balance_query = "SELECT * FROM main_store_request WHERE transaction_id = '$acceptItemCode'";

        $main_store_balance_query_run = mysqli_query($conn, $main_store_balance_query);
        if ($main_store_balance_query_run) {
          
            if (mysqli_num_rows($main_store_balance_query_run) > 0) {
                 
                foreach ($main_store_balance_query_run as $balance_row) {


                    $db_team2_status = $balance_row['sender_team2_accept']; //0 or 1 or 2
                    $db_team1_status = $balance_row['sender_team1_accept']; //0 or 1 or 2
                //    $sender_team1_name=$balance_row['sender_team1_name'];
                //     $sender_team2_name=$balance_row['sender_team2_name'];
                    $db_requested_by = $balance_row['sender_name']; // the of the sender from other store
                    $db_qnty = $balance_row['qnty']; //qnty required by other store
                    $db_In_Out_status = $balance_row['In_Out']; //the in out status of the other store IN/OUT
                    $active_inactive_status = $balance_row['sender_status']; //the in out status of the other store IN/OUT



                    
                }
            } else {
                echo "The item is not in the paint Mini store item list.";
            }
        } else {
            echo "Database query failed: " . mysqli_error($conn);
        }

        // ***************************requst_query_for_team2*******************************************
        $db_team2_status = (int) trim($db_team2_status); // how can i change the int into varchar

        if ($db_team2_status == 1) {
            $team1_status="active";
        
            $stmain = "UPDATE main_store_request SET sender_team1_accept='$team1' ,sender_status='$team1_status',sender_team1_name='$sender_team1_name' WHERE transaction_id='$acceptItemCode'";
            $stmain1 = mysqli_query($conn, $stmain) or die(mysqli_error($conn));
            header('Location:../../../paint_mini_store/request.php');
            
            
        } else if ($db_team2_status == 0) {
            $stmain = "UPDATE main_store_request SET sender_team1_accept='$team1',sender_team1_name='$sender_team1_name' WHERE transaction_id='$acceptItemCode'";
            $stmain1 = mysqli_query($conn, $stmain) or die(mysqli_error($conn));
            header('Location:../../../paint_mini_store/request.php');
            
            echo "team 2 have not accepted the request yet! wait a  munite untill they accept and check your balance";
        } else if ($db_team2_status == 2) {
            echo "team 2 have rejected the request";
            $stmain = "UPDATE main_store_request SET sender_team1_accept='$team1' ,sender_team1_name='$sender_team1_name' WHERE transaction_id='$acceptItemCode'";
            $stmain1 = mysqli_query($conn, $stmain) or die(mysqli_error($conn));
            header('Location:../../../paint_mini_store/request.php');
           
        }

        $conn->close();

        
    } else if ($role == "team2") {
        // dawit
        $team2 = 1;
        $sender_team2_name = $fullname . "  " . "Accepted";

         // ***************************requst_query_for_team2*******************************************
        $main_store_balance_query = "SELECT * FROM main_store_request WHERE transaction_id = '$acceptItemCode'";
        $main_store_balance_query_run = mysqli_query($conn, $main_store_balance_query);
        if ($main_store_balance_query_run) {
            if (mysqli_num_rows($main_store_balance_query_run) > 0) {
                foreach ($main_store_balance_query_run as $balance_row) {
                    $db_team2_status = $balance_row['sender_team2_accept']; //0 or 1 or 2
                    $db_team1_status = $balance_row['sender_team1_accept']; //0 or 1 or 2
                //    $sender_team1_name=$balance_row['sender_team1_name'];
                //     $sender_team2_name=$balance_row['sender_team2_name'];
                    $db_requested_by = $balance_row['sender_name']; // the of the sender from other store
                    $db_qnty = $balance_row['qnty']; //qnty required by other store
                    $db_In_Out_status = $balance_row['In_Out']; //the in out status of the other store IN/OUT
                    $active_inactive_status = $balance_row['sender_status']; //the in out status of the other store IN/OUT

                }
            } else {
                echo "The item is not in the paint Mini store item list.";
            }
        } else {
            echo "Database query failed: " . mysqli_error($conn);
        }

        // ***************************requst_query_for_team2*******************************************
        $db_team1_status = (int) trim($db_team1_status); // how can i change the int into varchar

        if ($db_team1_status == 1) {
            $team2_status="active";
            

            $stmain = "UPDATE main_store_request SET sender_status='$team2_status',sender_team2_accept='$team2' ,sender_team2_name='$sender_team2_name' WHERE transaction_id='$acceptItemCode'";
            $stmain1 = mysqli_query($conn, $stmain) or die(mysqli_error($conn));
            header('Location:../../../paint_mini_store/request.php');
          
        } else if ($db_team1_status == 0) {
            $stmain = "UPDATE main_store_request SET sender_team2_accept='$team2' ,sender_team2_name='$sender_team2_name' WHERE transaction_id='$acceptItemCode'";
            $stmain1 = mysqli_query($conn, $stmain) or die(mysqli_error($conn));
            header('Location:../../../paint_mini_store/request.php');
    
            echo "team 2 have not accepted the request yet! wait a  munite untill they accept and check your balance";
        } else if ($db_team1_status == 2) {
            echo "team 2 have rejected the request";
            $stmain = "UPDATE main_store_request SET sender_team2_accept='$team2' ,sender_team2_name='$sender_team2_name' WHERE transaction_id='$acceptItemCode'";
            $stmain1 = mysqli_query($conn, $stmain) or die(mysqli_error($conn));
            header('Location:../../../paint_mini_store/request.php');
          
        }

        $conn->close();   
    }
}

if (isset($_POST['reject_request'])) {
    // Get data from POST request
    $rejectItemCode = $_POST['rejectItemCode'];//transaction id
    if ($role == "team1") {
        $team1 = 2;
        $team1_reject = $fullname . "  " . "Rejected";

        // Prepared statement
        $stmt = $conn->prepare("UPDATE main_store_request SET sender_team1_accept = ?,sender_team1_name=? WHERE transaction_id = ?");
        $stmt->bind_param("ssi", $team1, $team1_reject, $rejectItemCode);
    } else if ($role == "team2") {

        $team2 = 2;
        $team2_reject = $fullname . "  " . "Rejected";
        // Prepared statement
        $stmt = $conn->prepare("UPDATE main_store_request SET sender_team2_accept = ?,sender_team2_name=? WHERE transaction_id = ?");
        $stmt->bind_param("ssi", $team2, $team2_reject, $rejectItemCode);
    }
    if ($stmt->execute()) {
        // Redirect after successful update
        header('Location:../../../paint_mini_store/request.php');
        exit();
    } else {
        // Handle error before any output
        echo "Error updating transaction: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
