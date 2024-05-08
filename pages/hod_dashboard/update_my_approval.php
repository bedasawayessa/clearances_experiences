<?php
session_start();

require 'index.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Retrieve the logged-in user's user ID from the session
$user_id = $_SESSION['user_id'];

// Check if the Approval ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $approval_id = $_GET['id'];

    // Include database connection
    include '../../includes/db_connection.php';

    // Query to retrieve the details of the approval with the provided ID
    $sql = "SELECT * FROM approved_requests_tbl WHERE ApprovalID = '$approval_id'";
    $result = $conn->query($sql);

    // Check if the approval record exists
    if ($result->num_rows > 0) {
        // Fetch the approval record
        $approval = $result->fetch_assoc();
        ?>
           <div class="content" >
        <div class="container p-4" style="box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
            <h1>My Admin Dashboard</h1>
        
            <div id="user_list">
				 <h1>Update Approval</h1>
                    <form action="process_update_approval.php" method="post">
					<div class="addNewUserForm row">
                        <div class="items">

						<div class="mb-2">
						    <label for="approval_id">Approval ID:</label>
                            <input type="text" class="form-control" id="approval_id" name="approval_id" value="<?php echo $approval['ApprovalID']; ?>" readonly>
                            <div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
                        </div>

						<div class="mb-2">
						    <label for="approval_id">UserID:</label>
                            <input type="text" class="form-control" id="approval_id" name="UserID" value="<?php echo $approval['UserID']; ?>" readonly>
                            <div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
                        </div>

                        

                        <div class="mb-2">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Accepted" <?php if ($approval['Status'] == 'Accepted') {
                                    echo 'selected';
                                } ?>>Accepted</option>
                                <option value="Rejected" <?php if ($approval['Status'] == 'Rejected') {
                                    echo 'selected';
                                } ?>>Rejected</option>
                            </select>
							<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
                  
                        </div>
						</div>

						<div class="items">

						<div class="mb-2">
                            <label for="approval_id">Clearance ID:</label>
                            <input type="text" class="form-control" id="approval_id" name="ClearanceID" value="<?php echo $approval['ClearanceID']; ?>" readonly>
							<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
                  
						</div>

						<div class="mb-2">
                            <label for="approval_id">Student ID:</label>
                            <input type="text" class="form-control" id="approval_id" name="StudentID" value="<?php echo $approval['StudentID']; ?>" readonly>
							<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
						</div>

						<div class="mb-2">
                            <label for="approval_id">Department ID:</label>
                            <input type="text" class="form-control" id="approval_id" name="DepartmentID" value="<?php echo $approval['DepartmentID']; ?>" readonly>
							<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
						</div>


						</div>
						
						<div class="items">

						<div class="mb-2">
                            <label for="approval_id">ClearanceType:</label>
                            <input type="text" class="form-control" id="approval_id" name="ClearanceType" value="<?php echo $approval['ClearanceType']; ?>" readonly>
							<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
						</div>

						<div class="mb-2">
                            <label for="approval_id">ClearanceReason:</label>
                            <input type="text" class="form-control" id="approval_id" name="ClearanceReason" value="<?php echo $approval['ClearanceReason']; ?>" readonly>
							<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
						</div>

						<div class="mb-2">
                            <label for="approval_id">ApprovedDate:</label>
                            <input type="text" class="form-control" id="approval_id" name="ApprovedDate" value="<?php echo $approval['ApprovedDate']; ?>" readonly>
							<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
						</div>




                        <!-- Add more fields to update as needed -->
                        <button type="submit" name = "Update_approval" class="btn btn-primary">Update</button>
						</div>
            			</div>



					</form>
                </div>
            </div>
        </div>
<?php
    } else {
        // No approval found with the provided ID
        echo "<p>Approval not found.</p>";
    }
} else {
    // No Approval ID provided in the URL parameter
    echo "<p>Approval ID not provided.</p>";
}
?>
