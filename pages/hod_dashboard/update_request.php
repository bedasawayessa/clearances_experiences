
<?php
session_start();

require 'index.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Include database connection
include '../../includes/db_connection.php';

// Check if form data is submitted
if (isset($_POST["updated"])){
    // Retrieve form data
    $clearance_id = $_POST['clearance_id'];
    $clearanceType = $_POST['clearanceType'];
    $clearanceReason = $_POST['clearanceReason'];
    $requestedDate = $_POST['requestedDate'];
    $priority = $_POST['priority'];
    $supportingDocuments = $_POST['supportingDocuments'];

    // Update specific columns of the clearance request in the database
    $sql = "UPDATE clearances_tbl 
            SET ClearanceType = '$clearanceType', 
                ClearanceReason = '$clearanceReason', 
                RequestedDate = '$requestedDate', 
                Priority = '$priority', 
                SupportingDocuments = '$supportingDocuments' 
            WHERE ClearanceID = '$clearance_id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the dashboard page with success message
        $_SESSION['success'] = "Clearance request updated successfully.";
        header("Location: submitted_request.php");
        exit;
    } else {
        // If there's an error, display error message
        echo "Error updating record: " . $conn->error;
		$_SESSION['success'] = "NO Clearance request updated successfully.";
    }
} else {
    // If the form data is not submitted via POST method
    echo "Form submission method not allowed.";
	echo "<a href='edit_request.php?id=$clearance_id'>Back to Edit User</a>";
}

// Close the database connection
$conn->close();
?>