<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Update a Record!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_final.php');
echo "<div class=\"page-header\"><h3>Updated</h3></div>";

$id = mysqli_real_escape_string($dbc, $_POST['id']);
$title = mysqli_real_escape_string($dbc, $_POST['title']);
$url = mysqli_real_escape_string($dbc, $_POST['url']);
$comment = mysqli_real_escape_string($dbc, $_POST['comment']);

$query = "UPDATE bookmark SET title='$title', url='$url', comment='$comment' WHERE id='$id'";
$result = @mysqli_query($dbc, $query);
if ($result) {
    echo "<p><b>The selected record has been updated.</b></p>";
    echo "<a href=index.php>Home</a>";
} else {
    echo "<p>The record could not be updated due to a system error" . mysqli_error($dbc) . "</p>";
}
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>