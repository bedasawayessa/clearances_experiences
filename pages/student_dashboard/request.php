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
                <h2>User List</h2>
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
                            <th>User Name</th>
                            <th>Student ID</th>
                            <th>DepartmentID</th>

                            <th>Email</th>
                            <th>Program	</th>
                            <th>YearLevel</th>
                            <th>GPA</th>
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        include '../../includes/db_connection.php';

                        $sql = "SELECT users_tbl.UserID, users_tbl.UserName, users_tbl.Email, " .
                                "students_tbl.StudentID, students_tbl.DepartmentID, " .
                                "students_tbl.Program, students_tbl.YearLevel, " .
                                "students_tbl.GPA, departments_tbl.DepartmentName " .
                                "FROM users_tbl, students_tbl, departments_tbl " .
                                "WHERE students_tbl.UserID = users_tbl.UserID " .
                                "AND students_tbl.DepartmentID = departments_tbl.DepartmentID " .
                                "AND users_tbl.UserID = '$user_id'";

                        //$sql = "SELECT * FROM users_tbl WHERE UserID = '$user_id'";
                        $result = $conn->query($sql);
// Loop through each user and display their information
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["UserID"] . "</td>";
                            echo "<td>" . $row["UserName"] . "</td>";
                            echo "<td>" . $row["StudentID"] . "</td>";
                            echo "<td>" . $row["DepartmentName"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Program"] . "</td>";
                            echo "<td>" . $row["YearLevel"] . "</td>";
                            echo "<td>" . $row["GPA"] . "</td>";
                            echo "<td><a href='requesting.php?id=" . $row["UserID"] . "'>Request</a> | <a href='delete_user.php?id=" . $row["UserID"] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

