<?php

use App\Core\Customer\Customer;
use App\Core\Company\Company;

$companyDetails = new Company(
    name: 'Test Company Name',
    address: '123 str, Test',
    phone: '+223233323323',
    email: 'test@test.com'
);

$client = new Customer(
    name: 'John Doe',
    email: 'johndoe@example.com',
    companyDetails: $companyDetails
);

print_r($client);
print_r($client->getCompanyDetails());