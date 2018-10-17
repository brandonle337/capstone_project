<?php
$page_title = "Register a new user";
include ('includes/login.header.inc.html'); // include header
                                            // Check if the form has been submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = []; // Initialize an error array.
    require_once ('../../mysqli_connect_final.php'); // connect to database
                                                     // Check for a first name.
    if (empty($_POST['first_name'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $first_name = mysqli_real_escape_string($dbc, $_POST['first_name']);
    }
    // Check for a last name.
    if (empty($_POST['last_name'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $last_name = mysqli_real_escape_string($dbc, $_POST['last_name']);
    }
    // Check for an email address.
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $email = mysqli_real_escape_string($dbc, $_POST['email']);
    }
    // Check for a password and match against the confirmed password.
    if (! empty($_POST['password1']) && ! empty($_POST['password2'])) {
        if ($_POST['password1'] != $_POST['password2']) {
            $errors[] = 'Your password did not match the confirmed password.';
        } else {
            $password = $_POST['password1'];
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
    }
    if (empty($errors)) { // If everything's OK.
                          // Register the user in the database.
                          // Check for previous registration.
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($dbc, $query);
        if (mysqli_num_rows($result) == 0) { // if there is no such email address
                                             // Make the query.
            $query = "INSERT INTO users (first_name, last_name, email, pass, registration_date) 
			VALUES ('$first_name', '$last_name', '$email', SHA2('$password', 512), NOW() )";
            $result = @mysqli_query($dbc, $query); // Run the query.
            if ($result) { // If it ran OK.
                echo "<p>You are now registered. Please, login to use our great service.</p>";
                echo "<a href=\"login.php\">Login</a>";
                mysqli_close($dbc); // Close the database connection.
                include ('includes/footer.inc.html');
                exit();
            } else { // If it did not run OK.
                $errors[] = 'You could not be registered due to a system error. 
				             We apologize for any inconvenience.'; // Public message.
                $errors[] = mysqli_error($dbc); // MySQL error message.
            } // End of if($result)
        } else { // Email address is already taken.
            $errors[] = 'The email address has already been registered.';
        } // End of if(mysqli_num_rows($result) == 0)
    }
    
    if (! empty(errors)) { // Report existing errors.
        echo '<h1>Error!</h1>
        <p>The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />";
        }
        echo '</p><p>Please try again.</p>';
    } // End of if(empty($errors)) IF.
    mysqli_close($dbc); // Close the database connection.
} // End of the main Submit conditional.
?>
<h2>Register</h2>
<form action="register.php" method="post">
	<p>
		First Name: <input type="text" name="first_name" size="15"
			maxlength="20"
			value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" />
	</p>
	<p>
		Last Name: <input type="text" name="last_name" size="15"
			maxlength="40"
			value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" />
	</p>
	<p>
		Email Address: <input type="text" name="email" size="20"
			maxlength="60"
			value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
	</p>
	<p>
		Password: <input type="password" name="password1" size="10"
			maxlength="20" />
	</p>
	<p>
		Confirm Password: <input type="password" name="password2" size="10"
			maxlength="20" />
	</p>
	<p>
		<button type="submit" class="btn btn-primary btn-sm" name="submit"
			value="Register">Register</button>
	</p>
</form>
<?php
// Include footer.php
include ('includes/footer.inc.html');
?>



