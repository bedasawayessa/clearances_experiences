<?php
require 'index.php';
?>

<div class="content" >
	<div class="container p-4" style="box-shadow: 10px 10px 20px 0px rgba(0, 0, 0, 0.5);">
	   
			<h1>My Admin Dashboard</h1>
		
			<div id="user_list">
			<h1>Add User User</h1> 
			<form method="POST" action="addNewUserProcess.php" >
				<div class="addNewUserForm row">
					<div class="items">
										 <div class="mb-2">
							<label for="exampleInputUsername" class="form-label">User Name</label>
							<input type="text" class="form-control" id="exampleInputUsername" name="username" aria-describedby="emailHelp" required>
							<div id="UsernameHelp" class="form-text">Enter Username.</div>
						</div>

						<div class="mb-2">
							<label for="exampleInputFirstName" class="form-label">First Name</label>
							<input type="text" class="form-control" id="exampleInputFirstName" name="firstname" aria-describedby="firstNameHelp">
							<div id="firstNameHelp" class="form-text">Enter first name.</div>
						</div>

						<div class="mb-2">
							<label for="exampleInputLastName" class="form-label">Last Name</label>
							<input type="text" class="form-control" id="exampleInputLastName" name="lastname" aria-describedby="lastNameHelp">
							<div id="lastNameHelp" class="form-text">Enter last name.</div>
						</div>
					</div>

					<div class="items">

						<div class="mb-2">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
							<div id="emailHelp" class="form-text">Enter your email.</div>
						</div>


						<div class="mb-2">
							<label for="exampleInputPhoneNumber" class="form-label">Phone Number</label>
							<input type="tel" class="form-control" id="exampleInputPhoneNumber" name="phonenumber" aria-describedby="phoneNumberHelp">
							<div id="phoneNumberHelp" class="form-text s">Enter your phone number .</div>
						</div>
						<div class="mb-2">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" name="password" id="exampleInputPassword1">                    
							<div id="phoneNumberHelp" class="form-text">Enter your Password.</div>
						</div>

					</div>


					<div class="items">

						<div class="mb-2">
							<label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
							<input type="password" class="form-control" name="confirmpassword" id="exampleInputConfirmPassword1">                   
							<div id="phoneNumberHelp" class="form-text">Repeat your password.</div>
						</div>


						<div class="mb-2">
							<label for="exampleRoleSelect" class="form-label">Role</label>
							<select class="form-select" id="exampleRoleSelect" name="role" aria-describedby="roleHelp">
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
						<button type="submit" name="register" class="btn btn-primary">Sign Up</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require 'footer.php'; ?>