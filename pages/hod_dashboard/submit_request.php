<?php
session_start();

// Connect to the database
include '../../includes/db_connection.php';

// Check if the form was submitted
if (isset($_POST['SubmitRequest'])) {
    // Retrieve form data
    $userName = $_POST['UserName'];
    $studentID = $_POST['StudentID'];
    $departmentID = $_POST['DepartmentID'];
    $clearanceType = $_POST['ClearanceType'];
    $clearanceReason = $_POST['ClearanceResaon']; // Typo in the name, should be ClearanceReason
    $requestedDate = $_POST['RequestedDate'];
    $priority = $_POST['Priority'];
    $supportingDocuments = $_POST['SupportingDocuments'];

    // Retrieve user ID from session
    $userID = $_SESSION['user_id'];

    // Check if the user has already requested clearance
    $existingRequestQuery = "SELECT * FROM clearances_tbl WHERE StudentID = '$studentID' AND UserID = '$userID'";
    $existingRequestResult = $conn->query($existingRequestQuery);
    
    if ($existingRequestResult->num_rows > 0) {
        // If a clearance request already exists for the user, display an error message
        echo "You have already requested clearance.";
        $_SESSION['success'] = "You have already requested clearance.";
        header("Location: submitted_request.php");
    } else {
        // Insert data into the database
        $sql = "INSERT INTO clearances_tbl (StudentID, UserID, DepartmentID, ClearanceType, ClearanceReason, Status, RequestedDate, Priority, SupportingDocuments, YearLevel) " .
               "VALUES ('$studentID', '$userID', '$departmentID', '$clearanceType', '$clearanceReason','Pending', '$requestedDate', '$priority', '$supportingDocuments', (SELECT YearLevel FROM students_tbl WHERE StudentID = '$studentID'))";

        if ($conn->query($sql) === TRUE) {
            echo "Request submitted successfully.";
            $_SESSION['success'] = "Request submitted successfully.";
            header("Location: submitted_request.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    // If the form was not submitted via POST method
    echo "Form submission method not allowed.";
}

// Close the database connection
$conn->close();
?>

