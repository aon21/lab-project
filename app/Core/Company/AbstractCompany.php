<?php

declare(strict_types=1);

namespace App\Core\Company;

abstract class AbstractCompany
{
    protected string $name;
    protected string $address;
    protected string $phone;
    protected string $email;

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    abstract public function getDetails(): array;
}