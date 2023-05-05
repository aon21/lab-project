<?php

namespace App\Core\Company;

use App\Core\Company\AbstractCompany;

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