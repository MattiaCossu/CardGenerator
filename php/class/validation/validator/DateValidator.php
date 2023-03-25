<?php
require_once __DIR__ . '/../ValidatorInterface.php';

class DateValidator implements ValidatorInterface
{
    public function validate($value): bool
    {
        $date_parts = explode('-', $value);
        if (count($date_parts) !== 3) {
            $this->getError();
            return false;
        } else {
            $day = (int) $date_parts[2];
            $month = (int) $date_parts[1];
            $year = (int) $date_parts[0];
            if ($year < 1920 || $year > 2023) {
                $this->getError();
                return false;
            } elseif (!checkdate($month, $day, $year)) {
                $this->getError();
                return false;
            } else {
                return true;
            }
        } 
    }

    public function getError(): string
    {
        return 'invalid date';
    }
}