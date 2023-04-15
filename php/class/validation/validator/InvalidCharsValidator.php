<?php

class InvalidCharsValidator implements ValidatorInterface
{
    // validate string like name, surname, etc..

    public function validate($value): bool
    {
        //match string that start (and finish) with only letters
        //and string with only 0 or 1 empty space
        if (!preg_match('/^[a-zA-Z]+[ ]?[a-zA-Z]+$/', $value)) {
            $this->getError();
            return false;
        } else {
            return true;
        }
    }

    public function getError(): string
    {
        return 'invalid characters';
    }
}