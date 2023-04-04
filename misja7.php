<?php
    session_start();
    if($_SESSION['next'] < 6) {
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
            <a href="misja6.php">
                <button id="back">Powrót</button>
            </a>
        </div>
        </body>';
    } else {
        $_SESSION['cookieval'] = 6;
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misja siódma</title>
    <link rel="stylesheet" href="misje.css">
</head>
<body>
    <div id="container">
        <div id="main-1">
            <div class="fade-in">
                Musisz dostać się do dziennika elektronicznego. Wiemy, że
                nauczyciel do logowania używa maila <b>informatyk@fajna-szkola.pl</b>. Teraz należy podać hasło,
                które jest wynikiem zapytania:<br><br>
            </div>
            <div class="fade-in2">
                Musisz skontaktować się z jednym z klientów. Znajdź jego
                numer telefonu w tabeli &quot;klienci&quot;. Osoba której szukasz miała wykonane zamówienie 20
                lutego. Użyj połączeń tabeli.<br><br>
            </div>
            <form action="misja7.php" method="post">
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
                echo '<div class="fade-in">
                    <p style="font-size: 24px; margin-top: 3.5rem; color: rgb(81, 255, 0);"><b>GRATULACJE!!</b></p>
                </div><br><br>
                <div class="fade-in2">
                    <p style="font-size: 16px; margin-top: 3.5rem; color: rgb(81, 255, 0);">Udało Ci się zmienić ocenę w dzienniku. Dzięki Tobie Szymon będzie mógł pójść na
                    wymarzone studia.</p>';
                // $_SESSION['next'] = 7;
                //echo '<a href="cookies.php">Dalej</a>';
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