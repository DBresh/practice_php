<?php require_once('Function/func.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>x</td>
                <td>y</td>
            </tr>
            <tr>
                <td><input type="number" name="x"></td>
                <td><input type="number " name="y"></td>
                <td><button type="submit">=</button></td>
            </tr>
            <tr></tr>
        </table>
    </form>
    <?php require_once('calculate.php')?>
</body>

</html>