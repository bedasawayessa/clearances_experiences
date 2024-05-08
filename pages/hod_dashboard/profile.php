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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        include '../../includes/db_connection.php';
                        $sql = "SELECT * FROM users_tbl WHERE UserID = '$user_id'";
                        $result = $conn->query($sql);
// Loop through each user and display their information
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["UserID"] . "</td>";
                            echo "<td>" . $row["UserName"] . "</td>";
                            echo "<td>" . $row["FirstName"] . "</td>";
                            echo "<td>" . $row["LastName"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["PhoneNumber"] . "</td>";
                            echo "<td>" . $row["Roles"] . "</td>";
                            echo "<td><a href='edit_user.php?id=" . $row["UserID"] . "'>Edit</a> | <a href='delete_user.php?id=" . $row["UserID"] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>