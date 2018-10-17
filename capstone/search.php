<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Search!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_final.php');
echo "<div class=\"page-header\"><h3>Search Results</h3></div>";
echo ("<a href=\"searchform.php\">Another Search</a></p>");
echo ("<a href=\"index.php\">Home</a></p>");

if (! empty($_POST['title']) || ! empty($_POST['author']) || ! empty($_POST['date_published']) || ! empty($_POST['pages']) || ! empty($_POST['isbn13'])) {
    $title = mysqli_real_escape_string($dbc, $_POST['title']);
    $author = mysqli_real_escape_string($dbc, $_POST['author']);
    $date_published = mysqli_real_escape_string($dbc, $_POST['date_published']);
    $pages = mysqli_real_escape_string($dbc, $_POST['pages']);
    $isbn13 = mysqli_real_escape_string($dbc, $_POST['isbn13']);
    
    $query = "SELECT * FROM Book WHERE (title LIKE '%$title%') AND (author LIKE '%$author%') AND (date_published LIKE '%$date_published%') AND (pages LIKE '%$pages%') AND (isbn13 LIKE '%$isbn13%')";
} else {
    $query = "SELECT * FROM Book";
}

$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);

if ($num > 0) {
    echo "<p><b>There are currently $num entries.</b></p>";
    echo "<table cellpadding=\"5\" cellspacing=\"5\" border=\"1\"> <tr><th scope=\"col\">TITLE</th><td scope=\"col\">AUTHOR</td><td scope=\"col\">YEAR</td><td scope=\"col\">PAGES</td><td scope=\"col\">ISBN-13</td><th><center>*</center></th><th><center>*</center></th></tr>";
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "<tr scope=\"row\"><td>" . $row['title'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['date_published'] . "</td>";
        echo "<td>" . $row['pages'] . "</td>";
        echo "<td>" . $row['isbn13'] . "</td>";
        echo "<td><a href=\"deleteconfirm.php?id=" . $row['id'] . "\">Delete</a></td>";
        echo "<td><a href=\"updateform.php?id=" . $row['id'] . "\">Update</a></td></tr>";
    }
    echo "</table>";
    mysqli_free_result($result); // frees memory
} else {
    echo '<p>Your search returned no result.</p>';
}
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>