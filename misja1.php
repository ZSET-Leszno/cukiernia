<?php
    session_start();
    $_SESSION['cookieval'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misja pierwsza</title>
    <link rel="stylesheet" href="misje.css">
</head>
<body>
    <div id="container">
        <div id="main-1">
            <div class="fade-in">
                Dostałeś zlecenie na zhackowanie ocen z informatyki w dzienniku elektronicznym.<br>
                Muszę sprawdzić czy nadajesz się do tego zadania.
            </div><br>
            <div class="fade-in2">
                Wypisz z tabeli "klienci" imię osoby o nazwisku Słowiański.
            </div><br><br>
            
            <form action="misja1.php" method="post">
                <textarea name="quest" required></textarea><br>
                <input type="submit" value="Wyślij"> 
            </form><br><br>
        </div>
        <div id="main-2">
            <p class="fade-in">Struktura bazy danych</p><br><br>
            <img src="baza.PNG" class="fade-in2">
        </div>
    </div>
    <?php
    function sprobuj($qst) {
        if ($qst != "Stanisław") {
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
                echo '<p style="margin-top: 3.5rem; color: rgb(81, 255, 0);">Udało ci się! Przeszedłeś tę przeszkodę. Możesz przejść do następnego zadania.</p><br><br>';
                $_SESSION['next'] = 1;
                $_SESSION['cookieval'] = 1;
                echo '<a href="cookies.php">Dalej</a>';
            }
        }    
    }
    catch (Exception $error) {
        echo 'Wystąpił błąd, spróbuj ponownie';
    }

    mysqli_close($conn);
    ?>
</body>
</html>