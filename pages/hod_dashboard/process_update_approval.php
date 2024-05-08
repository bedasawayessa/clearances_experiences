<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Check if the form was submitted
if (isset($_POST["Update_approval"])) {
    // Include database connection
    include '../../includes/db_connection.php';

    // Retrieve form data
    $approval_id = $_POST['approval_id'];
    $status = $_POST['status'];

    // Update the status of the approval in the database
    $update_query = "UPDATE approved_requests_tbl SET Status = '$status' WHERE ApprovalID = '$approval_id'";

    if ($conn->query($update_query) === true) {
        // If update successful, redirect to the previous page with success message
        $_SESSION['success'] = "Approval status updated successfully.";
        header("Location: my_approved_request.php?id=" . $approval_id);
        exit;
    } else {
        // If update fails, redirect to the previous page with error message
        $_SESSION['error'] = "Error updating approval status: " . $conn->error;
		header("Location: my_approved_request.php?id=" . $approval_id);
        exit;
    }
} else {
    // If the form was not submitted via POST method, redirect to the home page
    header("Location: ../index.php");
    exit;
}
