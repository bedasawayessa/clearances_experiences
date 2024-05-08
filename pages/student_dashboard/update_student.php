<?php
// Get the user ID from the query parameter
$user_id = $_GET["id"];

// Connect to the database
include '../../includes/db_connection.php';

// Query to fetch user details
$sql = "SELECT * FROM users_tbl WHERE UserID = $user_id";
$result = $conn->query($sql);

// Check if user was found
if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();

    require 'index.php';
    ?>

    <div class="content">
        <div class="container p-4" style="box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
            <h1>My Admin Dashboard</h1>
            <div id="user_list">
                <h1>Edit User</h1>
                <form action="update_user.php" method="post">
                    <div class="addNewUserForm row">
                        <div class="items">
                            <input type="hidden" name="id" value="<?php echo $row['UserID']; ?>">
                            <div class="mb-2">
                                <label for="exampleInputUsername" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername" name="usernames" value="<?php echo $row['UserName']; ?>" aria-describedby="usernameHelp" required>
                                <div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
                            </div>

                            <!-- Rest of the form fields -->

                            <button type="submit" name="Update" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    // Check if the user is a student
    if ($row["role"] == "student") {
        // If the user is a student, insert data into students_tbl
        $student_sql = "INSERT INTO students_tbl (UserID, DepartmentID, Program, YearLevel, GPA) 
                        VALUES ('{$row['UserID']}', '1', 'NA', '2023', '3')";
        if ($conn->query($student_sql) === TRUE) {
            echo "New record added to students_tbl successfully.";
        } else {
            echo "Error: " . $student_sql . "<br>" . $conn->error;
        }
    }

} else {
    // User not found
    echo "<p>User not found.</p>";
}

// Close the database connection
$conn->close();
?>
