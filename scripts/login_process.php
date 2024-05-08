<?php

// session_start();
include '../includes/db_connection.php';

if (isset($_POST['login'])) {

    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];

    $sql = "SELECT * FROM users_tbl WHERE UserName = '$username1'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        echo 'Password: ' . $user['Passwords'] . "\n";
        echo 'username: ' . $user['UserName'] . "\n";

        //        $row = $result->fetch_assoc();
        //        // Verify password
        if (password_verify($password1, $user['Passwords'])) {
            //        if ($password1 == $user['Passwords']) {
            echo "Login successful";
            // Start the session
            session_start();

            // Set session variables if needed
            // Set session variables
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['username'] = $user['UserName'];
            $_SESSION['role'] = $user['Roles']; // Assuming 'role' is a column in your 'users' table
            // Redirect based on role
            if ($user['Roles'] == 'admin') {
                $_SESSION['user_id'] = $row['UserID'];
                $_SESSION['username'] = $user['UserName'];
                header("Location: ../pages/admin_dashboard/home.php");
            } elseif ($user['Roles'] == 'instructor') {
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['username'] = $user['UserName'];
                header("Location: ../pages/hod_dashboard/home.php");
            } elseif ($user['Roles'] == 'student') {
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['username'] = $user['UserName'];
                header("Location: ../pages/student_dashboard/home.php");
            } elseif ($user['Roles'] == 'user') {
                header("Location: ../pages/success.php");
            } else {
                // Default redirect or error handling
                header("Location: ../pages/default_dashboard.php");
            }
            exit; // Make sure to exit after redirection
        } else {
            echo "Invalid username or password \n";
            echo "Entered Password: " . $password . " \n";
            echo "Password from Database: " . $user['Passwords'] . " \n";
        }
    } else {
        echo "User not found";
    }

    $conn->close();
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: ../pages/login.php");
    exit;
}
