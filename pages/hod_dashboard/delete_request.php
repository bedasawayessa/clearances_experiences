<?php
session_start();

require 'index.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Check if ClearanceID is provided in the URL
if (!isset($_GET['id'])) {
    // If ClearanceID is not provided, redirect to the dashboard page
    header("Location: dashboard.php");
    exit;
}

// Retrieve the ClearanceID from the URL
$clearance_id = $_GET['id'];

// Include database connection
include '../../includes/db_connection.php';

// Check if the confirmation form was submitted
if (isset($_POST['confirm_delete'])) {
    // If confirmed, construct SQL query to delete the clearance request
    $sql = "DELETE FROM clearances_tbl WHERE ClearanceID = '$clearance_id'";

    // Execute the SQL query
    if ($conn->query($sql) === true) {
        // If deletion is successful, redirect to the dashboard page with a success message
        $_SESSION['success'] = "Clearance request deleted successfully.";
        header("Location: submitted_request.php");
        exit;
    } else {
        // If there's an error, display error message
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<div class="content">
  <div class="container p-4" style="box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
              
	<h2>Confirm Delete</h2>
		<p>Are you sure you want to delete this clearance request?</p>
		<form action="" method="post">
			<input type="submit" class="btn btn-danger" name="confirm_delete" value="Yes">
			<a  class="btn btn-primary" href="submitted_request.php">No</a>
		</form>
</div>
</div>


