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
            window.location = "../../../main_store/store/request.php";
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

    // ***************************inventory_query main store*******************************************
    $main_store_balance_query = "SELECT * FROM main_store_balance WHERE item_code = '$acceptItemCode2'";
    $main_store_balance_query_run = mysqli_query($conn, $main_store_balance_query);
    if ($main_store_balance_query_run) {
        if (mysqli_num_rows($main_store_balance_query_run) > 0) {
            foreach ($main_store_balance_query_run as $balance_row) {
                $db_balance = $balance_row['balance'];
            }
        } else {
            echo "The item is not in the main store item list.";
        }
    } else {
        echo "Database query failed: " . mysqli_error($conn);
    }

    // ***************************inventory_query main store*******************************************
    // ***************************inventory_query*******************************************
    $main_store_balance_query = "SELECT balance FROM paint_mini_store_balance WHERE item_code = '$acceptItemCode2'";
    $main_store_balance_query_run = mysqli_query($conn, $main_store_balance_query);
    if ($main_store_balance_query_run) {
        if (mysqli_num_rows($main_store_balance_query_run) > 0) {
            foreach ($main_store_balance_query_run as $balance_row) {
                $pm_db_balance = $balance_row['balance'];
            }
        } else {
            echo "The item is not in the main store item list.";
        }
    } else {
        echo "Database query failed: " . mysqli_error($conn);
    }

    // ***************************inventory_query*******************************************


    // ***************************requst_query_for_team2*******************************************
    $main_store_balance_query = "SELECT * FROM main_store_request WHERE transaction_id = '$acceptItemCode'";
    $main_store_balance_query_run = mysqli_query($conn, $main_store_balance_query);
    if ($main_store_balance_query_run) {
        if (mysqli_num_rows($main_store_balance_query_run) > 0) {
            foreach ($main_store_balance_query_run as $balance_row) {
                $db_team2_status = $balance_row['team2'];
                $db_team1_status = $balance_row['team1'];
                $db_department = $balance_row['department'];
                $db_requested_by = $balance_row['requested_by'];
                $db_qnty = $balance_row['qnty'];
                $db_In_Out_status = $balance_row['In_Out'];
                $db_team2_status_accept = $balance_row['team2_accept'];
                $db_team1_status_accept = $balance_row['team1_accepet'];
            }
        } else {
            echo "The item is not in the main store item list.";
        }
    } else {
        echo "Database query failed: " . mysqli_error($conn);
    }

    // ***************************requst_query_for_team2*******************************************
