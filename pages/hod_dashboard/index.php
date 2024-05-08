
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../css/bootstrap.css"> <!-- Link to external CSS file -->
        <link rel="stylesheet" href="../css/bootstrap.min.css"> <!-- Link to external CSS file -->
        <link rel="stylesheet" href="../css/style.css"> <!-- Link to external CSS file -->

    </head>
    <body >
        <div class ="mycontainer" style="display: flex;">
            <div class="left-content">
                <div id="sidebar">
                    <h3>Admin Dashboard</h3>
                    <ul>
                        <li> <a href="home.php">Home</a> </li>
                        <li>
                            <a href="#" onclick="toggleSubMenu('userManagement')" class="btn btn-primary" >User Management</a>
                            <ul class="sub-menu" id="userManagement" style="padding-top: 10px;">
                                <li><a href="profile.php">My Information</a></li>
                                <li><a href="view_request.php">View Request Clearance</a></li>
                                
                             
                            </ul>
                        </li>

                        <li>
                            <a href="#" onclick="toggleSubMenu('requests')"  class="btn btn-primary">My Request</a>
                            <ul class="sub-menu" id="requests" style="padding-top: 10px;">
                                <li><a href="submitted_request.php">My Submitted Request</a></li>
                              
                            </ul>
                        </li>

                        <li>
                            <a href="#" onclick="toggleSubMenu('approved')" class="btn btn-primary">My Approved</a>
                            <ul class="sub-menu" id="approved" style="padding-top: 10px;"> 
                                <li><a href="my_approved_request.php">My Approved Request</a></li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="#" onclick="toggleSubMenu('reports')" class="btn btn-primary"> Reports</a>
                            <ul class="sub-menu" id="reports" style="padding-top: 10px;">
                                <li><a href="sales_report.html">Sales Report</a></li>
                                <li><a href="user_activity.html">User Activity</a></li>
                            </ul>
                        </li>
 
                        <li>
                            <a href="#" onclick="toggleSubMenu('settings')">Settings</a>
                            <ul class="sub-menu" id="settings" style="padding-top: 10px;">
                                <li><a href="account_settings.html">Account Settings</a></li>
                                <li><a href="notification_settings.html">Notification Settings</a></li>
                            </ul>
                        </li>
                        <li> <a href="logout.php">Logout</a> </li>
                    </ul>
                </div>
            </div>


            <script>
                function toggleSubMenu(subMenuId) {
                    var subMenu = document.getElementById(subMenuId);
                    subMenu.classList.toggle('open');
                }
            </script>
