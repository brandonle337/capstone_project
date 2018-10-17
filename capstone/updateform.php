<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Update a Record!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_final.php');
echo "<div class=\"page-header\"><h3>Update Form</h3></div>";
$id = $_GET['id'];
$query = "SELECT * FROM bookmark WHERE id=$id";
$result = @mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);
if ($num > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
<form action="update.php" method="post">
	Title: <input name="title" size=50 value="<?php echo $row['title']; ?>"><br />
	URL: <input name="url" size=50 value="<?php echo $row['url']; ?>"><br />
	Comment: <br />
	<textarea name="comment" rows=5 cols=100><?php echo $row['comment']; ?></textarea>
	<br /> <input type="submit" value="update"> <input type="reset"
		value="reset"> <input type="hidden" name="id"
		value="<?php echo $row['id'];?>">
</form>
<?php
    }
}
mysqli_close($dbc);
include ('includes/footer.inc.html');
?>