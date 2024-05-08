
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Registration</title>
        <link rel="stylesheet" href="css/bootstrap.css"> <!-- Link to external CSS file -->
        <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Link to external CSS file -->
        <link rel="stylesheet" href="css/style.css"> <!-- Link to external CSS file -->

    </head>
    <body >
        <header>
            <h3>
                Patient Documentations System
            </h3>
        </header>

        <div class="container" style="display: flex; 
             align-content: center; 
             align-items: center;
             padding: 20px;
             justify-content: center;
             border: 1px solid var(--main-blue);
             height: 100vh;">
            <div class="container" style="
                 padding: 20px;
                 margin: 5px;
                 box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);
                 ">
                <h2 >User Registration</h2>
                <p>
                    Server: 127.0.0.1 via TCP/IP
                    Server type: MariaDB
                    Server connection: SSL is not being used Documentation
                    Server version: 10.4.28-MariaDB - mariadb.org binary distribution
                    Protocol version: 10
                    User: root@localhost
                    Server charset: UTF-8 Unicode (utf8mb4)
                </p>
            </div>
            <div class="container" style="
                 padding: 20px;
                 margin: 5px;
                 margin-top: auto;
                 box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);

                 ">
                <h2>User Registration</h2>

                <div class="container">
                    <h1>Admin Dashboard</h1>
                    <div id="user_list">
                        <h2>Add User User</h2>
                        <form>
                            <div class="mb-2">
                                <label for="exampleInputUsername" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp">
                                <div id="UsernameHelp" class="form-text">We'll never share your Username with anyone else.</div>
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputFirstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="exampleInputFirstName" aria-describedby="firstNameHelp">
                                <div id="firstNameHelp" class="form-text">We'll never share your first name with anyone else.</div>
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="lastNameHelp">
                                <div id="lastNameHelp" class="form-text">We'll never share your last name with anyone else.</div>
                            </div>

                            <div class="mb-2">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputPhoneNumber" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="exampleInputPhoneNumber" aria-describedby="phoneNumberHelp">
                                <div id="phoneNumberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                            </div>

                            <div class="mb-2">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">                    
                                <div id="phoneNumberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                            </div>

                            <div class="mb-2">
                                <label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputConfirmPassword1">                   
                                <div id="phoneNumberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                            </div>

                            <div class="mb-2">
                                <label for="exampleRoleSelect" class="form-label">Role</label>
                                <select class="form-select" id="exampleRoleSelect" aria-describedby="roleHelp">
                                    <option selected>Select Role</option>
                                    <option value="admin">Administrator</option> 
                                    <option value="student">Student</option>
                                    <option value="staff">Staff</option>
                                    <option value="officers">Officers</option>
                                    <option value="librarian">Librarian</option>
                                    <option value="instructor">Instructor</option>
                                    <option value="student">Student</option>
                                    <option value="hrm">HRM</option>
                                    <option value="user">User</option>

                                </select>

                                <div id="roleHelp" class="form-text">Select your role from the list.</div>
                            </div>

                            <div class="mb-2 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Sign Up</button>

                            <!-- Option for existing users to login -->
                            <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
                        </form>

                    </div>
                </div>

                <form action="../scripts/register_process.php" method="POST">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br><br>

                    <label for="Role">Roles:</label><br>
                    <select id="role" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="instructor">Instructor</option>
                        <option value="student">Student</option>
                        <option value="hrm">HRM</option>
                        <option value="user">User</option>
                        <!-- Add more roles as needed -->
                    </select><br><br> 

                    <input type="submit" name="register" value="Register">
                    <p> if have an accout <a href="../pages/login.php"> login</a> </p>
                </form>
            </div>
        </div>
    </body>
</html>