<?php

abstract class FormField implements FormFieldInterface 
{
    private string $name;
    private array $validators;
    private string $value;
    private array $errors = [];

    public function __construct(string $name, array $validators)
    {
        $this->name = $name;
        $this->validators = $validators;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setValue(string $value): self
    {           
        $this->value = $value;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getErrors(): array
    {
        $errors = [];
        foreach ($this->errors as $error) {
            $errors[] = $error->getError();
        }
        return $errors;
    }

    public function validate(): bool 
    {
        foreach ($this->validators as $validator) {
            if (!$validator->validate($this->value)) {
                $this->errors[] = $validator;
            }
        }
        return count($this->errors) === 0;
    }
}