<?php

function Callapi() {


$search_term =  $_REQUEST['search_term']; //Get search term...

$trimmed_search = str_replace(' ', '', $search_term); //Remove Spaces...

///Declare vars...

$number = $_POST['search_term'];
$form_result = $_POST['submit'];

//echo $trimmed_search;


$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://api.companieshouse.gov.uk/search/companies?q='.$trimmed_search);
//curl_setopt($curl, CURLOPT_URL, 'https://api.companieshouse.gov.uk/company/'.$trimmed_search.'/insolvency');
curl_setopt($curl, CURLOPT_USERPWD,"m_zHeLJNvJhlw9aRn0UL5aoGSylrOMzJ0-anvuJd");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET'); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($curl);
if($errno = curl_errno($curl)) {
$error_message = curl_strerror($errno);
echo "cURL error ({$errno}):\n {$error_message}";
}
curl_close($curl);

$json = json_decode($response, true); // decode the JSON into an associative array


// Handle the API response below here... 
echo '<p><pre>' . print_r($json, true) . '</pre></p>';

}