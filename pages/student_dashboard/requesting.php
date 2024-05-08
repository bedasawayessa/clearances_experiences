<?php
session_start();

// Connect to the database
include '../../includes/db_connection.php';

require 'index.php';

// Get the user ID from the query parameter
$user_id = $_GET["id"];


$sql = "SELECT users_tbl.UserID, users_tbl.UserName, users_tbl.Email, " .
        "students_tbl.StudentID, students_tbl.DepartmentID, " .
        "students_tbl.Program, students_tbl.YearLevel, " .
        "students_tbl.GPA, departments_tbl.DepartmentName " .
        "FROM users_tbl, students_tbl, departments_tbl " .
        "WHERE students_tbl.UserID = users_tbl.UserID " .
        "AND students_tbl.DepartmentID = departments_tbl.DepartmentID " .
        "AND users_tbl.UserID = '$user_id'";

$result = $conn->query($sql);

// Check if user was found
if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();
    ?>
    <div class="content">
        <div class="container p-4" style="box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">

            <div id="user_list">
                <h1>Clearance Requesting Form</h1>
                <form action="submit_request.php" method="post">

                    <div class="addNewUserForm row">
                        <div class="items col-md-6">
                        <input type="hidden" name="UserID" value="<?php echo $row['UserID']; ?>">
                            <div class="mb-3">
                                <label for="studentID" class="form-label">UserName:</label>
                                <input type="text" class="form-control" id="UserName" name="UserName"  value="<?php echo $row['UserName']; ?>" placeholder="Enter Student ID">
                            </div>
                            <div class="mb-3">
                                <label for="studentID" class="form-label">Student ID:</label>
                                <input type="text" class="form-control" id="studentID" name="StudentID"  value="<?php echo $row['StudentID']; ?>" placeholder="Enter Student ID">
                            </div>
                            <div class="mb-3">
                                <label for="departmentID" class="form-label">Department ID:</label>
                                <input type="text" class="form-control" id="departmentID" name="DepartmentID"  value="<?php echo $row['DepartmentID']; ?>" placeholder="Enter Department ID">
                            </div>
                            <div class="mb-3">
                                <label for="YearLevel" class="form-label">Class Year:</label>
                                <input type="text" class="form-control" id="YearLevelID" name="YearLevel"  value="<?php echo $row['YearLevel']; ?>" placeholder="Enter Department ID">
                            </div>
                        </div>
                        <div class="items col-md-6">
                            <div class="mb-3">
                                <label for="clearanceType" class="form-label">Clearance Type:</label>
                                <select class="form-select" name="ClearanceType" id="clearanceType">
                                    <option selected>Choose...</option>
                                    <option>Semester</option>
                                    <option>Withdrawal</option>
                                    <option>Dismissal</option>
                                    <option>Discipline</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="reason" class="form-label">Reason for Request:</label>
                                <textarea class="form-control" id="reason" rows="4" name="ClearanceResaon" placeholder="Enter Reason"></textarea>
                            </div>
                        </div>
                        <div class="items col-md-6">
                            <div class="mb-3">
                                <label for="deadline" class="form-label">Requested Date:</label>
                                <input type="date" class="form-control" id="RequestedDate" name ="RequestedDate" placeholder="yyyy/mm/dd">
                            </div>
                            <div class="mb-3">
                                <label for="priority" class="form-label">Priority:</label>
                                <select class="form-select" name ="Priority" id="priority">
                                    <option selected>Choose...</option>
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="supportingDocuments" class="form-label">Supporting Documents:</label>
                                <input type="file" class="form-control" name ="SupportingDocuments" id="supportingDocuments">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name ="SubmitRequest" class="btn btn-primary">Submit Request</button>
                            </div>

                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php
} else {
    // User not found
    echo "<p>User not found.</p>";
}

// Close the database connection
$conn->close();
?>
