<?php
if (isset($_POST['AddUser'])) {

    include('connect.php');

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $role = $_POST['role'];
    $department = $_POST['department'];
     $sub_role = $_POST['sub_role'];
    $status = "active";

    // -------------------------------
    // Step 1: Generate next available user ID
    $existing_ids = [];
    $result = $conn->query("SELECT user_id FROM users ORDER BY user_id");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $existing_ids[] = $row['user_id'];
        }
    }

    $user_id = '';
    for ($i = 1; $i <= 9999; $i++) {
        $id = 'U' . str_pad($i, 4, '0', STR_PAD_LEFT);
        if (!in_array($id, $existing_ids)) {
            $user_id = $id;
            break;
        }
    }

    if (empty($user_id)) {
        die("Error: All user IDs from U001 to U999 are taken.");
    }

    // -------------------------------
    // Step 2: Insert new user
    $query = "INSERT INTO users (user_id, username, password, fullname, phonenumber, role,sub_role,department, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)"; 

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("sssssssss", $user_id, $user_name, $password, $full_name, $phone_number, $role,$sub_role, $department, $status);

        if ($stmt->execute()) {
            echo "User added successfully!";
            header('Location:../../../SuperAdmin/settings.php');
            exit();
        } else {
            echo "Error adding user: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Query preparation failed: " . $conn->error;
    }

    $conn->close();
}


if (isset($_POST['UpdateUser'])) {

    include('connect.php');

    $user_id = $_POST['user_id'];
    $edit_user_name = $_POST['edit_user_name'];
    $full_name = $_POST['edit_full_name'];
    $edit_password = $_POST['edit_password'];
    $edit_full_name = $_POST['edit_full_name'];
    $edit_phone_number = $_POST['edit_phone_number'];
    $status = "active";

    // Prepared statement
    $stmt = $conn->prepare("UPDATE users SET username = ? , password=? , fullname=?, phonenumber=? WHERE user_id = ?");
    $stmt->bind_param("sssss", $edit_user_name, $edit_password , $edit_full_name,$edit_phone_number,$user_id);
    if ($stmt->execute()) {
        // Redirect after successful update
       header('Location:../../../SuperAdmin/settings.php');
        exit();
    } else {
        // Handle error before any output
        echo "Error updating transaction: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

if (isset($_POST['Diactivate_User'])) {

    include('connect.php');

    $diactivate_id = $_POST['diactivate_id'];

    $status = "inactive";

    // Prepared statement
    $stmt = $conn->prepare("UPDATE users SET status = ?  WHERE user_id = ?");
    $stmt->bind_param("ss", $status,$diactivate_id);
    if ($stmt->execute()) {
        // Redirect after successful update
       header('Location:../../../SuperAdmin/settings.php');
        exit();
    } else {
        // Handle error before any output
        echo "Error updating transaction: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}