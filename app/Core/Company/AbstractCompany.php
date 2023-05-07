<?php

declare(strict_types=1);

namespace App\Core\Company;

abstract class AbstractCompany implements CompanyDetailsInterface
{
    public function __construct(
        protected string $name,
        protected string $address,
        protected string $phone,
        protected string $email,
    ){}

    public function getDetails(): array
    {
        return [
            'name'    => $this->name,
            'address' => $this->address,
            'phone'   => $this->phone,
            'email'   => $this->email
        ];
    }
}