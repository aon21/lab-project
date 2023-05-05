<?php

use App\Core\Client\Client;
use App\Core\Company\Company;

$companyDetails = new Company();
$companyDetails->setName('Test Company Name');
$companyDetails->setAddress('123 str, Test');
$companyDetails->setPhone('+223233323323');
$companyDetails->setEmail('test@test.com');


$client = new Client("John Doe", "johndoe@example.com");

$client = new Client("John Doe", "johndoe@example.com");
$client->setCompanyDetails($companyDetails);

print_r($client->getCompanyDetails());