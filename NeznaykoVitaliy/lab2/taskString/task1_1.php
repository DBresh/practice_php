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
                <td><label for="text">Text:</label></td>
                <td><textarea type="text" name="text"></textarea></td>
            </tr>
            <tr>
                <td><label for="search">Search:</label></td>
                <td><input type="text" name="search"></td>
            </tr>
            <tr>
                <td><label for="replace">Replace:</label></td>
                <td><input type="text" name="replace"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Send</button></td>
            </tr>
            <tr>
                <td><label>Result:</label>
                </td>
                <td>
                    <?= ReplaceText() ?>
                </td>
            </tr>
        </table>
    </form>
    <?php
    function ReplaceText(): string
    {
        if (isset($_POST["text"]) && isset($_POST["search"]) && isset($_POST["replace"])) {
            $outputText = $_POST["text"];
            $searchText = $_POST["search"];
            $replaceText = $_POST["replace"];
            $value = str_replace($searchText, $replaceText, $outputText);
            return $value;
        } else {
            return "";
        }
    }
    ?>
</body>

</html>