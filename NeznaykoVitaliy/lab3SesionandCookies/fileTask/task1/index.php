<?php

function WriteContentsInFile($filename, $name, $comment)
{
    file_put_contents($filename, "$name:$comment\n", FILE_APPEND);
}
function GetContentInFile($filename): array
{
    $comments_data = file_get_contents($filename);
    $comments_data = explode("\n", $comments_data);
    array_pop($comments_data);
    $nameandCommentsarr = [];
    foreach ($comments_data as $comment) {
        $comment = explode(":", $comment);
        for ($i = 0; $i < count($comment); $i++) {
            $nameandCommentsarr[] = $comment[$i];
        }
    }
    return $nameandCommentsarr;
}
?>
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
                <td>Ім'я</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Коментар</td>
                <td><input type="text" name="comment" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Send</button></td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $filePath = "comments.txt";
        WriteContentsInFile($filePath, $name, $comment);
        $comments = GetContentInFile($filePath);
    }

    if (!empty($comments)) :
    ?>
        <table>
            <tr>
                <td>Ім'я</td>
                <?php
                for ($i = 0; $i < count($comments); $i++) {
                    if ($i % 2 == 0) {
                        echo "<td>{$comments[$i]}</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <td>Коментар</td>
                <?php
                for ($i = 0; $i < count($comments); $i++) {
                    if ($i % 2 != 0) {
                        echo "<td>{$comments[$i]}</td>";
                    }
                }
                ?>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>