<?php

class FormValidator {
    private string $name;
    private array $formFields = [];
    private array $errors = [];

    public function __construct(string $name, array $formFields)
    {
        $this->name = $name;
        $this->formFields = $formFields;
    }

    public function addField(FormField $formField): self
    {
        $this->formFields[] = $formField;

        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getFields(): array
    {
        return $this->formFields;
    }

    public function getErrorsByField(string $fieldName): array
    {
        $errors = [];
        foreach ($this->errors as $error) {
            if ($error->getName() === $fieldName) {
                foreach ($error->getErrorByValidator() as $error) {
                    $errors[] = $error;
                }
            }
        }
        return $errors;
    }

    public function validate(): bool
    {
        foreach ($this->formFields as $formField) {
            if (!$formField->validate()) {
                $this->errors[] = $formField;
            }
        }
        return count($this->errors) === 0;
    }
}