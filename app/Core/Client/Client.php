<?php

namespace App\Core\Client;

use App\Core\Company\AbstractCompany;
use App\Core\Company\Company;

class Client
{
    protected string $name;
    protected string $email;
    protected ?AbstractCompany $companyDetails = null;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setCompanyDetails(AbstractCompany $companyDetails): void
    {
        $this->companyDetails = $companyDetails;
    }

    public function getCompanyDetails(): ?AbstractCompany
    {
        return $this->companyDetails;
    }
}