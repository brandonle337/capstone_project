<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = "Delete a Keyword";
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
echo "<div class=\"page-header\"><h3>Delete</h3></div>";
$id = $_GET['id'];
$query = "DELETE FROM keyword WHERE keyword_id=$id";
$result = mysqli_query($dbc, $query);
if ($result) {
    
    echo "<div class=\"alert alert-dismissible alert-success\"><strong>The selected record has been deleted.</strong>.</div>";
} else {
    echo "The selected record could not be deleted.";
}
echo "<div class=\"btn-group-vertical\" data-toggle=\"buttons\">";
echo "<button onclick=\"location.href='view_keywords.php'\" type=\"button\" class=\"btn btn-outline-primary\">View Keywords</button>";
echo "<button onclick=\"location.href='index.php'\" type=\"button\" class=\"btn btn-outline-primary\">Home</button>";
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>