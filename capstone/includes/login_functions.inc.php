<?php

// validates entered data
function check_login($dbc, $email = '', $pass = '')
{
    $errors = [];
    // validates email
    if (empty($email)) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($email));
    }
    // validates password
    if (empty($pass)) {
        $errors[] = 'You forgot to enter your password.';
    } else {
        $p = mysqli_real_escape_string($dbc, trim($pass));
    }
    if (empty($errors)) {
        // retrive the user_id and first_name for that email/pass combo
        $q = "SELECT user_id, first_name FROM users WHERE email='$e' AND pass = SHA2 ('$p', 512)";
        $r = @mysqli_query($dbc, $q);
        if (mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            return [
                true,
                $row
            ];
        } else // not a match
        {
            $errors[] = 'The email address and password entered do not match those on file';
        }
    } // end of (empty(errors))
      // return false and the errors
    return [
        false,
        $errors
    ];
} // end of check_login()
?>