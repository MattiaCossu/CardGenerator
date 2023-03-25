<?php
require_once __DIR__ . '/../ValidatorInterface.php';

class MaxLengthValidator implements ValidatorInterface
{
    private Int $length;

    public function __construct(Int $length)
    {
        $this->length = $length;
    }

    public function validate($value): bool
    {
        //match string that start (and finish) with only letters
        //and string with only 0 or 1 empty space
        if (strlen($value) >= $this->length) {
            $this->getError();
            return false;
        } else {
            return true;
        }
    }

    public function getError(): string
    {
        return 'value too long';
    }
}