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
	
	
