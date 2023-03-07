<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Wypisz z tabeli "klienci" imię osoby o nazwisku Słowiański.<br><br>
    <form action="misja1.php" method="post">
        <textarea name="quest" required></textarea><br>
        <input type="submit" value="Wyślij"> 
    </form>
    <?php
    $cooknam = 'Sesja';
    $cookval = 1;
    setcookie($cooknam,$cookval,time() + (86400 * 30), "/");

    if(!isset($_COOKIE[$cooknam])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }

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
                echo "Udało ci się! Przeszedłeś tę przeszkodę";
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