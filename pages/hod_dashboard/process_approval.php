<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}
// Retrieve the logged-in user's user_id
$user_id = $_SESSION['user_id'];

// Include database connection
include '../../includes/db_connection.php';

// Check if the form was submitted and the accept_request button is clicked
if (isset($_POST["accept_request"])) {
    // Retrieve form data
    $studentID = $_POST['student_id'];

    // Check if there are any active borrowings for the student
    $borrowingsQuery = "SELECT * FROM Borrowings_tbl WHERE StudentID = '$studentID' AND Status = 'approved'";
    $borrowingsResult = $conn->query($borrowingsQuery);

    // Check if there are any active borrowings
    if ($borrowingsResult->num_rows == 0) {
        // If there are no active borrowings, accept the request
        $clearanceID = $_POST['clearance_id'];

        // Retrieve user information
        $userSql = "SELECT * FROM users_tbl WHERE UserID = '$user_id'";
        $userResult = $conn->query($userSql);
        $userRow = $userResult->fetch_assoc();

        // Retrieve clearance information
        $clearanceQuery = "SELECT * FROM clearances_tbl WHERE ClearanceID = '$clearanceID'";
        $clearanceResult = $conn->query($clearanceQuery);
        $clearanceData = $clearanceResult->fetch_assoc();

        // Insert data into approved_requests_tbl
        $insertQuery = "INSERT INTO approved_requests_tbl (ClearanceID, StudentID, UserID, Roles, ApprovedDate, DepartmentID, YearLevel, ClearanceType, ClearanceReason, RequestedDate, Priority, SupportingDocuments, Status) " .
            "VALUES ('$clearanceID', '$studentID', '{$userRow['UserID']}', '{$userRow['Roles']}', '{$clearanceData['RequestedDate']}', '{$clearanceData['DepartmentID']}', '{$clearanceData['YearLevel']}', '{$clearanceData['ClearanceType']}', '{$clearanceData['ClearanceReason']}', '{$clearanceData['RequestedDate']}', '{$clearanceData['Priority']}', '{$clearanceData['SupportingDocuments']}', 'Accepted')";

        if ($conn->query($insertQuery) === true) {
            // Redirect to a success page or handle accordingly
            $_SESSION['success'] = "Request accepted successfully.";
            header("Location: my_approved_request.php");
            exit;
        } else {
            // Handle database insertion error
            $_SESSION['error'] = "Error inserting data into approved_requests_tbl: " . $conn->error;
            header("Location: my_approved_request.php");
            exit;
        }
    } else {
        // Display message indicating active borrowings
        $_SESSION['error'] = "Cannot accept request. There are active borrowings for the student.";
        header("Location: view_student_status.php?student_id=" . $studentID . "&clearance_id=" . $clearanceID);
        exit;
    }
}if (isset($_POST["reject_request"])) {
    // Retrieve form data
    $studentID = $_POST['student_id'];

    // Process rejection request as per your requirements
    // For example, you can update the status of the clearance request to "Rejected" in the database

    // Redirect to a success page or handle accordingly
    $_SESSION['success'] = "Request rejected successfully.";
    header("Location: my_approved_request.php");
    exit;

} else {
    // Handle other cases or show the form
    $_SESSION['error'] = "Invalid request.";
    header("Location: my_approved_request.php");
    exit;
}

// Close the database connection
$conn->close();
