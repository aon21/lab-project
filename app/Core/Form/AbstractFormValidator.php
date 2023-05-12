<?php

namespace App\Core\Form;

abstract class AbstractFormValidator {
    protected array $errors = [];

    protected function addError($field, $message): void
    {
        $this->errors[$field] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    abstract public function validateFormFields($formData);
}