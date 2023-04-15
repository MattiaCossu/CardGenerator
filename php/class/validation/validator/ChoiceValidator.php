<?php

class ChoiceValidator implements ValidatorInterface
{
    private array $choices;

    public function __construct(array $choices)
    {
        $this->choices = $choices;
    }

    public function validate($value): bool
    {
        if (!in_array($value, $this->choices)) {
            $this->getError();
            return false;
        } else {
            return true;
        }
    }

    public function getError(): string
    {
        return 'invalid choice';
    }
}
