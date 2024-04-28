<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="column">Введіть кількість стовпців: </label></td>
                <td><input type="number" name="column"></td>
            </tr>
            <tr>
                <td><label for="row">Введіть кількість рядків: </label></td>
                <td><input type="number" name="row"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Генерування</button></td>
            </tr>
        </table>
    </form>
    <?php
    $column = $_POST["column"];
    $row = $_POST["row"];
    echo "<table>";
    for ($i = 0; $i < $column; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $row; $j++) {
            echo '<td style="width: 50px; height: 50px; border: 1px solid black; background-color:#' . mt_rand(100000, 999999) . '"></td>';
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>