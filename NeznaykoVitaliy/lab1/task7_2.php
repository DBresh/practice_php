<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            color: white;
        }

        body {
            background-color: black;
        }

        div {
            content: "";
            position: absolute;
            background-color: red;
            top: 20%;
            left: 35%;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="square">Введіть кількість квадратів: </label></td>
                <td><input type="number" name="square"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Генерування</button></td>
            </tr>
        </table>
    </form>
    <?php
    $countSquare = $_POST["square"];
    for ($i = 0; $i < $countSquare; $i++) {
        $size = mt_rand(20, 100);
        echo '<div style ="width:' . $size . 'px; height:' . $size . 'px;top:' . mt_rand(1, 100) . '%; left:' . mt_rand(1, 100) . '%;"></div>';
    }
    ?>
</body>

</html>