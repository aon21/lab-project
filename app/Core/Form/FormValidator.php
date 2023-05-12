<?php

namespace App\Core\Form;

class FormValidator extends AbstractFormValidator
{
    public function validateRequired($field, $value): void
    {
        if (empty($value)) {
            $this->addError($field, "$field field is required.");
        }
    }

    public function validateEmail($field, $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, "$field must be a valid email address.");
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function addError($field, $message): void
    {
        $this->errors[$field] = $message;
    }

    public function validateFormFields($formData): array
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