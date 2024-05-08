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

// Fetch the clearance request based on the provided ClearanceID
$sql = "SELECT * FROM clearances_tbl WHERE ClearanceID = '$clearance_id'";
$result = $conn->query($sql);

// Check if the clearance request exists
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Display the form to edit the clearance request
    ?>
    <div class="jumbotron">
        <div class="content">
            <div class="container p-4" style="box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
                <h1>Edit Clearance Request</h1>
                <form action="update_request.php" method="post">
				<div class="addNewUserForm row">
                        <div class="items">

                    <input type="hidden" name="clearance_id" value="<?php echo $clearance_id; ?>">
                    <div class="mb-3">
                        <label for="clearanceType" class="form-label">Clearance Type:</label>
                        <input type="text" class="form-control" name="clearanceType" value="<?php echo $row['ClearanceType']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for Request:</label>
                        <textarea class="form-control" id="reason" rows="4" name="clearanceReason"><?php echo $row['ClearanceReason']; ?></textarea>
                    </div>
					</div>
					<div class="items">

                    <div class="mb-3">
                        <label for="requestedDate" class="form-label">Requested Date:</label>
                        <input type="text" class="form-control" name="requestedDate" value="<?php echo $row['RequestedDate']; ?>">
                    </div>

					
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority:</label>
                        <select class="form-select" name="priority">
                            <option value="High" <?php if ($row['Priority'] == 'High') {
                                echo 'selected';
                            } ?>>High</option>
                            <option value="Medium" <?php if ($row['Priority'] == 'Medium') {
                                echo 'selected';
                            } ?>>Medium</option>
                            <option value="Low" <?php if ($row['Priority'] == 'Low') {
                                echo 'selected';
                            } ?>>Low</option>
                        </select>
                    </div>
					</div>
					<div class="items">
                    <div class="mb-3">
                        <label for="supportingDocuments" class="form-label">Supporting Documents:</label>
                        <input type="file" class="form-control" name="supportingDocuments" value="<?php echo $row['SupportingDocuments']; ?>">
                    </div>
                    <button type="submit" name = "updated" class="btn btn-primary">Update Request</button>

					</div>
					</div>
				</form>
            </div>
        </div>
    </div>
    <?php
} else {
    // If clearance request doesn't exist, redirect to the dashboard page
    header("Location: dashboard.php");
    exit;
}

// Close the database connection
$conn->close();
?>
