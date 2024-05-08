<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Connect to the database
include '../../includes/db_connection.php';

// Check if the form is submitted
if (isset($_POST['registerStudent'])) {
    // Retrieve form data
    $userID = $_POST['userID'];
    $departmentID = $_POST['departmentID'];
    $program = $_POST['program'];
    $yearLevel = $_POST['yearLevel'];
    $gpa = $_POST['gpa'];

    // Check if the user is already registered as a student
    $check_sql = "SELECT * FROM students_tbl WHERE UserID = '$userID'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        // User is already registered as a student
        echo "You are already registered as a student.";
		header("Location: my_student_info.php");
		
    } else {
        // Insert the student into students_tbl
        $sql = "INSERT INTO students_tbl (UserID, DepartmentID, Program, YearLevel, GPA) 
                VALUES ('$userID', '$departmentID', '$program', '$yearLevel', '$gpa')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            // Insertion successful
            echo "New student added successfully.";
			header("Location: my_student_info.php");
        } else {
            // Insertion failed
            echo "Error: Unable to add the student. " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
