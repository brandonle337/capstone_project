<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'View Authors';
include_once ('../../mysqli_connect_final.php');
echo "<div class=\"page-header\"><h3>View Authors</h3></div>";
$id = $_GET['id'];


echo ("<div style=\"text-align:center\">");
echo ("<a href=\"add.php\">Add a Document</a><p>");
echo ("<a href=\"searchform.php\">Search records</a><p>");
echo ("</div>");
$query = "SELECT * FROM article
			JOIN article_author ON article.article_id = article_author.article_id
			JOIN author ON article_author.author_id = author.author_id 
			WHERE article_id=$id";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);

$first_row = mysql_fetch_assoc($result);
echo "<div class=\"page-header\"><h3>View authors from ". $first_row['title'] ."</h3></div>";
mysql_data_seek($result, 0);

if ($num > 0) {
	echo "<p><b>There are currently $num entries.</b></p>";
	echo "<table cellpadding=\"5\" cellspacing=\"5\" border=\"1\"><tr>
			<th scope=\"col\">FIRST</th>
			<th scope=\"col\">M.I.</th>
			<th scope=\"col\">LAST</th>
			<th scope=\"col\">ADDRESS</th>
			<th><center>*</center></th>
			<th><center>*</center></th></tr>";
	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		echo "<tr scope=\"row\"><td>" . $row['article.title'] . "</td>";
		echo "<td>" . $row['first_name'] . "</td>";
		echo "<td>" . $row['middle_initial'] . "</td>";
		echo "<td>" . $row['last_name'] . "</td>";
		echo "<td>" . $row['address'] . "</td>";
		
		echo "<td><a href=\"deleteconfirm_author.php?id=" . $row['author_id'] . "\">Delete</a></td>";
		echo "<td><a href=\"update_author_form.php?id=" . $row['author_id'] . "\">Update</a></td></tr>";
	}
	echo "</table>";
	mysqli_free_result($result); // frees memory
} else {
	echo '<p>There are currently no records.</p>';
}


mysqli_close($dbc);
include ('includes/footer.inc.html');
?>