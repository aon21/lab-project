<?php

declare(strict_types=1);

namespace App\Core\Company;

interface CompanyDetailsInterface {
    public function getDetails(): array;
}