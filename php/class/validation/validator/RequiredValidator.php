<?php

class RequiredValidator implements ValidatorInterface
{
    public function validate($value): bool
    {
        if (empty($value)) {
            $this->getError();
            return false;
        } else {
            return true;
        }
    }

    public function getError(): string
    {
        return 'please enter the value';
    }
}