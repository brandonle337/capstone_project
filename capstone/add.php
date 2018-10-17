<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Add a book!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
?>
<div class="page-header">
	<h3>Add a document</h3>
</div>
<?php
if (isset($_POST['submitted'])) {
    $title = mysqli_real_escape_string($dbc, $_POST['title']);
    $author = mysqli_real_escape_string($dbc, $_POST['author']);
    $date_published = mysqli_real_escape_string($dbc, $_POST['date_published']);
    $pages = mysqli_real_escape_string($dbc, $_POST['pages']);
    $isbn13 = mysqli_real_escape_string($dbc, $_POST['isbn13']);
    
    $query = "INSERT INTO Book VALUES ('$title', '$author', '$date_published', '$pages', '$isbn13')";
    $result = @mysqli_query($dbc, $query);
    if ($result) {
        echo "<p><b>A new book has been added.</b></p>";
        echo "<a href=\"bookmark.php\">Show all books</a>";
    } else {
        echo "<p>The record could not be added due to a system error" . mysqli_error($dbc) . "</p>";
    }
}
// form runs first
mysqli_close($dbc);
?>

<form action="add.php" method="POST">

	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Title</label> <input
			name="title" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Author</label> <input
			name="author" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Year</label> <input
			name="date_published" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">Number of Pages</label>
		<input name="pages" type="text" class="form-control">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="inputDefault">ISBN-13</label> <input
			name="isbn13" type="text" class="form-control">
	</div>

	<p>
		<button type="submit" class="btn btn-primary btn-sm" name="submit"
			value="Login">Submit</button>
		<button type="reset" class="btn btn-primary btn-sm" name="reset"
			value="Login">Reset</button>
	</p>

	<input type="hidden" name="submitted" value="true">
</form>
<?php include('includes/footer.inc.html');?>