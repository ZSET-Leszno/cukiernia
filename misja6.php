<?php
    session_start();
    if(@$_SESSION['next'] < 5) {
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
            <a href="misja5.php">
                <button id="back">Powrót</button>
            </a>
        </div>
        </body>';
    } else {
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misja szósta</title>
    <link rel="stylesheet" href="misje.css">
</head>
<body>
    <div id="container">
        <div id="main-1">
            <div class="fade-in">
                Jesteś już w środku. Teraz wystarczy włamać się do systemu operacyjnego, który
                zabezpieczony jest hasłem. Hasło jest wynikiem zapytania:<br><br>
            </div>
            <div class="fade-in2">
                Znajdź miasto klienta
                mieszkającego na ul. 3 maja, który nigdy nie złożył zamówienia online.<br><br>
            </div>
            <form action="misja6.php" method="post">
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
        if ($qst != 'Kościan') {
            echo ("Wynik zapytania nie jest poprawny.");
            if ($_SESSION['cookieval'] >= 6) {
                echo '<br>Wykonałeś już to zadanie.';
                echo '<a href="cookies.php">Dalej</a>';
            }
        } else {
            echo '<p style="margin-top: 3.5rem; color: rgb(81, 255, 0);">Super! Przed Tobą ostatni krok.<br>';
            $_SESSION['next'] = 6;
            $_SESSION['cookieval'] = 6;
            echo '<a href="cookies.php">Dalej</a>';
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
            }
        }    
    }
    catch (Exception $error) {
        echo 'Wystąpił błąd, spróbuj ponownie';
        if ($_SESSION['cookieval'] >= 6) {
            echo '<br>Wykonałeś już to zadanie.';
            echo '<a href="cookies.php">Dalej</a>';
        }
    }

    mysqli_close($conn);
echo '</body>
</html>';
    }
?>