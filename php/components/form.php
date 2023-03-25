<?php
require_once '../class/Student.php';
require_once '../class/validation/FormValidator.php';
require_once '../class/validation/FormField.php';
require_once '../class/validation/validator/DateValidator.php';
require_once '../class/validation/validator/InvalidCharsValidator.php';
require_once '../class/validation/validator/MaxLengthValidator.php';
require_once '../class/validation/validator/MinLengthValidator.php';
require_once '../class/validation/validator/RequiredValidator.php';
require_once '../class/validation/validator/ChoiceValidator.php';


if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p class='success'>Studente inserito con successo!</p>";
    exit;
} elseif (isset($_GET['error'])) {
    echo "<p class='error'>Errore nell'inserimento dello studente: " . urldecode($_GET['error']) . "</p>";
    exit;
}

$temp = array();
if (isset($_POST['SubmitButton'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $formFields = [
            $firstnameFormField = new FormField(
                'firstname',
                [new RequiredValidator(), new InvalidCharsValidator(), new MaxLengthValidator(100), new MinLengthValidator(2)]
            ),
            $lastnameFormField = new FormField(
                'surname',
                [new RequiredValidator(), new InvalidCharsValidator(), new MaxLengthValidator(100), new MinLengthValidator(2)]
            ),
            $dateFormField = new FormField(
                'date',
                [new DateValidator()]
            ),
            $courseFormField = new FormField(
                'course',
                [new ChoiceValidator(['mechatronics', 'information-technology', 'biotechnology', 'food-and-beverage', 'tourism', 'marketing-and-administration', 'construction', 'energy-efficiency'])]
            ),
            $genderFormField = new FormField(
                'gender',
                [new ChoiceValidator(['male', 'female'])]
            ),
            $locationFormField = new FormField(
                'location',
                [new ChoiceValidator( ['perugia', 'terni'])]
            )
        ];

        $firstnameFormField->setValue($_POST['first-name']);
        $lastnameFormField->setValue($_POST['last-name']);
        $dateFormField->setValue($_POST['date-of-birth']);
        $courseFormField->setValue($_POST['course']);
        $genderFormField->setValue($_POST['gender']);
        $locationFormField->setValue($_POST['location']);

        $formValidator = new FormValidator(
            'student-form',
            $formFields
        );

        if($formValidator->validate()) {
            $first_name = $_POST['first-name'];
            $last_name = $_POST['last-name'];
            $date_of_birth = $_POST['date-of-birth'];
            $course = $_POST['course'];
            $gender = $_POST['gender'];
            $location = $_POST['location'];

            $student = new Studente();

            try {
                $result = $student->insertStudent($first_name, $last_name, $date_of_birth, $course, $gender, $location);
                if ($result) {
                    header('Location: ../pages/add_student.php?success=1');
                } else {
                    header('Location: ../pages/add_student.php?success=1');
                }
            } catch (Exception $exception) {
                header('Location: index.php?error=' . urlencode($exception->getMessage()));
            }
        } else {
            foreach ($formValidator->getErrors() as $formField) {
                ?>
                <div class="error">
                <?php
                echo '<p class="field-name">' . $formField->getName() . '</p>';
                foreach ($formField->getErrors() as $validator) {
                    echo '<p>' . $validator->getError() . '</p>';
                }
                ?>
                </div>
                <?php
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
        <form action="#" method="POST">
            <div>
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>
            <div>
                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" required>
            </div>

            <div>
                <label for="date-of-birth">Date of Birth:</label>
                <input type="date" id="date-of-birth" name="date-of-birth" required>
            </div>

            <div>
                <label for="course">Course:</label>
                <select id="course" name="course" required>
                    <option value="" disabled selected>Select Course</option>
                    <option value="mechatronics">Mechatronics</option>
                    <option value="information-technology">Information & Communication Technology</option>
                    <option value="biotechnology">Biotechnology</option>
                    <option value="food-and-beverage">Agroalimentary</option>
                    <option value="tourism">Tourism</option>
                    <option value="marketing-and-administration">Marketing & Administration</option>
                    <option value="construction">Construction</option>
                    <option value="energy-efficiency">Energy Efficiency</option>
                </select>
            </div>

            <div>
                <label for="gender">Gender:</label>
                <div style="padding-top: 0">
                    <label for="male">
                        <input type="radio" id="male" name="gender" value="male" required>Male
                    </label>
                    <label for="female">
                        <input type="radio" id="female" name="gender" value="female" required>Female
                    </label>
                </div>
            </div>

            <div>
                <label for="location">Location:</label>
                <select id="location" name="location" required>
                    <option value="perugia">Perugia</option>
                    <option value="terni">Terni</option>
                </select>
            </div>

            <span class="divider"></span>

            <div style="padding: 0;">
                <button type="submit" name="SubmitButton">Submit</button>
            </div>
        </form>

    </div>
</div>