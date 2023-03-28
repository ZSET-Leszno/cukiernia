<?php
    session_start();
    if($_SESSION['next'] != 5) {
        echo "Nie wykonałeś poprzedniego zadania.";
    } else {
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
Znajdź miasto klienta mieszkającego na ul. 3 maja, który nigdy nie złozył zamówienia online.<br><br>
    <form action="misja.php" method="post">
        <textarea name="quest" required></textarea><br>
        <input type="submit" value="Wyślij"> 
    </form>';

    function sprobuj($qst) {
        if ($qst != "Kościan") {
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
                $_SESSION['next'] = 6;
                // echo '<a href="misja2.php">Dalej</a>';
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