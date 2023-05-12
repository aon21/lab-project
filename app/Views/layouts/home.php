<?php

use App\Core\Customer\Customer;
use App\Core\Company\Company;
use App\Core\Form\FormValidator;
use App\Core\Company\Exceptions\MissingAddressException;
use App\Core\Company\Exceptions\MissingEmailException;
use App\Core\Company\Exceptions\MissingNameException;
use App\Core\Company\Exceptions\MissingPhoneException;

include_once 'partials/head.php';

include BASE . '/app/Views/forms/create-customer-form.php';

$errors = [];

if ($_POST) {
    $formValidator = new FormValidator();
    $errors = $formValidator->validateFormFields($_POST);
}

$companyDetails = new Company(
    name: 'Test Company Name',
    address: '123 str, Test',
    phone: '+223233323323',
    email: 'test@test.com'
);

if (count($errors) > 0) {

    foreach ($errors as $field => $error) {
        echo sprintf("<div class='border border-red-600 m-4 p-2 w-1/3'>%s: %s</div>", $field, $error);
    }

} else {

    $customer = new Customer(
        name: $_POST['name'],
        email: $_POST['email'],
        companyDetails: $companyDetails
    );

    echo 'Customer: <pre>';
    print_r($customer);
}

try {
    echo 'Company Details: <br>';
    print_r($companyDetails->getDetails());
} catch (MissingNameException|MissingAddressException|MissingPhoneException|MissingEmailException $e) {
    $errorMessage = '[' . date('Y-m-d H:i:s') . '] Error: ' . $e->getMessage() . ' - ' . $e->getCode() . "\n";
    error_log($errorMessage, 3, $_SERVER['DOCUMENT_ROOT'] . '/logs/company/company_errors.log');
}