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
        return $this->companyDetails;
    }
}