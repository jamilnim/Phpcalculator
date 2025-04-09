

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculator</h1>
    <form action="" method="post">
    <input type="number" class="num1" name="num1">
    <input type="number" class="num2" name="num2">

    <input type="submit" name="add" value="+">
    <input type="submit" name="sub" value="-">
    <input type="submit" name="multi" value="X">
    <input type="submit" name="devid" value="/">

    <?php
    $result=" ";
    if (isset($_POST['add'])){
        $num1=$_POST['num1'];
        $num2=$_POST['num2'];
        $result=$num1+$num2;
    } elseif (isset($_POST['sub'])){
        $num1=$_POST['num1'];
        $num2=$_POST['num2'];
        $result=$num1-$num2;
    }elseif (isset($_POST['multi'])){
        $num1=$_POST['num1'];
        $num2=$_POST['num2'];
        $result=$num1*$num2;
    }elseif (isset($_POST['devid'])){
        $num1=$_POST['num1'];
        $num2=$_POST['num2'];
        $result=$num1/$num2;
    }
    ?>
    <h2>  result:<?php echo $result; ?> </h2>

    </form>
</body>
</html>