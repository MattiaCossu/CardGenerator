<?php

require_once 'FormValidator.php';

class StudentFormValidator extends FormValidator {
    private $first_name;
    private $last_name;
    private $date_of_birth;
    private $course;
    private $gender;
    private $location;

    public function __construct($data) {
        $this->first_name = $data['first-name'];
        $this->last_name = $data['last-name'];
        $this->date_of_birth = $data['date-of-birth'];
        $this->course = $data['course'];
        $this->gender = $data['gender'];
        $this->location = $data['location'];
    }

    public function validate() {
        $this->validateRequired('First Name', $this->first_name);
        $this->validateRequired('Last Name', $this->last_name);
        $this->validateRequired('Date of Birth', $this->date_of_birth);
        $this->validateRequired('Course', $this->course);
        $this->validateRequired('Gender', $this->gender);
        $this->validateRequired('Location', $this->location);

        $this->validateMinLength('First Name', $this->first_name, 3);
        $this->validateMinLength('Last Name', $this->last_name, 3);

        $this->validateMaxLength('First Name', $this->first_name, 50);
        $this->validateMaxLength('Last Name', $this->last_name, 50);

        $this->validateDate('Date of Birth', $this->date_of_birth);

        if (!in_array($this->course, ['mechatronics', 'information-technology', 'biotechnology', 'food-and-beverage', 'tourism', 'marketing-and-administration', 'construction', 'energy-efficiency'])) {
            $this->addError('Course', 'The selected course is not valid');
        }

        if (!in_array($this->gender, ['male', 'female'])) {
            $this->addError('Gender', 'The selected gender is not valid');
        }

        if (!in_array($this->location, ['perugia', 'terni'])) {
            $this->addError('Location', 'The selected location is not valid');
        }

        return empty($this->errors);
    }
}
