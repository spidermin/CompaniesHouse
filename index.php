<!DOCTYPE html>
<html>
<head>
<title>Companies House App</title>
<!-- stylesheets -->
<link rel="stylesheet" type="text/css" href="/companieshouse/style.css">
</head>
<?php 
/// Included files... 
	include '/functions.php';
	
// Declare vars...
$number = $_POST['search_term'];
$form_result = $_POST['submit'];	
?>

<!-- Search form --> 
<body>
	<div id="main-container">
<h1>Companies House credit approval system</h1>
<hr>
<h2>Search Companies House records</h2>
<form id="search" method="post" action=""> 
	<input type="number" name="search_term" id="search_term" placeholder="Search company number"/>
	<input type="submit" name="submit" id="submit" value="submit"   />
</form>
<hr> 
<?php

/// Validate form...
 
if (isset($form_result)){
	if (is_numeric($number)) {
	echo '';
	}
	else {
	echo '<p class="error">Error: Please enter a company number </p><br>';
	}
}
?>

<?php
/// Call APIs...
	Callapi();
	
?>	
	
	</div>
</body>

</html>
