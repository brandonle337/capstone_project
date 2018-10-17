<?php
require_once('includes/check_session.inc.php'); //check session
$page_title = 'Welcome to my Site!';
include('includes/header.inc.html');
require_once('../../mysqli_connect_capstone.php');
?>
<div class="page-header"><h3>Patrick's Books</h3></div>
<?php
echo ("<div style=\"text-align:center\">");
echo ("<a href=\"add.php\">Add a record</a><p>");
echo ("<a href=\"searchform.php\">Search records</a><p>");
echo ("</div>");

//Will this code work for pagination? 10/17/brandon;
$display = 20;
if(isset($_GET['p'])&&is_numeric($_GET['p'])) {
	$pages = $_GET['p'];
}else{
$query = "SELECT COUNT(id) FROM bookmark";
$result = @mysqli_query($dbc, $query);
$row = @mysqli_fetch_array($result, MYSQL_NUM);
$records = $row[0];

if($records > $display) {
$pages = ceil($records/$display);
}else{
	$pages = 1;
}
}
//or should I look into this "https://code.tutsplus.com/tutorials/how-to-paginate-data-with-php--net-2928";

$query = "SELECT * FROM Book";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);

if ($num > 0)
{
    echo "<p><b>There are currently $num entries.</b></p>";
    echo"<table cellpadding=\"5\" cellspacing=\"5\" border=\"1\"> <tr><th scope=\"col\">TITLE</th><td scope=\"col\">AUTHOR</td><td scope=\"col\">YEAR</td><td scope=\"col\">PAGES</td><td scope=\"col\">ISBN-13</td><th><center>*</center></th><th><center>*</center></th></tr>";
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC))
    {
        echo "<tr scope=\"row\"><td>".$row['title']."</td>";
        echo "<td>".$row['author']."</td>";
        echo "<td>".$row['date_published']."</td>";
        echo "<td>".$row['pages']."</td>";
        echo "<td>".$row['isbn13']."</td>";
        echo "<td><a href=\"deleteconfirm.php?id=".$row['id']."\">Delete</a></td>";
        echo "<td><a href=\"updateform.php?id=".$row['id']."\">Update</a></td></tr>";
    }
    echo "</table>";
    mysqli_free_result ($result); //frees memory
}
else
{
    echo '<p>There are currently no records.</p>';
}
mysqli_close($dbc);
include('includes/footer.inc.html');
?>
