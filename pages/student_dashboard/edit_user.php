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

    <div class="content" >
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

                            <div class="mb-2">
                                <label for="exampleInputFirstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="exampleInputFirstName" name="firstname" value="<?php echo $row['FirstName']; ?>" aria-describedby="firstnameHelp" required>
                                <div id="firstnameHelp" class="form-text">We'll never share your first name with anyone else.</div>
                            </div>

                            <div class="mb-2">
                                <label for="exampleInputLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputLastName" name="lastname" value="<?php echo $row['LastName']; ?>" aria-describedby="lastnameHelp" required>
                                <div id="lastnameHelp" class="form-text">We'll never share your last name with anyone else.</div>
                            </div>
                        </div>
                        <div class="items">

                            <div class="mb-2">
                                <label for="exampleInputEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?php echo $row['Email']; ?>" aria-describedby="emailHelp" required>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="mb-2">
                                <label for="exampleInputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword" name="password1" value="<?php echo $row['Passwords']; ?>" aria-describedby="passwordHelp" required>
                                <div id="PasswordHelp" class="form-text">We'll never share your password with anyone else.</div>
                            </div>

                            <div class="mb-2">
                                <label for="exampleInputPhoneNumber" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="exampleInputPhoneNumber" name="phonenumber" value="<?php echo $row['PhoneNumber']; ?>" aria-describedby="phonenumberHelp" required>
                                <div id="phonenumberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                            </div>
                        </div>

                        <div class="items">

                        <div class="mb-2">
                            <label for="exampleRoleSelect"  class="form-label">Roles:</label>
                            <input type="text" class="form-control" id="approval_id" name="role" value="<?php echo $row["Roles"]; ?>" required readonly>
							<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
						</div>

                          

                            <button type="submit" name="Update" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
} else {
    // User not found
    echo "<p>User not found.</p>";
}

// Close the database connection
$conn->close();
?>
