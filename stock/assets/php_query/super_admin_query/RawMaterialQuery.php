<?php


if (isset($_POST['AddItem'])) {
    include('connect.php');
    $Item_Description = $_POST['Item_Description'];
    $category = $_POST['category'];
    $uom = $_POST['uom'];
    $Origin = $_POST['Origin'];
    $Conversion_rate = $_POST['Conversion_rate'];
    $Unit_cost = $_POST['Unit_cost'];
    $unit_price = $_POST['unit_price'];
    $status = "active";


    $m_store=0;
    $fm_store=0;
    $pm_store=0;
    $fmm_store=0;
    $pmm_store=0;
    $finishing_store=0;
    $metal_store=0;
    $genda_getema_store=0;
    $fp_store=0;
    $total_balance=0;





    // -------------------------------
    // Step 1: Generate next available user ID
    $existing_ids = [];
    $result = $conn->query("SELECT item_code FROM inventory_items ORDER BY item_code");

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $existing_ids[$row['item_code']] = true; // use associative array for faster lookup
        }
    }

    $item_code = '';
    for ($i = 1; $i <= 9999; $i++) {
        $id = 'ITEM' . str_pad($i, 4, '0', STR_PAD_LEFT);
        if (!isset($existing_ids[$id])) {
            $item_code = $id;
            break;
        }
    }

    if (empty($item_code)) {
        die("Error: All item codes from ITM0001 to ITM9999 are taken.");
    }
    // Step 1: Generate next available user ID


   
    // Step 2: Insert new inventory items table
// Prepare and execute first insert
$inventory_items_query = "INSERT INTO inventory_items (item_code, item_description, conversion_rate, category, uom, origin, unit_cost, unit_price, status_of_item) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt1 = $conn->prepare($inventory_items_query)) {
    $stmt1->bind_param("ssssssdds", $item_code, $Item_Description, $Conversion_rate, $category, $uom, $Origin, $Unit_cost, $unit_price, $status);

    if (!$stmt1->execute()) {
        echo "Error adding inventory item: " . $stmt1->error;
        $stmt1->close();
        exit();  // stop here if error occurs
    }
    $stmt1->close();
} else {
    echo "Query preparation failed (inventory): " . $conn->error;
    exit();
}

// Prepare and execute second insert
$total_store_balance_query = "INSERT INTO total_super_store_balance (item_code, m_store, fm_store, pm_store, fmm_store, pmm_store, finishing_store, metal_store, genda_getema, fp_store, total_balance) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt2 = $conn->prepare($total_store_balance_query)) {
    $stmt2->bind_param("sdddddddddd", $item_code, $m_store, $fm_store, $pm_store, $fmm_store, $pmm_store, $finishing_store, $metal_store, $genda_getema_store, $fp_store, $total_balance);

    if ($stmt2->execute()) {
        echo "User added successfully!";
        header('Location:../../../SuperAdmin/inventoryItems.php');
        exit();
    } else {
        echo "Error adding total store balance: " . $stmt2->error;
    }
    $stmt2->close();
} else {
    echo "Query preparation failed (store balance): " . $conn->error;
}






    $conn->close();

    
}


if (isset($_POST['UpdateItems'])) {
    include('connect.php');
    $Item_code = $_POST['edit_Item_code'];
    $Item_Description = $_POST['edit_Item_description'];
    $category = $_POST['edit_category'];
    $uom = $_POST['edit_uom'];
    $Origin = $_POST['edit_Origin'];
    $Conversion_rate = $_POST['edit_conversion_rate'];
    $Unit_cost = $_POST['edit_unit_cost'];
    $unit_price = $_POST['edit_unit_price'];

    $status = "active";

    // Prepared statement

    $stmt = $conn->prepare("UPDATE inventory_items SET item_description = ? , conversion_rate=? , category=?, uom= ? , origin= ?, unit_cost=?, unit_price=?,status_of_item=? WHERE item_code = ?");

    $stmt->bind_param("sssssddss", $Item_Description, $Conversion_rate, $category, $uom, $Origin, $Unit_cost, $unit_price, $status, $Item_code);

    if ($stmt->execute()) {
        echo "updated successfully";
        // Redirect after successful update
        header('Location:../../../SuperAdmin/inventoryItems.php');
        exit();
    } else {
        // Handle error before any output
        echo "Error updating transaction: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['Diactivate_Item'])) {

    include('connect.php');

    $diactivate_id = $_POST['diactivate_id'];

    $status = "inactive";

    // Prepared statement
    $stmt = $conn->prepare("UPDATE inventory_items SET status_of_item = ?  WHERE item_code = ?");
    $stmt->bind_param("ss", $status, $diactivate_id);
    if ($stmt->execute()) {
        // Redirect after successful update
        header('Location:../../../SuperAdmin/inventoryItems.php');
        exit();
    } else {
        // Handle error before any output
        echo "Error updating transaction: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

    include('connect.php');
    $file = $_FILES['file'];

    // Validate MIME type (optional)
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    $allowedMimeTypes = ['text/plain', 'text/csv', 'application/vnd.ms-excel'];

    if (!in_array($mime, $allowedMimeTypes)) {
        echo "Invalid file type. Please upload a CSV file.";
        exit;
    }

    if (($handle = fopen($file['tmp_name'], 'r')) !== FALSE) {
        $headers = fgetcsv($handle);  // skip header row

        $rowCount = 0;
        // Prepare the SQL statement with placeholders
        $stmt = mysqli_prepare($conn, "INSERT INTO inventory_items
            (item_code, item_description, conversion_rate, category, uom, origin, unit_cost, unit_price, status_of_Item) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            echo "Prepare failed: " . mysqli_error($conn);
            exit;
        }
        $status = "active";  // manually assigned

        while (($data = fgetcsv($handle)) !== FALSE) {
            // Example: bind all as strings to keep it simple
            mysqli_stmt_bind_param(
                $stmt,
                'sssssssss',
                $data[0],  // item_code
                $data[1],  // item_description
                $data[2],  // conversion_rate
                $data[3],  // category
                $data[4],  // uom
                $data[5],  // origin
                $data[6],  // unit_cost
                $data[7],  // unit_price
                $status   // 
            );

            mysqli_stmt_execute($stmt);
            $rowCount++;
        }


        mysqli_stmt_close($stmt);
        fclose($handle);


?>
        <h3 style="color: green; font-family: Arial, sans-serif; background-color: #e6ffe6; padding: 5px 10px; border: 1px solid #b3ffb3; border-radius: 5px; ">
            Inserted <?= $rowCount ?> Items successfully.
        </h3>
<?php


        // echo " inserted $rowCount rows Successfully.";
    } else {
        echo "Failed to open the uploaded file.";
    }
    exit;
}
