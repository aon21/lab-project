<?php

declare(strict_types=1);

namespace App\Core\Company;

abstract class AbstractCompany
{
    public function __construct(
        protected string $name,
        protected string $address,
        protected string $phone,
        protected string $email,
    ){}

    abstract public function getDetails(): array;
}