if ($db_department == "paint_mini_store"){
        $val="paint_mini_store_histrory";
        $val2="paint_mini_store_balance";
        $val3="paint_mini_store_request";
    }
     else if ($db_department == "fiber_mini_store"){
        $val="fiber_mini_store_histrory";
        $val2="fiber_mini_store_balance";
        $val3="fiber_mini_store_request";
    }
        // ***************************paint mini store request*******************************************
    $main_store_balance_query = "SELECT * FROM paint_mini_store_request WHERE transaction_id = '$acceptItemCode'";
    $main_store_balance_query_run = mysqli_query($conn, $main_store_balance_query);
    if ($main_store_balance_query_run) {
        if (mysqli_num_rows($main_store_balance_query_run) > 0) {
            foreach ($main_store_balance_query_run as $balance_row) {

                $pm_db_team2_status_accept = $balance_row['team2_accept'];
                $pm_db_team1_status_accept = $balance_row['team1_accepet'];
            }
        } else {
            echo "The item is not in the main store item list.";
        }
    } else {
        echo "Database query failed: " . mysqli_error($conn);
    }
     
    // ***************************paint mini store request*******************************************

    if ($role == "team1") {
        $team1 = 1;
        $team1_accept = $fullname . "  " . "Accepted";
        // Prepared statement
        $db_team2_status = (int) trim($db_team2_status); // how can i change the int into varchar
        if ($db_team2_status == 1) {
            // this means they have already accepted  

            if ($db_In_Out_status == "OUT") {
                //the the action is stock out
                $new_balance = $db_balance - $db_qnty; //we add
                $stock_out = $db_qnty;
                $stock_in = 0;
                //this done for paintMini
                $checkBalanceStmt = $conn->prepare("SELECT balance FROM main_store_balance WHERE item_code = ? AND balance - ? >= 0");
                $checkBalanceStmt->bind_param("si", $acceptItemCode2, $stock_out);
                $checkBalanceStmt->execute();
                $balanceResult = $checkBalanceStmt->get_result();
                if ($balanceResult->num_rows > 0) {
                    // Prepare the INSERT query

                    $stmt3 = $conn->prepare("INSERT INTO main_store_history(item_code, stock_in, stock_out, balance,requested_by,team1_accept,team2_accept) VALUES (?, ?, ?, ?,?,?,?)");
                    $stmt3->bind_param("sdddsss", $acceptItemCode2, $stock_in, $stock_out, $new_balance, $db_requested_by, $team1_accept, $db_team2_status_accept); // Adjust types accordingly
                    $stmt3Executed = $stmt3->execute();



                    if ($db_department == "paint_mini_store") {
                        $pm_new_balance = $pm_db_balance + $db_qnty; //we add
                        $pm_stock_out = 0;
                        $pm_stock_in = $db_qnty;

                        $stmt3 = $conn->prepare("INSERT INTO paint_mini_store_history(item_code, stock_in, stock_out, balance,requested_by,team1_accept,team2_accept) VALUES (?, ?, ?, ?,?,?,?)");
                        $stmt3->bind_param("sdddsss", $acceptItemCode2, $pm_stock_in, $pm_stock_out, $pm_new_balance, $db_requested_by, $pm_db_team1_status_accept, $pm_db_team2_status_accept); // Adjust types accordingly
                        $stmt3Executed = $stmt3->execute();


                        $stmt4 = $conn->prepare("UPDATE paint_mini_store_balance SET balance = ? WHERE item_code = ?");
                        $stmt4->bind_param("ss", $pm_new_balance, $acceptItemCode2);
                        $stmt4Executed = $stmt4->execute();
                    }

                    //other departments will continue from here follow this step
                } else {

                    echo "Insufficient stock balance for item: $acceptItemCode2";
                }
            } 
            else if ($db_In_Out_status = "IN") {

                // we excute in function
                $new_balance = $db_balance + $db_qnty;
                $stock_in = $db_qnty;

                $stock_out = 0;
                // Prepare the INSERT query
                $stmt3 = $conn->prepare("INSERT INTO main_store_history(item_code, stock_in, stock_out, balance,requested_by,team1_accept,team2_accept) VALUES (?, ?, ?, ?,?,?,?)");
                $stmt3->bind_param("sdddsss", $acceptItemCode2, $stock_in, $stock_out, $new_balance, $db_requested_by, $team1_accept, $db_team2_status_accept); // Adjust types accordingly
                $stmt3Executed = $stmt3->execute();
            } else {

                echo "the action is neither in our out";
            }
        } else if ($db_team2_status == 0) {
            $new_balance = $db_balance;
            echo "team 1 have not accepted the request yet! wait a  munite untill they accept and check your balance";
        } else if ($db_team2_status == 2) {
            echo "team 2 have rejected the request";
            $new_balance = $db_balance;
        }

        $stmt = $conn->prepare("UPDATE main_store_balance SET balance = ? WHERE item_code = ?");
        $stmt->bind_param("ss", $new_balance, $acceptItemCode2);

        $stmt2 = $conn->prepare("UPDATE main_store_request SET team1 = ? , team1_accepet = ? WHERE transaction_id = ?");
        $stmt2->bind_param("ssi", $team1, $team1_accept, $acceptItemCode);

        $stmtExecuted = $stmt->execute();
        $stmt2Executed = $stmt2->execute();

        // Check all
        if ($stmtExecuted && $stmt2Executed) {
            header('Location:../../../main_store/team1/request.php');
            exit();
        } else {
            echo "Error updating transaction:<br>";
            if (!$stmtExecuted)
                echo "main_store_balance update failed: " . $stmt->error . "<br>";
            if (!$stmt2Executed)
                echo "main_store_request update failed: " . $stmt2->error . "<br>";
        }

        // Close all
        $stmt->close();
        $stmt2->close();

        $conn->close();
    } 











    else if ($role == "team2") {
        // dawit
        $team2 = 1;
        $team2_accept = $fullname . "  " . "Accepted";
        // Prepared statement
        $db_team1_status = (int) trim($db_team1_status); // how can i change the int into varchar
        if ($db_team1_status == 1) {
            // this means they have already accepted  
            if ($db_In_Out_status == "OUT") {
                //the the action is stock out

                $new_balance = $db_balance - $db_qnty; //we add

                $stock_out = $db_qnty;
                $stock_in = 0;

                //this done for paintMini
                $checkBalanceStmt = $conn->prepare("SELECT balance FROM main_store_balance WHERE item_code = ? AND balance - ? >= 0");
                $checkBalanceStmt->bind_param("si", $acceptItemCode2, $stock_out);
                $checkBalanceStmt->execute();
                $balanceResult = $checkBalanceStmt->get_result();
                if ($balanceResult->num_rows > 0) {
                    // Prepare the INSERT query

                    $stmt3 = $conn->prepare("INSERT INTO main_store_history(item_code, stock_in, stock_out, balance,requested_by,team1_accept,team2_accept) VALUES (?, ?, ?, ?,?,?,?)");
                    $stmt3->bind_param("sdddsss", $acceptItemCode2, $stock_in, $stock_out, $new_balance, $db_requested_by, $db_team1_status_accept, $team2_accept); // Adjust types accordingly
                    $stmt3Executed = $stmt3->execute();

             


                        if ($db_department == "paint_mini_store") {
                        $pm_new_balance = $pm_db_balance + $db_qnty; //we add
                        $pm_stock_out = 0;
                        $pm_stock_in = $db_qnty;

                        $stmt3 = $conn->prepare("INSERT INTO paint_mini_store_history(item_code, stock_in, stock_out, balance,requested_by,team1_accept,team2_accept) VALUES (?, ?, ?, ?,?,?,?)");
                        $stmt3->bind_param("sdddsss", $acceptItemCode2, $pm_stock_in, $pm_stock_out, $pm_new_balance, $db_requested_by, $pm_db_team1_status_accept, $pm_db_team2_status_accept); // Adjust types accordingly
                        $stmt3Executed = $stmt3->execute();


                        $stmt4 = $conn->prepare("UPDATE paint_mini_store_balance SET balance = ? WHERE item_code = ?");
                        $stmt4->bind_param("ss", $pm_new_balance, $acceptItemCode2);
                        $stmt4Executed = $stmt4->execute();



                    }//other departments will continue from here follow this step








                } else {

                    echo "Insufficient stock balance for item: $acceptItemCode2";
                }
            } else if ($db_In_Out_status = "IN") {

                // we excute in function
                $new_balance = $db_balance + $db_qnty;


                $stock_in = $db_qnty;

                $stock_out = 0;
                // Prepare the INSERT query
                $stmt3 = $conn->prepare("INSERT INTO main_store_history(item_code, stock_in, stock_out, balance,requested_by,team1_accept,team2_accept) VALUES (?, ?, ?, ?,?,?,?)");
                $stmt3->bind_param("sdddsss", $acceptItemCode2, $stock_in, $stock_out, $new_balance, $db_requested_by, $db_team1_status_accept, $team2_accept); // Adjust types accordingly
                $stmt3Executed = $stmt3->execute();
            } else {

                echo "the action is neither in our out";
            }
        } else if ($db_team1_status == 0) {
            $new_balance = $db_balance;

            echo "team 1 have not accepted the request yet! wait a  munite untill they accept and check your balance";
        } else if ($db_team1_status == 2) {
            echo "team 1 have rejected the request";
            $new_balance = $db_balance;
        }
        // Prepare and bind for first update
        $stmt = $conn->prepare("UPDATE main_store_balance SET balance = ? WHERE item_code = ?");
        $stmt->bind_param("ss", $new_balance, $acceptItemCode2);
        // Prepare and bind for second update
        $stmt2 = $conn->prepare("UPDATE main_store_request SET team2 = ? ,team2_accept=? WHERE transaction_id = ?");
        $stmt2->bind_param("ssi", $team2, $team2_accept, $acceptItemCode);

        // Execute both statements
        $stmtExecuted = $stmt->execute();
        $stmt2Executed = $stmt2->execute();

        if ($stmtExecuted && $stmt2Executed) {
            // Redirect if both updates succeed
            header('Location: ../../../main_store/team2/request.php');
            exit();
        } else {
            // Handle errors if any statement fails
            echo "Error updating transaction:<br>";
            if (!$stmtExecuted)
                echo "main_store_balance update failed: " . $stmt->error . "<br>";
            if (!$stmt2Executed)
                echo "main_store_request update failed: " . $stmt2->error . "<br>";
        }
        // Clean up
        $stmt->close();
        $stmt2->close();
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
        $stmt = $conn->prepare("UPDATE main_store_request SET team1 = ?,team1_accepet=? WHERE transaction_id = ?");
        $stmt->bind_param("ssi", $team1, $team1_reject, $rejectItemCode);
        if ($stmt->execute()) {
            // Redirect after successful update
            header('Location:../../../main_store/team1/request.php');
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
        $stmt = $conn->prepare("UPDATE main_store_request SET team2 = ?,team2_accept=? WHERE transaction_id = ?");
        $stmt->bind_param("ssi", $team2, $team2_reject, $rejectItemCode);

        if ($stmt->execute()) {
            // Redirect after successful update
            header('Location:../../../main_store/team2/request.php');
            exit();
        } else {
            // Handle error before any output
            echo "Error updating transaction: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}

if (isset($_POST['forward_request'])) {

    // Get data from POST request
    $ForwardTransactionID = $_POST['ForwardTransactionID'];
    $FrowardItemCode = $_POST['FrowardItemCode'];
    $remark = $_POST['remark'];
    $requsted_by = $_POST['requsted_by'];
    $requestng_department = $_POST['requestng_department'];
    $ForwardQnty = $_POST['ForwardQnty'];
    $status = "active";

    $team1 = 0;
    $team2 = 0;
    $In_Out = "OUT";
    $cancel = 0;
    if ($requestng_department == "paint_mini_store") {

        $department = "paint_mini_store";
    } else if ($requestng_department == "fiber_mini_store") {

        $department = "fiber_mini_store";
    } else if ($requestng_department == "fiber_mini_mini_store") {

        $department = "fiber_mini_mini_store";
    } else if ($requestng_department == "paint_mini_mini_store") {

        $department = "paint_mini_mini_store";
    }



    $main_store_request = "INSERT INTO main_store_request(item_code,team1,team2,department,requested_by,qnty,In_Out,InFrom_OutTo,status,cancel)
     VALUES ('$FrowardItemCode','$team1','$team2','$department','$requsted_by','$ForwardQnty','$In_Out','$remark','$status','$cancel')";
    // Execute the query
    if ($conn->query($main_store_request) === TRUE) {
    } else {
        echo "Error: " . $main_store_request . "<br>" . $conn->error;
    }
    ?>
    <script>
        alert("Request Successful");
        window.location = "../../../main_store/store/incoming_notification.php";
    </script>
<?php

}
