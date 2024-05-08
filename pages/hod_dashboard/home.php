
<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}
require 'index.php'; 
?>

<div class="content" >
    <div class="container" style="box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
        <h1>Admin Dashboard</h1>
        <div id="home">
            <h1>Welcome, <?php echo $_SESSION['username']; ?>! You have successfully logged in.</h1>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>