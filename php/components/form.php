<?php
require_once '../autoloader.php';

$corses = ['mechanics', 'information-technology', 'biotechnology', 'food-and-beverage', 'tourism', 'marketing-and-administration', 'construction', 'energy-efficiency'];
$gender = ['male', 'female'];
$location = ['perugia', 'terni'];

$formFields = [
    $firstNameFormField = new TextInputField(
        'name',
        [new RequiredValidator(), new InvalidCharsValidator(), new MaxLengthValidator(100), new MinLengthValidator(2)]
    ),
    $lastNameFormField = new TextInputField(
        'surname',
        [new RequiredValidator(), new InvalidCharsValidator(), new MaxLengthValidator(100), new MinLengthValidator(2)]
    ),
    $dateFormField = new DateField(
        'date',
        [new DateValidator()]
    ),
    $courseFormField = new SelectField(
        'courses',
        [new ChoiceValidator($corses)],
        $corses
    ),
    $genderFormField = new RadioButtonField(
        'gender',
        [new ChoiceValidator($gender)],
        $gender
    ),
    $locationFormField = new SelectField(
        'location',
        [new ChoiceValidator($location)],
        $location
    )
];

$formValidator = new FormValidator(
    'student-form',
    $formFields
);

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p class='success'>Studente inserito con successo!</p>";
    exit;
} elseif (isset($_GET['error'])) {
    echo "<p class='error'>Errore nell'inserimento dello studente: " . urldecode($_GET['error']) . "</p>";
    exit;
}

if (isset($_POST['SubmitButton'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $formValidator->setFieldsValue($_POST);
        
        if($formValidator->validate()) {
            $student = new Student();

            try {
                $result = $student->insertStudent(($formValidator->getValues()));
                if ($result) {
                    header('Location: ../pages/add_student.php?success=1');
                } else {
                    header('Location: ../pages/add_student.php?success=1');
                }
            } catch (Exception $exception) {
                header('Location: index.php?error=' . urlencode($exception->getMessage()));
            }
        } 
    }
}
?>

<div class="container">
    <div class="container__head">
        <h2>Enter a student</h2>
        <p>this will generate the new student card</p>
    </div>
    <div class="container__main">
        <?php
            echo($formValidator->render())
        ?>
    </div>
</div>