<?php

use App\Core\Customer\Customer;
use App\Core\Company\Company;
use App\Core\Form\FormValidator;
use App\Core\Company\Exceptions\MissingAddressException;
use App\Core\Company\Exceptions\MissingEmailException;
use App\Core\Company\Exceptions\MissingNameException;
use App\Core\Company\Exceptions\MissingPhoneException;
use Db\Database;

include_once 'partials/head.html';

include BASE . '/app/Views/forms/create-customer-form.html';

$database = new Database();
$database->connect();

$existingTables = $database->query("SHOW TABLES LIKE 'customers'");

if (!$existingTables) {
    $sql = 'CREATE TABLE customers (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )';

    $database->query($sql);
}

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

    if ($_POST) {
        $customer = new Customer(
            name: filter_var($_POST['name'], FILTER_SANITIZE_STRING),
            email: filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            companyDetails: $companyDetails
        );

        $database->query("INSERT INTO customers (name, email) VALUES ('{$_POST['name']}', '{$_POST['email']}')");

        $getInsertedResult = $database->query('SELECT * FROM customers');

        echo '<pre>';
        print_r($getInsertedResult);
    }

//    echo 'Customer: <pre>';
//    print_r($customer);
}

try {
    echo 'Company Details: <br>';
    print_r($companyDetails->getDetails());
} catch (MissingNameException|MissingAddressException|MissingPhoneException|MissingEmailException $e) {
    $errorMessage = '[' . date('Y-m-d H:i:s') . '] Error: ' . $e->getMessage() . ' - ' . $e->getCode() . "\n";
    error_log($errorMessage, 3, $_SERVER['DOCUMENT_ROOT'] . '/logs/company/company_errors.log');
}