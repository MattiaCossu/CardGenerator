<?php
spl_autoload_register(function ($class_name) {
    $base_directory = __DIR__ . '/../class/';

    // general class
    $file = $base_directory . $class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }

    // validator class
    $validator_directory = $base_directory . 'validation/validator/';
    $validator_file = $validator_directory . $class_name . '.php';
    if (file_exists($validator_file)) {
        require_once $validator_file;
    }

    // field class
    $fields_directory = $base_directory . 'validation/fields/';
    $fields_file = $fields_directory . $class_name . '.php';
    if (file_exists($fields_file)) {
        require_once $fields_file;
    }
});
