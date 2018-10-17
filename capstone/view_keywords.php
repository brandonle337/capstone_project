<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Welcome to my Site!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
?>
<div class="page-header">
	<h3>Keywords</h3>
</div>
<?php
echo ("<div style=\"text-align:center\">");
echo ("<a href=\"add_keyword.php\">Add a keyword</a><p>");
echo ("<a href=\"searchform.php\">Search records</a><p>");
echo ("</div>");
$query = "SELECT * FROM keyword";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);

if ($num > 0) {
    echo "<p><b>There are currently $num keywords.</b></p>";
    echo "<table cellpadding=\"5\" cellspacing=\"5\" border=\"1\"> <tr><th scope=\"col\">#</th><td scope=\"col\">KEYWORD</td></th><th><center>*</center></th><th><center>*</center></th></tr>";
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "<tr scope=\"row\"><td>" . $row['keyword_id'] . "</td>";
        echo "<td>" . $row['keyword_term'] . "</td>";
        echo "<td><a href=\"deleteconfirm_keyword.php?id=" . $row['keyword_id'] . "\">Delete</a></td>";
        echo "<td><a href=\"update_keyword_form.php?id=" . $row['keyword_id'] . "\">Update</a></td></tr>";
    }
    echo "</table>";
    mysqli_free_result($result); // frees memory
} else {
    echo '<p>There are currently no keywords.</p>';
}
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>