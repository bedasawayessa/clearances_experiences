<?php
session_start();
require 'index.php';

// Function to check if a username or email already exists
function isUsernameOrEmailExists($conn, $username, $email, $user_id) {
    $sql = "SELECT UserID FROM users_tbl WHERE (UserName = '$username' OR Email = '$email') AND UserID != $user_id";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}
?>;
<div class="container p-4" style="display: block; padding: 20px;">
    <?php
    if (isset($_POST['Update'])) {
        // Get the user ID from the form
        $user_id = $_POST['id'];

        // Retrieve form data
        $username1 = $_POST['usernames'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $passwords = $_POST['password1'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        // Hash the password for security
        $hashedPassword = password_hash($passwords, PASSWORD_DEFAULT);


        // Connect to the database
        include '../../includes/db_connection.php';

        // Update user query
        $sql = "UPDATE users_tbl 
                SET UserName = '$username1', 
                    FirstName = '$firstname', 
                    LastName = '$lastname',
                    PhoneNumber = '$phonenumber',
                    Passwords = '$hashedPassword',
                    Email  = '$email',                        
                    Roles = '$role'
                WHERE UserID = $user_id";

        // Check if the updated username or email already exists
        if (isUsernameOrEmailExists($conn, $username1, $email, $user_id)) {
            echo "<p>Error: The updated username or email already exists.</p>";
            echo "<a href='edit_user.php?id=$user_id'>Back to Edit User</a>";
            exit; // Stop further execution
        }

        // Execute the query
        if ($conn->query($sql)) {
            // User updated successfully
            echo "<p>User updated successfully.</p>";
            echo "<a href='user_list.php'>Back to User List</a>";
            $_SESSION["success"] = "User updated successfully";
            header("Location: user_list.php");
        } else {
            // Error updating user
            echo "<p>Error updating user: " . $conn->error . "</p>";
            echo "<a href='edit_user.php?id=$user_id'>Back to Edit User</a>";
            $_SESSION["success"] = "No User updated successfully";
        }
    }
    ?>

</div>

