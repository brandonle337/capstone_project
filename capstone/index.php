<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Welcome to my Site!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_capstone.php');
?>
<div style="text-align: center;" class="page-header">
	<h1>Rare Disease Project</h1>
</div>
</br>
<div
	style="display: flex; flex-direction: column; justify-content: center; align-items: center;">

	<button onclick="location.href='#'" type="button"
		class="btn btn-outline-primary btn-lg btn-block">Add Document (coming
		soon)</button>
	<button onclick="location.href='#'" type="button"
		class="btn btn-outline-primary btn-lg btn-block">Search Documents
		(coming soon)</button>
	<button onclick="location.href='add_keyword.php'" type="button"
		class="btn btn-outline-primary btn-lg btn-block">Add Keyword</button>
	<button onclick="location.href='view_keywords.php'" type="button"
		class="btn btn-outline-primary btn-lg btn-block">View Keywords</button>
</div>



<?php
include ('includes/footer.inc.html');
?>