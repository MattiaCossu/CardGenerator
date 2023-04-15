<?php
if (isset($_GET['route'])) {
    $route = $_GET['route'];
    if ($route == 'students') {
        header('Location: ./php/pages/students.php');
        exit;
    } elseif ($route == 'add_student') {
        header('Location: ./php/pages/add_student.php');
        exit;
    } elseif ($route == 'home') {
        header('Location: ./php/pages/home.php');
        exit;
    } else {
        header('Location: ./php/pages/home.php');
        exit;
    }
} else {
    header('Location: ./php/pages/home.php');
    exit;
}

