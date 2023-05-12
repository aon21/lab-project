<?php

namespace App\Core\Form;

abstract class AbstractFormValidator {
    protected array $errors = [];

    protected function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    abstract public function validateFormFields(array $formData);
}