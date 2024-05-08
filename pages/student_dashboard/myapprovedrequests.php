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

?>

<div class="jumbotron">
    <div class="content" style="align-content: space-between; justify-content: flex-end; ">
        <div class="container" style="align-content: center; justify-content: flex-end; box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
            <h1>HOD Dashboard</h1>
            <div id="user_list">
                <h2>Pending Clearance Requests</h2>
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
                <table class="table table-bordered" border='1'>
                    <thead>
                        <tr>
                            <th>Approval ID</th>
                            <th>Clearance ID</th>
                            <th>Student ID</th>
                            <th>Department ID</th>
                            <th>Clearance Reason</th>
                            <th>User ID</th>
                            <th>Roles</th>
                            <th>Approved Date</th>
                            <th>Status</th>
                            <!-- Add more columns as needed -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../includes/db_connection.php';

                        // Query to retrieve pending clearance requests
                        $sql = "SELECT * FROM approved_requests_tbl WHERE UserID ='$user_id'";
                        $result = $conn->query($sql);

                        // Check if there are approved requests
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["ApprovalID"] . "</td>";
                                echo "<td>" . $row["ClearanceID"] . "</td>";
                                echo "<td>" . $row["StudentID"] . "</td>";
                                echo "<td>" . $row["DepartmentID"] . "</td>";
                                echo "<td>" . $row["ClearanceReason"] . "</td>";
                                echo "<td>" . $row["UserID"] . "</td>";
                                echo "<td>" . $row["Roles"] . "</td>";
                                echo "<td>" . $row["ApprovedDate"] . "</td>";
                                echo "<td>" . $row["Status"] . "</td>";
                                // Add more columns as needed
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No approved requests found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
