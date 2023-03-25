<?php

class FormField {
    private string $name;
    private array $validators;
    private string $value;
    private array $errors = [];

    public function getName(): string
    {
        return $this->name;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function __construct(string $name, array $validators)
    {
        $this->name = $name;
        $this->validators = $validators;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function validate(): bool {
        foreach ($this->validators as $validator) {
            if (!$validator->validate($this->value)) {
                $this->errors[] = $validator;
            }
        }
        return count($this->errors) === 0;
    }
}