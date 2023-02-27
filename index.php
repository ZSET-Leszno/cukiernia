<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <textarea name="tak"></textarea><br>
        <input type="submit" name='a' value='Wyślij'> 
    </form>
    <?php
    
    $conn = mysqli_connect('localhost','root','','cukiernia');

    if(!$conn) {
        echo 'bullshit';
    }

    $tak = $_POST['tak'];
    if (!$tak) {
        echo "Nie wprowadziłeś żadnych danych!";
    }

    $aye = mysqli_query($conn,"$tak");

    if (!@$aye) {
        null;
    } else {
        // $count = mysqli_num_rows($aye);
        // $i = 0;

        // while($i < $count) {
        //     $i++;
        //     $ay = mysqli_fetch_array($aye);
        //     echo "$ay[0], $ay[1], $ay[2], $ay[3], $ay[4], $ay[5], $ay[6], $ay[7]<br>";
        // }
        $ay = mysqli_fetch_array($aye);
        $odp = 3202;
        if ($ay[0] == $odp) {
            echo "Gratulacje użytkowniku, odnalazłeś hasło, a brzmi ono: $odp.";
        } else {
            echo "To niepoprawna odpowiedź, spróbuj ponownie.";
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>