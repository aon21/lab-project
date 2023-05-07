<?php

use App\Core\Customer\Customer;
use App\Core\Company\Company;
use App\Core\Company\Exceptions\MissingAddressException;
use App\Core\Company\Exceptions\MissingEmailException;
use App\Core\Company\Exceptions\MissingNameException;
use App\Core\Company\Exceptions\MissingPhoneException;


$companyDetails = new Company(
    name: 'Test Company Name',
    address: '123 str, Test',
    phone: '+223233323323',
    email: 'test@test.com'
);

$customer = new Customer(
    name: 'John Doe',
    email: 'johndoe@example.com',
    companyDetails: $companyDetails
);

print_r($customer->getCompanyDetails());

try {
    print_r($companyDetails->getDetails());
} catch (MissingNameException|MissingAddressException|MissingPhoneException|MissingEmailException $e) {
    $errorMessage = '[' . date('Y-m-d H:i:s') . '] Error: ' . $e->getMessage() . ' - ' . $e->getCode() . "\n";
    error_log($errorMessage, 3, $_SERVER['DOCUMENT_ROOT'] . '/logs/company/company_errors.log');
}