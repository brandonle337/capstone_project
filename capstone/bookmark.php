<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Welcome to my Site!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
?>
<div class="page-header">
	<h3>Entries</h3>
</div>
<?php
echo ("<div style=\"text-align:center\">");
echo ("<a href=\"add.php\">Add a Document</a><p>");
echo ("<a href=\"searchform.php\">Search records</a><p>");
echo ("</div>");
$query = "SELECT * FROM article 
			JOIN publication ON article.publication_id = publication.publication_id 
			JOIN article_author ON article.article_id = article_author.article_id
			JOIN author ON article_author.author_id = author.author_id";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);

if ($num > 0) {
    echo "<p><b>There are currently $num entries.</b></p>";
    echo "<table cellpadding=\"5\" cellspacing=\"5\" border=\"1\"><tr>
			<th scope=\"col\">TYPE</th>
			<th scope=\"col\">TITLE</th>
			<th scope=\"col\">AUTHOR</th>
			<th scope=\"col\">YEAR</th>
			<th scope=\"col\">PUBLICATION</th>
			<th scope=\"col\">REVIEWED</th>
			<th><center>*</center></th>
			<th><center>*</center></th></tr>";
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "<tr scope=\"row\"><td>" . $row['article.title'] . "</td>";
        echo "<td>" . $row['article_type'] . "</td>";
        echo "<td><a href=\"view_authors.php?id=" . $row['article_id'] . "\">View Authors</a>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['publication.title'] . "</td>";
        echo "<td>" . $row['reviewed_item'] . "</td>";
        echo "<td><a href=\"deleteconfirm.php?id=" . $row['article_id'] . "\">Delete</a></td>";
        echo "<td><a href=\"updateform.php?id=" . $row['article_id'] . "\">Update</a></td></tr>";
    }
    echo "</table>";
    mysqli_free_result($result); // frees memory
} else {
    echo '<p>There are currently no records.</p>';
}

mysqli_close($dbc);
include ('includes/footer.inc.html');
?>