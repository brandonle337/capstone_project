<?php
require_once ('includes/check_session.inc.php'); // check session
$page_title = 'Welcome to my Site!';
include ('includes/header.inc.html');
require_once ('../../mysqli_connect_final.php');
?>
<div class="page-header">
	<h1>Contact Us</h1>
</div>

<p>If you have any questions about the library, feel free to contact us.</p>
<p></p>
<div class="clearfix">
	<img src="work_pic.jpg" alt="Patrick Wright"
		style="width: 150px; height: 200px; float: left; margin-right: 15px;">
	<p>Patrick Wright</p>
	<p>Information Studies, University of Oklahoma</p>
	<p>918-899-2329</p>
	<p>
		<a href="mailto:pmwright@ou.edu">pmwright@ou.edu</a>.<br>
	</p>
  
<?php
include ('includes/footer.inc.html');
?>