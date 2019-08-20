<?php

function Callapi() {


$search_term =  $_REQUEST['search_term']; //Get search term...

$trimmed_search = str_replace(' ', '', $search_term); //Remove Spaces...

///Declare vars...

$number = $_POST['search_term'];
$form_result = $_POST['submit'];

//echo $trimmed_search;
