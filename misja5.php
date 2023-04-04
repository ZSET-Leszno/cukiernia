<?php
    session_start();
    if($_SESSION['next'] < 4) {
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
            <a href="misja4.php">
                <button id="back">Powrót</button>
            </a>
        </div>
        </body>';
    } else {
        $_SESSION['cookieval'] = 4;
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misja piąta</title>
    <link rel="stylesheet" href="misje.css">
</head>
<body>
    <div id="container">
        <div id="main-1">
            <div class="fade-in">
                Niestety, drzwi do serwerowni są zamknięte zamkiem
                elektronicznym. Aby otworzyć drzwi należy podać kod PIN, który jest wynikiem zapytania:<br><br>
            </div>
            <div class="fade-in2">
                Zostałeś wyznaczony do rozliczenia się z klientem. Masz za zadanie sprawdzić z tabeli
                &quot;zamówienia&quot; ile wynosi cena dostawy. Niestety zapomniałeś gdzie mieszkał klient a twoją
                jedyną wskazówką jest kartka z wypisanymi nazwami ulicy &quot;Jana Sobieskiego&quot; i &quot;3 Maja&quot;
                oraz numerami domów &quot;33&quot;, &quot;28&quot;, &quot;10&quot;. Do sprawdzenia bazy danych użyj połączeń tabeli.<br><br>
            </div>
            <form action="misja5.php" method="post">
                <textarea name="quest" required></textarea><br>
                <input type="submit" value="Wyślij"> 
            </form><br><br>
        </div>
        <div id="main-2">
            <p class="fade-in">Struktura bazy danych</p><br><br>
            <img src="baza.PNG" class="fade-in2">
        </div>
    </div>';

    function sprobuj($qst) {
        if ($qst != 12.59) {
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
                $_SESSION['next'] = 5;
                $_SESSION['cookieval'] = 5;
                echo '<p style="margin-top: 3.5rem; color: rgb(81, 255, 0);">Udało ci się! Przeszedłeś tę przeszkodę. Możesz przejść do następnego zadania.<br>';
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