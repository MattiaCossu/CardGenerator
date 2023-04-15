<?php
spl_autoload_register(function ($class) {
    $base_directory = __DIR__ . '/class/';

    $file = $base_directory . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }

    $validator_directory = $base_directory . 'validation/validator/';
    $validator_file = $validator_directory . $class . '.php';
    if (file_exists($validator_file)) {
        require_once $validator_file;
    }

    $fields_directory = $base_directory . 'validation/fields/';
    $fields_file = $fields_directory . $class . '.php';
    if (file_exists($fields_file)) {
        require_once $fields_file;
    }

    $validation_directory = $base_directory . 'validation/';
    $validation_file = $validation_directory . $class . '.php';
    if (file_exists($validation_file)) {
        require_once $validation_file;
    }
});