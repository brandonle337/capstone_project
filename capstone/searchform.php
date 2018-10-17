<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Search Form!';
include ('includes/header.inc.html');
?>
<div class="page-header">
	<h3>Search Form</h3>
</div>
<form action="search.php" method="post">

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
</form>
<?php
include ('includes/footer.inc.html');
?>