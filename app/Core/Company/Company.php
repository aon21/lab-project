<?php

declare(strict_types=1);

namespace App\Core\Company;

use App\Core\Company\Exceptions\MissingAddressException;
use App\Core\Company\Exceptions\MissingEmailException;
use App\Core\Company\Exceptions\MissingNameException;
use App\Core\Company\Exceptions\MissingPhoneException;

class Company extends AbstractCompany
{
    /**
     * @throws MissingNameException
     * @throws MissingEmailException
     * @throws MissingPhoneException
     * @throws MissingAddressException
     */
    public function getDetails(): array
    {
        if (!$this->name){
            throw new MissingNameException();
        }

        if (!$this->address){
            throw new MissingAddressException();
        }

        if (!$this->phone){
            throw new MissingPhoneException();
        }

        if (!$this->email){
            throw new MissingEmailException();
        }

        return [
            'name'    => $this->name,
            'address' => $this->address,
            'phone'   => $this->phone,
            'email'   => $this->email
        ];
    }
}