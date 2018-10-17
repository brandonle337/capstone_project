<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Delete Confirm';
include_once ('../../mysqli_connect_final.php');
echo "<div class=\"page-header\"><h3>Delete Confirm</h3></div>";
$id = $_GET['id'];
$query = "SELECT * FROM bookmark WHERE id=$id";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);
if ($num > 0) {
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "<p><b>" . $row['url'] . "</br></p>";
        echo "<p><b>" . $row['title'] . "</br></p>";
    }
    echo "<p>Are you sure that you want to delete this record?</p>";
    echo "<a href=\"delete.php?id=" . $id . "\"> YES </a><a href=\"index.php\"> NO </a>";
    mysqli_free_result($result); // frees memory
} else {
    echo "<p>There is no such record.</p>";
}
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>