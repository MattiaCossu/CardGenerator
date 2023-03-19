<?php

abstract class FormValidator
{
    protected $errors = [];

    abstract public function validate();

    public function getErrors()
    {
        return $this->errors;
    }

    protected function addError($field, $message)
    {
        $this->errors[$field] = $message;
    }

    protected function validateRequired($field, $value)
    {
        if (empty($value)) {
            $this->addError($field, "The $field field is required");
        }
    }

    protected function validateMinLength($field, $value, $length)
    {
        if (strlen($value) < $length) {
            $this->addError($field, "The $field field must be at least $length characters long");
        }
    }

    protected function validateMaxLength($field, $value, $length)
    {
        if (strlen($value) > $length) {
            $this->addError($field, "The $field field must be no more than $length characters long");
        }
    }

    protected function validateDate($field, $value)
    {
        $date_parts = explode('-', $value);
        echo $value;
        if (count($date_parts) !== 3) {
            $this->addError($field, "The $field field must be a valid date in the format DD/MM/YYYY");
            return;
        }
        $day = (int) $date_parts[2];
        $month = (int) $date_parts[1];
        $year = (int) $date_parts[0];
        if (!checkdate($month, $day, $year)) {
            $this->addError($field, "The $field field must be a valid date in the format DD/MM/YYYY");
        }
    }
}
