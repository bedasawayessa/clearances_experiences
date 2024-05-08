<?php

include '../../includes/db_connection.php';

if (isset($_POST['register'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $role = $_POST['role'];

    // Check if any of the required fields are empty
    if (empty($username) || empty($firstname) || empty($lastname) || empty($phonenumber) || empty($password) || empty($confirmpassword) || empty($role)) {
        echo "All fields are required.";
        exit;
    }

    // Check if password matches the confirm password
    if ($password !== $confirmpassword) {
        echo "Password and confirm password do not match.";
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // User with the same username or email already exists
        echo "Username or email already exists. Please choose a different one.";
        exit;
    } else {
        // Insert user data into the database using query() function
        $sql_insert = "INSERT INTO users_tbl (UserName, FirstName, LastName, PhoneNumber, Email, Passwords, Roles) VALUES ('$username', '$firstname', '$lastname', '$phonenumber', '$email', '$hashedPassword', '$role')";

        if ($conn->query($sql_insert) === true) {
            echo "User registered successfully";
            // Redirect to a confirmation page after successful registration
            header("Location: user_list.php");
            exit;
        } else {
            echo "Error registering user: " . $conn->error;

            // Log detailed error for debugging
            error_log("Error registering user: " . $conn->error);
            // Display a generic error message to users
            echo "An error occurred while registering. Please try again later.";
        }
    }

    $conn->close();
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: register.php");
    exit;
}
