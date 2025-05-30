<?php
include('connect.php');

if (isset($_POST['StockIn'])) {
    // Get the item code selected in the form
    $item_code = $_POST['inventorySelect'];

    $qnty = $_POST['Qnty'];
    $received_by = $_POST['Recived_by'];
    $remark = $_POST['remark'];
    $department = $_POST['department'];

    // define 
    // $pending=0
    // $accepted=1
    // $rejected=2   
    $pending = 0;
    $In_Out = 'IN';
    $status = "active";
    $cancel = 0; //0 means the order is not cancelled by the store admin yet...its active
    $db_new_balance = 0;

    // ***************************inventory_query*******************************************
    $inventory_query = "SELECT * FROM inventory_items WHERE item_code = '$item_code'";
    $inventory_query_run = mysqli_query($conn, $inventory_query);
    if ($inventory_query_run) {
        foreach ($inventory_query_run as $inventory_row) {

            $db_item_code = $inventory_row['item_code'];
            $db_item_description = $inventory_row['item_description'];
            $db_uom = $inventory_row['uom'];
            $db_category = $inventory_row['category'];
            $db_origin = $inventory_row['origin'];
        }
    }
    // ***************************inventory_query*******************************************
    // ***************************inventory_query*******************************************
    $main_store_balance_query = "SELECT * FROM main_store_balance WHERE item_code = '$item_code'";
    $main_store_balance_run = mysqli_query($conn, $main_store_balance_query);
    // Check if any rows were returned
    if (mysqli_num_rows($main_store_balance_run) == 0) {
        // No rows found, insert new record
        $main_store_balance_insert = "INSERT INTO main_store_balance(item_code, balance,status) VALUES ('$item_code', '$db_new_balance','$status')";
        mysqli_query($conn, $main_store_balance_insert);
    } else {
        echo "the item already exist in db";
    }

    // ***************************inventory_query*******************************************
    $main_store_request = "INSERT INTO main_store_request(item_code,team1,team2,department,requested_by,qnty,In_Out,InFrom_OutTo,status,cancel)
     VALUES ('$item_code','$pending','$pending','$department','$received_by','$qnty','$In_Out','$remark','$status','$cancel')";
    // Execute the query
    if ($conn->query($main_store_request) === TRUE) {

    } else {
        echo "Error: " . $main_store_request . "<br>" . $conn->error;
    }
    ?>
    <script>
        alert("Request Successful");
        window.location = "../../../main_store/stock.php";
    </script>
    <?php

}
if (isset($_POST['StockOut'])) {
    // Get the item code selected in the form
    $item_code = $_POST['inventorySelect'];

    $qnty = $_POST['Qnty'];
    $received_by = $_POST['Received_by'];
    $remark = $_POST['remark'];
    $department = $_POST['department'];

    // define 
    // $pending=0
    // $accepted=1
    // $rejected=2 

    $pending = 0;
    $In_Out = 'OUT';
    $status = "active";
    $cancel = 0; //0 means the order is not cancelled by the store admin yet...its active
    $db_new_balance = 0;

    // ***************************inventory_query*******************************************
    $inventory_query = "SELECT * FROM inventory_items WHERE item_code = '$item_code'";
    $inventory_query_run = mysqli_query($conn, $inventory_query);
    if ($inventory_query_run) {
        foreach ($inventory_query_run as $inventory_row) {

            $db_item_code = $inventory_row['item_code'];
            $db_item_description = $inventory_row['item_description'];
            $db_uom = $inventory_row['uom'];
            $db_category = $inventory_row['category'];
            $db_origin = $inventory_row['origin'];
        }
    }
    // ***************************inventory_query*******************************************

    // ***************************balance_query*******************************************
    $main_store_balance_query = "SELECT * FROM main_store_balance WHERE item_code = '$item_code'";
    $main_store_balance_run = mysqli_query($conn, $main_store_balance_query);
    // Check if any rows were returned
    if (mysqli_num_rows($main_store_balance_run) == 0) {
        // No rows found, insert new record
        $main_store_balance_insert = "INSERT INTO main_store_balance(item_code, balance,status) VALUES ('$item_code', '$db_new_balance','$status')";
        mysqli_query($conn, $main_store_balance_insert);
    } else {
        echo "the item already exist in db";
    }

    // ***************************balance_query+
    $main_store_request = "INSERT INTO main_store_request(item_code,team1,team2,department,requested_by,qnty,In_Out,InFrom_OutTo,status,cancel) 
    VALUES ('$item_code','$pending','$pending','$department','$received_by','$qnty','$In_Out','$remark','$status','$cancel')";
    // Execute the query
    if ($conn->query($main_store_request) === TRUE) {

    } else {
        echo "Error: " . $main_store_request . "<br>" . $conn->error;
    }
    ?>
    <script>
        alert("Request Successful");
        window.location = "../../../main_store/stock.php";
    </script>
    <?php
}
if (isset($_POST['delete_stock_item'])) {
    // Get the item code selected in the form
    $item_code = $_POST['delete_item_id'];
    echo $item_code;
    // $remark = $_POST['remark'];
    // $requested_by = $_POST['requested_by'];
    // define 
    // $pending=0
    // $accepted=1
    // $rejected=2   
    // $pending = 0;
    // $In_Out = 'Delete';
    // $qnty = 0;
    $status = "inactive";

    // ***************************inventory_query*******************************************
    $inventory_query = "SELECT * FROM inventory_items WHERE item_code = '$item_code'";
    $inventory_query_run = mysqli_query($conn, $inventory_query);
    if ($inventory_query_run) {
        foreach ($inventory_query_run as $inventory_row) {

            $db_item_code = $inventory_row['item_code'];
            $db_item_description = $inventory_row['item_description'];
            $db_uom = $inventory_row['uom'];
            $db_category = $inventory_row['category'];
            $db_origin = $inventory_row['origin'];
        }
    }
    // ***************************inventory_query*******************************************



    // Prepared statement
    $stmt = $conn->prepare("UPDATE main_store_balance SET status = ? WHERE item_code = ?");
    $stmt->bind_param("ss", $status, $item_code);

    if ($stmt55->execute()) {
        // Redirect after successful update
        header('Location: ../../../main_store/stock.php');
        exit();
    } else {
        // Handle error before any output
        echo "Error updating transaction: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}






