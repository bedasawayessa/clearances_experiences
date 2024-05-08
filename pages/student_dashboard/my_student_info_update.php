<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Retrieve the logged-in user's user_id from the session
$user_id = $_SESSION['user_id'];

// Get the user ID from the query parameter
$studentID = $_GET["id"];

// Connect to the database
include '../../includes/db_connection.php';

// Query to fetch student details based on user_id
$student_sql = "SELECT * FROM students_tbl WHERE StudentID = '$studentID'";
$student_result = $conn->query($student_sql);

require 'index.php';
?>

<div class="content">
    <div class="container p-4" style="display:block; box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
        <h1>My Student Profile</h1>
        <div id="student_info">
        <h1>Edit User</h1>  
			<div class="alert alert-success forms" role="alert">
                    <ul class="messages">
                        <li>
                            <?php
                            if (isset($_SESSION['success'])) {
                                echo $_SESSION["success"];
                                unset($_SESSION["success"]);
                            }
                            ?>
                        </li>
                    </ul>
                </div>
                <div id="user_list">
                 
                <form action="#" method="post">
                    <div class="addNewUserForm row">
                        <div class="items">
                            <?php if ($student_result->num_rows > 0) {
                                $student_data = $student_result->fetch_assoc(); ?>
                                <input type="hidden" name="id" value="<?php echo $student_data['UserID']; ?>" readonly>
                                
                                <div class="mb-2">
                                    <label for="exampleInputUsername" class="form-label">Student ID</label>
                                    <input type="text" class="form-control" id="exampleInputUsername" name="StudentID" value="<?php echo $student_data['StudentID']; ?>" aria-describedby="usernameHelp" required readonly>
                                </div>

                                <div class="mb-2">
                                    <label for="exampleInputFirstName" class="form-label">Department ID</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName" name="DepartmentID" value="<?php echo $student_data['DepartmentID']; ?>" aria-describedby="firstnameHelp" required readonly>
                                </div>

                                </div>
                                <div class="items">

                                <div class="mb-2">
                                    <label for="exampleInputLastName" class="form-label">Program</label>
                                    <input type="text" class="form-control" id="exampleInputLastName" name="Program" value="<?php echo $student_data['Program']; ?>" aria-describedby="lastnameHelp" required readonly>
                                </div>
                           
                        
                            
                                <div class="mb-2">
                                    <label for="exampleInputEmail" class="form-label">Year Level</label>
                                    <input type="text" class="form-control" id="exampleInputEmail" name="YearLevel" value="<?php echo $student_data['YearLevel']; ?>" aria-describedby="emailHelp" required readonly>
                                </div>
                                </div>
                                    <div class="items">

                                <div class="mb-2">
                                    <label for="exampleInputPassword" class="form-label">GPA</label>
                                    <input type="text" class="form-control" id="exampleInputPassword" name="GPA" value="<?php echo $student_data['GPA']; ?>" aria-describedby="passwordHelp" required readonly>
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Information</button>
                                   </div>
                                </div>
                        
                            <?php } ?>
                        </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
