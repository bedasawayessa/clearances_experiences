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
?>

<div class="jumbotron">
    <div class="content"  style="align-content: space-between;
         justify-content: flex-end; ">
        <div class="container" 
             style="align-content: center;
             justify-content: flex-end;
             box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
            <h1>Admin Dashboard</h1>
            <div id="user_list">
                <h2>Submitted Clearance Request List</h2>
                <div class="alert alert-success forms" role="alert">
                    <ul class = "messages">
                        <li>
                            <?php
                            if (isset(($_SESSION['success']))) {
                                echo $_SESSION["success"];
                                //nset($_SESSION["success"]);
                            }
?>
                        </li>
                    </ul>

                </div>
                <table class="table table-bordered" border='1'>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>ClearanceID</th>
                            
                            <th>Student ID:</th>
                            <th>Department ID:</th>
                            <th>Class Year</th>
                            <th>Clearance Type:</th>
                            <th>Reason for Request</th>
                            <th>Requested Date</th>
                            <th>Priority</th>
                            <th>Supporting Documents</th> 
                            <th>Status</th>                           
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        include '../../includes/db_connection.php';
                        $sql = "SELECT * FROM clearances_tbl";
                        $result = $conn->query($sql);
                        // Loop through each user and display their information
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["UserID"] . "</td>";
                            echo "<td>" . $row["ClearanceID"] . "</td>";
                           
                            echo "<td>" . $row["StudentID"] . "</td>";
                            echo "<td>" . $row["DepartmentID"] . "</td>";
                            echo "<td>" . $row["YearLevel"] . "</td>";
                            echo "<td>" . $row["ClearanceType"] . "</td>";
                            echo "<td>" . $row["ClearanceReason"] . "</td>";
                            echo "<td>" . $row["RequestedDate"] . "</td>";
                            echo "<td>" . $row["Priority"] . "</td>";
                            echo "<td>" . $row["SupportingDocuments"] . "</td>";
                            echo "<td>" . $row["Status"] . "</td>";
                            echo "<td><a href='view_student_status.php?student_id=" . $row["StudentID"] . "&clearance_id=" . $row["ClearanceID"] . "'> Check Student</a> | <a href='delete_request.php?id=" . $row["ClearanceID"] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>