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

// Connect to the database
include '../../includes/db_connection.php';

// Query to fetch user details based on user_id
$user_sql = "SELECT * FROM users_tbl WHERE UserID = '$user_id'";
$user_result = $conn->query($user_sql);

// Check if user was found
if ($user_result->num_rows > 0) {
    // Fetch user data
    $user_row = $user_result->fetch_assoc();
    // Now $user_row contains all the fields of the user with the given user_id
} else {
    // User not found
    echo "User not found.";
}

// Query to fetch departments
$department_sql = "SELECT DepartmentID, DepartmentName FROM departments_tbl";
$department_result = $conn->query($department_sql);

// Check if departments were found
if ($department_result->num_rows > 0) {
    // Fetch departments
    $departments = $department_result->fetch_all(MYSQLI_ASSOC);
} else {
    // No departments found
    $departments = array(); // Empty array if no departments found
}

require 'index.php';
?>

<div class="content">
    <div class="container p-4" style="display:block; box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
        <h1>My Admin Dashboard</h1>
        <div id="user_list">
            <h1>Add New Student</h1>
            <form action="add_student_process.php" method="post">
            <div class="addNewUserForm row">
                        <div class="items">
                <!-- You may want to hide the UserID field as it should be retrieved from session -->
                <input type="hidden" id="userID" name="userID" value="<?php echo $user_id; ?>">
                
                <!-- You may want to hide the Roles field as it should be retrieved from session -->
                <input type="hidden" id="roles" name="roles" value="<?php echo $user_row['Roles']; ?>">

                <div class="mb-2">
                    <label for="exampleRoleSelect" class="form-label">Department</label>
                    <select class="form-select" id="departmentID" name="departmentID" aria-describedby="roleHelp" required>
                        <?php
                        // Populate the dropdown with departments fetched from the database
                            foreach ($departments as $department) {
                                echo "<option value='{$department['DepartmentID']}'>{$department['DepartmentName']}</option>";
                            }
                        ?>
                   </select>
                   <div id="roleHelp" class="form-text">Select your department from the list.</div>
                
                </div>

                <div class="mb-2">
                    <label for="exampleInputPhoneNumber" class="form-label">Program</label>
                    <input type="text" class="form-control" id="program" name="program" aria-describedby="phonenumberHelp" required>
                    <div id="program" class="form-text">We'll never share your pprogram with anyone else.</div>
                </div>
                
                </div>
                <div class="items">

                <div class="mb-2">
                    <label for="Year Level" class="form-label">Year Level</label>
                    <input type="text" class="form-control" id="program" name="yearLevel" aria-describedby="yearLevel" required>
                    <div id="Year Level" class="form-text">We'll never share your Year Level with anyone else.</div>
                </div>

                <div class="mb-2">
                    <label for="Year Level" class="form-label">GPA</label>
                    <input type="text" class="form-control" id="gpa" name="gpa" aria-describedby="gpa" required>
                    <div id="Year Level" class="form-text">We'll never share your gpa with anyone else.</div>
                </div>

                <div class="mb-2">
                   <button type="submit" name="registerStudent" class="btn btn-primary">Update</button>
                     
              </div>

               
          </div>    
            </div>
            </form>
        </div>
    </div>
</div>
<?php

// Close the database connection
$conn->close();
?>
