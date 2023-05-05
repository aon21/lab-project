<?php

declare(strict_types=1);

namespace App\Core\Company;

class Company extends AbstractCompany
{
    public function getDetails(): array
    {
        return [
            'name'    => $this->getName(),
            'address' => $this->getAddress(),
            'phone'   => $this->getPhone(),
            'email'   => $this->getEmail()
        ];
    }
}