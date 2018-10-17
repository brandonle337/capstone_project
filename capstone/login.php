<?php
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // need two helper files
    require ('includes/login_functions.inc.php');
    require ('../../mysqli_connect_final.php');
    // check the login
    list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
    mysqli_close($dbc); // close dbc
    if ($check) {
        // set the session data
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        // store the HTTP_USER_AGENT
        $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
        // redirect to index.php
        header('Location: index.php');
        exit();
    } else // if unsuccessful
    {
        // assign $data to $errors for login_page.inc.php
        $errors = $data;
    }
} // end of main submit
  // create the page

$page_title = 'Login';
include ('includes/login.header.inc.html');

// print any error messages
if (isset($errors) && ! empty($errors)) {
    echo '<h1>ERROR!</h1>
    <p>The follow error(s) occured:<br>';
    foreach ($errors as $msg) {
        echo " - $msg<br>\n";
    }
    echo '</p><p>Please try again.</p>';
}
?>

<h1>Please login here to use our service</h1>
<form action="login.php" method="post">
	<p>
		Email Address: <input type="email" name="email" size="20"
			maxlength="60">
	</p>
	<p>
		Password: <input type="password" name="pass" size="20" maxlength="20">
	</p>
	<p>
		<button type="submit" class="btn btn-primary btn-sm" name="submit"
			value="Login">Login</button>
	</p>
</form>

<?php include('includes/footer.inc.html'); ?>