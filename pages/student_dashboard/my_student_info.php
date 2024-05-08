<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Retrieve the logged-in user's user_id from the session
$user_id = $_SESSION['user_id'];

// Connect to the database
include '../../includes/db_connection.php';

// Query to fetch student details based on user_id
$student_sql = "SELECT * FROM students_tbl WHERE UserID = '$user_id'";
$student_result = $conn->query($student_sql);



require 'index.php';
?>

<div class="content">
    <div class="container p-4" style="display:block; box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
        <h1>My Student Profile</h1>
        <div id="student_info">
            <h2>Student Details</h2>
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
                    <th>Student ID</th>
                    <th>Department ID</th>
                    <th>Program</th>
                    <th>Year Level</th>
                    <th>GPA</th>
					<th>Action</th>
                </tr>
                <tr>
				<thead>
                    <tbody>
						<?php

                            $student_result = $conn->query($student_sql);
							// Check if student was found
							if ($student_result->num_rows > 0) {

								// Loop through each user and display their information
								while ($row = mysqli_fetch_assoc($student_result)) {
									echo "<tr>";
                                    echo "<td>" . $row["StudentID"] . "</td>";
									echo "<td>" . $row["UserID"] . "</td>";
									echo "<td>" . $row["DepartmentID"] . "</td>";
									echo "<td>" . $row["Program"] . "</td>";
									echo "<td>" . $row["YearLevel"] . "</td>";
									echo "<td>" . $row["GPA"] . "</td>";
									echo "<td><a href='my_student_info_update.php?id=" . $row["StudentID"] . "'>Edit</a> | <a href='delete_user.php?id=" . $row["UserID"] . "'>Delete</a></td>";
									echo "</tr>";
								}
							} else {
								// Student not found
								echo "Student not found.";
							}

							?>
				</tbody>
            </table>
        </div>
    </div>
</div>
<?php

?>