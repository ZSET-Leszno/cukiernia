<?php
    session_start();
    if($_SESSION['next'] < 3) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Misja trzecia</title>
            <link rel="stylesheet" href="misje.css">
        </head>
        <body>
        <div class="fade-in">
            Nie wykonałeś poprzedniego zadania.<br><br>
        </div>
        <div class="fade-in2">
            <a href="misja3.php">
                <button id="back">Powrót</button>
            </a>
        </div>
        </body>';
    } else {
        $_SESSION['cookieval'] = 3;
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misja czwarta</title>
    <link rel="stylesheet" href="misje.css">
</head>
<body>
    Potrzebujesz skontaktować się z jednym z klientów. Znajdź jego numer telefonu w tabeli "klienci". Osoba której szukasz miała wykonane zamówienie 20 lutego. Użyj połączeń tabeli.<br><br>
    <form action="misja4.php" method="post">
        <textarea name="quest" required></textarea><br>
        <input type="submit" value="Wyślij"> 
    </form>';

    function sprobuj($qst) {
        if ($qst != 199267094) {
            throw new Exception("Lekka kraksa");
        }
    }
    
    $conn = mysqli_connect('localhost','root','','cukiernia');

    if(!$conn) {
        echo 'Wystąpił bląd podczas komunikacji z serwerem. Spróbuj ponownie później.';
    }

    @$quest = $_POST['quest'];

    try {
        if($quest) {
            $zapytanie = mysqli_query($conn,"$quest");
            if (!$zapytanie) {
                throw new Exception($zapytanie->error);
            } else {
                $qst = mysqli_fetch_array($zapytanie);
                sprobuj($qst[0]);
                echo 'Udało ci się! Przeszedłeś tę przeszkodę. Możesz przejść do następnego zadania.<br><br>';
                $_SESSION['next'] = 4;
                $_SESSION['cookieval'] = 4;
                echo '<a href="cookies.php">Dalej</a>';
            }
        }    
    }
    catch (Exception $error) {
        echo 'Wystąpił błąd, spróbuj ponownie';
    }

    mysqli_close($conn);
echo '</body>
</html>';
    }
?>