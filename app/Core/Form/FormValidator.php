<?php

namespace App\Core\Form;

class FormValidator extends AbstractFormValidator
{
    public function validateRequired(string $field, string $value): void
    {
        if (empty($value)) {
            $this->addError($field, "$field field is required.");
        }
    }

    public function validateEmail(string $field, string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, "$field must be a valid email address.");
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }

    public function validateFormFields(array $formData): array
    {
        if ($formData) {
            foreach ($formData as $key => $val) {
                if ($key == 'email') {
                    $this->validateRequired($key, $val);
                    $this->validateEmail($key, $val);
                }

                $this->validateRequired($key, $val);
            }
        }
        return $this->getErrors();
    }
}