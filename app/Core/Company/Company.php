<?php

declare(strict_types=1);

namespace App\Core\Company;

class Company extends AbstractCompany
{
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