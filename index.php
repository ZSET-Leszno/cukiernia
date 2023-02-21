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

    $aye = mysqli_query($conn,"$tak");

    if (!$aye) {
        null;
    } else {
        $count = mysqli_num_rows($aye);
        $i = 0;

        while($i < $count) {
            $i++;
            $ay = mysqli_fetch_array($aye);
            echo $ay;
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>