<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Add a keyword';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
?>
<div class="page-header">
	<h3>Add a keyword</h3>
</div>
<?php
if (isset($_POST['submitted'])) {
    $keyword = mysqli_real_escape_string($dbc, $_POST['keyword']);
    $query = "INSERT OR IGNORE INTO keyword (keyword_term) VALUES ('$keyword')";
    $result = @mysqli_query($dbc, $query);
    if ($result) {
        echo "<p><b>A new keyword has been added.</b></p>";
        echo "<a href=\"view_keywords.php\">Show all keywords</a>";
    } else {
        echo "<p>The keyword could not be added due to a system error" . mysqli_error($dbc) . "</p>";
    }
}
// form runs first
mysqli_close($dbc);
?>

<form action="add_keyword.php" method="POST">

	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Keyword</label> <input
			name="keyword" type="text" class="form-control">
	</div>

	<p>
		<button type="submit" class="btn btn-success btn-sm" name="submit"
			value="Login">Submit</button>
		<button type="reset" class="btn btn-warning btn-sm" name="reset"
			value="Login">Reset</button>
	</p>

	<input type="hidden" name="submitted" value="true">
</form>
<?php include('includes/footer.inc.html');?>