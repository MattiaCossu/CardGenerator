<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css'>
    <link rel="stylesheet" href="../../style/style.css">
    <title>Its Card</title>
</head>

<body>
    <header>
        <?php include('../components/nav.php') ?>
    </header>

    <main>
        <?php
        require_once '../class/Student.php';
        $student = new Student();
        try {
            $students = $student->displayStudents();
            if ($students) {
                foreach ($students as $student) {
                    $id = $student['id'];
                    $name = $student['first_name'];
                    $surname = $student['last_name'];
                    $date = $student['date_of_birth'];
                    $course = $student['course'];
                    $gender = $student['gender'];
                    $location = $student['location'];
        
                    include '../components/card.php';
                }
            } else {
                echo "<h3>Nessuno studente trovato.</h3>";
            }
        } catch (Exception $exception) {
            echo "<p>Errore nel recupero degli studenti: " . $exception->getMessage() . "</p>";
        }

        ?>
    </main>
    <script src="../../js/main.js"></script>
</body>

</html>