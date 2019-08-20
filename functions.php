<?php

function Callapi() {


$search_term =  $_REQUEST['search_term']; //Get search term...

$trimmed_search = str_replace(' ', '', $search_term); //Remove Spaces...

///Declare vars...

$number = $_POST['search_term'];
$form_result = $_POST['submit'];

//echo $trimmed_search;

//Company search API call..

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
//echo '<p><pre>' . print_r($json, true) . '</pre></p>';

$result = $json['items'];

if ($json['items'][0]['company_status'] == "active") {

foreach($result as $value){	
echo "<h2>" . $value['title']."</h2>";
echo "<p>Company Number: " .$value['company_number']. "<br>"; 	
echo "Company Status: " .$value['company_status']."<br>";
echo "Address: " .$value['address_snippet']."<br>";
echo "<p class='approved'>Credit account application approved.</p>";
	}

} if ($json['items'][0]['company_status'] == "dissolved"  ) {
echo "<h2>" .$json['items'][0]['title']."</h2>";
echo "<p class='dissolved'>" .$json['items'][0]['description'] . "</p>";
echo "<p>Address: " .$json['items'][0]['address_snippet']."</p><br>";
echo "<p class='refused'>Credit account application refused.</p>";

} if ($json['items'][0]['company_status'] == "liquidation"  ) {
echo "<h2>" .$json['items'][0]['title']."</h2>";
echo "<p class='dissolved'>" .$json['items'][0]['description'] . "</p>";
echo "<p>Address: " .$json['items'][0]['address_snippet']."</p>";

} else if (isset($form_result)){ 
	if ($json['total_results'] == "0" )  {
		echo 'Company not found';
	}
}


};

///Insolvency API call...

function Callinsolvanceyapi() {

$search_term =  $_REQUEST['search_term']; //Get search term

$trimmed_search = str_replace(' ', '', $search_term); //Remove Spaces

$curl = curl_init();

//curl_setopt($curl, CURLOPT_URL, 'https://api.companieshouse.gov.uk/search/companies?q='.$trimmed_search);
curl_setopt($curl, CURLOPT_URL, 'https://api.companieshouse.gov.uk/company/'.$trimmed_search.'/insolvency');
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
//echo '<p><pre>' . print_r($json, true) . '</pre></p>';

$insolvency = $json['cases'];

foreach($insolvency as $value){	
echo "Insolvency type: " . $value['type']."<br>";	

}

// Switch case to handle risk score if applicable...

$risk = $value['type'];

switch ($risk) {
    case "creditors-voluntary-liquidation":
        echo "<p class='risk-low'>Risk score: 20</p>";
        break;
    case "members-voluntary-liquidation":
        echo "<p class='risk-medium'>Risk score: 60</p>";
        break;
    case "compulsory-liquidation":
        echo "<p class='risk-high'>Risk score: 100</p>";
        break;
    default:
        echo "";
}

};


?>