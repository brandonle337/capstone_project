<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Confirm Author Delte';
include_once ('../../mysqli_connect_capstone.php');
echo "<div class=\"page-header\"><h3>Delete Confirm</h3></div>";
$id = $_GET['id'];
$query = "SELECT * FROM author WHERE author_id=$id";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);
if ($num > 0) {
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "<p><b>" . $row['first_name'] . "</br></p>";
        echo "<p><b>" . $row['middle_initial'] . "</br></p>";
        echo "<p><b>" . $row['last_name'] . "</br></p>";
        echo "<p><b>" . $row['address'] . "</br></p>";
    }
    echo "<p>Are you sure that you want to delete this author?</p>";
    echo "<a href=\"delete_author.php?id=" . $id . "\"> YES </a><a href=\"view_author.php\"> NO </a>";
    mysqli_free_result($result); // frees memory
} else {
    echo "<p>There is no such record.</p>";
}
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>