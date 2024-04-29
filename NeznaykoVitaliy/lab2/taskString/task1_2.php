<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="city">City:</label></td>
                <td><input type="text" name="city"></input></td>
            </tr>

            <td></td>
            <td><button type="submit">Send</button></td>
            </tr>
        </table>
    </form>
    <?php
    $city = $_POST["city"];
    $city = explode(" ", $city);
    sort($city);
    $city = implode(" ", $city);
    echo $city;
    ?>
</body>

</html>