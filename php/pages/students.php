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
        $studente = new Studente();
        try {
            $studenti = $studente->displayStudents();
            if ($studenti) {
                foreach ($studenti as $studente) {
                    $id = $studente['id'];
                    $name = $studente['first_name'];
                    $surname = $studente['last_name'];
                    $date = $studente['date_of_birth'];
                    $course = $studente['course'];
                    $gender = $studente['gender'];
                    $location = $studente['location'];
        
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