<?php
session_start();

require 'index.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}
// Retrieve the logged-in user's username from the session
$user_id = $_SESSION['user_id'];

// Retrieve the student ID from the query parameter
$studentID = $_GET["student_id"];

// Retrieve the student ID from the query parameter
$clearance_id = $_GET["clearance_id"];

// Query the database to get student information
include '../../includes/db_connection.php';
$sql = "SELECT * FROM students_tbl WHERE StudentID = '$studentID'";
$result = $conn->query($sql);

$ClearanceIDsql = "SELECT * FROM clearances_tbl WHERE ClearanceID = '$clearance_id'";
$SQLresult = $conn->query($ClearanceIDsql);
$slqlearanceID = $SQLresult->fetch_assoc();

$hasBorrowings = false;



// Check if student exists
if ($result->num_rows > 0) {
    // Fetch student data
    $student = $result->fetch_assoc();
    ?>
<div class="content">
<div class="container">
<form action="process_approval.php" method="post">
    <h1>Student Information</h1>
    <h2>Pending Clearance Requests</h2>
    <div class="alert alert-success forms" role="alert">
        <ul class="messages">
            <li>
                <?php
                if (isset($_SESSION['success'])) {
                    echo $_SESSION["success"];
                    unset($_SESSION["success"]);
                }else if(isset($_SESSION['error'])) {
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);

                }
                ?>
            </li>
        </ul>
    </div>
        <div class = "containers p-4">
        <input type="hidden" name="updater_id" value="<?php echo $user_id; ?>" readonly>
          
        <div class="addNewUserForm row">
            <div class="items">
            <div class="mb-2">
                    <label for="exampleInputPhoneNumber" class="form-label">StudentID</label>
                    <input type="text" class="form-control" name="student_id" value="<?php echo $student['StudentID']; ?>" readonly>
                    <div id="program" class="form-text">We'll never share your program with anyone else.</div>
            </div>

            <div class="mb-2">
                    <label for="exampleInputPhoneNumber" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="user_id" value="<?php echo $student['UserID']; ?>" readonly>
                    <div id="program" class="form-text">We'll never share your program with anyone else.</div>
            </div>
            </div>

            <div class="items">
            <div class="mb-2">
                    <label for="exampleInputPhoneNumber" class="form-label">department_id</label>
                    <input type="text" class="form-control" name="department_id" value="<?php echo $student['DepartmentID']; ?>" readonly>
                    <div id="program" class="form-text">We'll never share your program with anyone else.</div>
            </div>
            <div class="mb-2">
                    <label for="exampleInputPhoneNumber" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="program" value="<?php echo $student['Program']; ?>" readonly>
                    <div id="program" class="form-text">We'll never share your program with anyone else.</div>
            </div>
            </div>

            <div class="items">

            <div class="mb-2">
                    <label for="exampleInputPhoneNumber" class="form-label">year_level</label>
                    <input type="text" class="form-control" name="year_level" value="<?php echo $student['YearLevel']; ?>" readonly>
                    <div id="program" class="form-text">We'll never share your program with anyone else.</div>
            </div>
            <div class="mb-2">
                    <label for="exampleInputPhoneNumber" class="form-label">GPA</label>
                    <input type="text" class="form-control" name="gpa" value="<?php echo $student['GPA']; ?>" readonly>
                    <div id="program" class="form-text">We'll never share your program with anyone else.</div>
            </div>
	        </div>

            
        </div>
        </div>


    <h2>Borrowing Information</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Borrowing ID</th>
                <th>Property ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Purpose</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Query to get borrowing information for the student
                $borrowings_sql = "SELECT * FROM Borrowings_tbl WHERE StudentID = '$studentID'";
				$borrowings_result = $conn->query($borrowings_sql);
				if ($borrowings_result->num_rows > 0) {
                    $hasBorrowings = true;
					while ($borrowing = $borrowings_result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $borrowing["BorrowingID"] . "</td>";
						echo "<td>" . $borrowing["PropertyID"] . "</td>";
                       
						echo "<td>" . $borrowing["StartDate"] . "</td>";
						echo "<td>" . $borrowing["EndDate"] . "</td>";
						echo "<td>" . $borrowing["Purpose"] . "</td>";
						echo "<td>" . $borrowing["Status"] . "</td>";
						echo "</tr>";
					}
                    echo "<tr><td colspan='6'>Borrowing information is found.</td></tr>";
                  
                    } else {
                        $hasBorrowings = false;
                    // No borrowing information found
                    echo "<tr><td colspan='6'>No borrowing information found.</td></tr>"; 
				 
				 } ?>
			
        </tbody>
    </table>
    <?php if ($hasBorrowings == true) { ?>

        <div class="action-buttons">
            <!-- Add buttons for accepting or rejecting the clearance request --> 
            <input type="hidden" name="student_id" value="<?php echo $studentID; ?>">
            <input type="hidden" name="clearance_id" value="<?php echo $slqlearanceID["ClearanceID"]; ?>">
            <button type="submit" name="reject_request" class="btn btn-danger">Reject Request</button>
        </div>

        <?php } else { ?>

        <!-- Add buttons for accepting or rejecting the clearance request -->
        <div class="action-buttons">
            <input type="hidden" name="student_id" value="<?php echo $studentID; ?>">
            <input type="hidden" name="clearance_id" value="<?php echo $slqlearanceID["ClearanceID"]; ?>">
            <button type="submit" name="accept_request" class="btn btn-success">Accept Request</button>
        </div>

        <?php } ?>


</form>
</div>
</div>


<?php
} else {
    // Student not found
    echo "<p>Student not found.</p>";
}

// Close the database connection
$conn->close();
?>
