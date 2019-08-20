# CompaniesHouse

A small app to credit score companies

Brief: 

Using the Companies House public API (https://developer.companieshouse.gov.uk/api/docs/index.html), create a small app using your choice of PHP/Javascript that takes a user input for a company number, validates this input, then uses the API to verify whether the company is currently active, and whether it has any history of insolvency.

If the company is not active, return a message to the user refusing a credit account application, if the company is active but has a history of insolvency return a risk score (between 1-100) establishing how high the risk of issuing a credit account might be.

Build: 

In order to get the required data, two API calls are needed. One being company search and the other being insolvency information. This is done using PHP CURL. 

A simple search form is required in order to pass the searched term to the API. This is also validated and trimmed.  

Company search data is returned in JSON and decoded. The array is then put through a foreach loop in order to echo the data in case more than one company appears. An If statement is then used in order to find the status of the company to see if it is active, disolved or in liquidation. 

If the company is either disolved or in liquidation, this information will be highlighted to the user. 

A second API call is made to find insolvancy data if it exists for the company. This is also returned in JSON and decoded. The type of involency is then used to risk score the company. 




Run: 

PHP version 5.6.4

Assumptions: 

Using the Companies House public API a small app is required in order to asses the risk of lending credit to a company. 

The company must be must be active in order to gain credit, however if there are any insolvencies againts the company, the company must be risk scored between 0 - 100. 

After spending some time searching through company numbers on the Companies House website and not finding a single company marked with insolvencies but many with liquidation, lead me to believe that these companies may in fact be in liquidation. 

When running through the insolvancy API I was able to find some insolvancy data, however I noticed that any company which had this data was in some sort of liquidation.

I found three different types of liquidation data: 

 - creditors-voluntary-liquidation

 - members-voluntary-liquidation

 - compulsory-liquidation
 
 I then used these for risk scoring, sharing a score of 100. 
 
 