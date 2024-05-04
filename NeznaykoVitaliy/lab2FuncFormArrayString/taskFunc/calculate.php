<?php
require_once('Function/func.php');
$x = $_POST["x"];
$y = $_POST["y"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>x^y</td>
            <td>x!</td>
            <td>sin(x)</td>
            <td>cos(x)</td>
            <td>tg(x)</td>
        </tr>
        <tr>
            <td><?= calcPower($x, $y) ?></td>
            <td><?= calcfactorial($x) ?></td>
            <td><?= calcSin($x) ?></td>
            <td><?= calcCos($x) ?></td>
            <td><?= calcTg($x) ?></td>
        </tr>
    </table>
</body>

</html>