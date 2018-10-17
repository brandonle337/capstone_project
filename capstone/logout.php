<?php
// this page lets the user logout
session_start(); // access the existing session
                 // if no session exists, redirect
if (! isset($_SESSION['user_id'])) {
    header('Location: login.php');
} else // cancel the session
{
    $_SESSION = []; // clear vars
    session_destroy(); // destroy the session
    setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0); // destroy the cookie
}

$page_title = 'Logged Out!';
include ('includes/login.header.inc.html');
echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";
include ('includes/footer.inc.html');
?>