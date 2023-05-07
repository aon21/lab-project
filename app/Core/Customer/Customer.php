<?php

declare(strict_types=1);

namespace App\Core\Customer;

use App\Core\Company\AbstractCompany;

class Customer
{
    public function __construct(
        protected string $name,
        protected string $email,
        protected ?AbstractCompany $companyDetails = null
    ){}

    public function getCompanyDetails(): ?AbstractCompany
    {
        try {
            if (empty($this->companyDetails)) {
                throw new \RuntimeException('Customer company details are not set');
            }

            return $this->companyDetails;
        } catch (\RuntimeException $e) {
            $errorMessage = '[' . date('Y-m-d H:i:s') . '] Error in Customer class: ' . $e->getMessage() . "\n";
            error_log($errorMessage, 3, $_SERVER['DOCUMENT_ROOT'] . '/logs/customer/customer_errors.log');

            throw $e;
        }
    }
}