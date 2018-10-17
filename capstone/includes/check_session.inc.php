<?php
session_start(); // start the session
                 // if no session valus is present, redirect the user
                 // also validate the HTTP_USER_AGENT
if (! isset($_SESSION['agent']) or ($_SESSION['agent'] != sha1($_SERVER['HTTP_USER_AGENT']))) {
    header('Location: login.php'); // redirect to login.php if not logged in
}
?>