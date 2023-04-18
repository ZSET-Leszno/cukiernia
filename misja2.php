<?php
    session_start();
    if(@$_SESSION['next'] < 1) {
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
            <a href="misja1.php">
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
    <title>Misja druga</title>
    <link rel="stylesheet" href="misje.css">
</head>
<body>
    <div id="container">
        <div id="main-1">
            <div class="fade-in">
            Brawo, pierwszy test za Tobą. Teraz drugi.<br><br>
            </div>
            <div class="fade-in2">
            Sprawdź ile osób jest fanem Shreka. Policz rekordy z tabeli &quot;szczegóły&quot; w których
            zawartość posiada &quot;Tort Shrek&quot;. Użyj połączeń tabel.<br><br>
            </div>
            <form action="misja2.php" method="post">
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
        if ($qst != 3) {
            echo ("Wynik zapytania nie jest poprawny.");
            if ($_SESSION['cookieval'] >= 2) {
                echo '<br>Wykonałeś już to zadanie.';
                echo '<a href="cookies.php">Dalej</a>';
            }
        } else {
            echo '<p style="margin-top: 3.5rem; color: rgb(81, 255, 0);">Świetnie, widzę, że nadajesz się do tej roboty</p><br><br>';
            $_SESSION['next'] = 2;
            $_SESSION['cookieval'] = 2;
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
        if ($_SESSION['cookieval'] >= 2) {
            echo '<br>Wykonałeś już to zadanie.';
            echo '<a href="cookies.php">Dalej</a>';
        }
    }

    mysqli_close($conn);
echo '</body>
</html>';
    }
?>