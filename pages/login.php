
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
            <h1>
                Student Clearance Management
            </h1>
        </header>

        <div class="container login-div">
            <div class="container login-info">
                <h2>User Login Page</h2>
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
            <div class="container login-form">
                <div class="container">
                    <div id="user_list">
                        <h2>Login Form</h2>
                        <form action="../scripts/login_process.php" method="POST">

                            <div class="mb-2">
                                <label for="exampleInputUsername" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername" name = "username1" aria-describedby="usernameHelp" required>
                                <div id="UsernameHelp" class="form-text">We'll never share your Username with anyone else.</div>
                            </div>

                            <div class="mb-2">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name = "password1" id="exampleInputPassword1" required>                    
                                <div id="phoneNumberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                            </div>

                            <!-- Error message placeholder -->
                            <?php if (isset($_GET['error'])): ?>
                                <p style="color: red;"><?php echo $_GET['error']; ?></p>
                            <?php endif; ?>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
