<!DOCTYPE html>
<html>
<head>
    <title>Text Filter</title>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post">
        <textarea name="text"></textarea><br>
        <input type="text" name="bans"/><br>
        <input type="submit" value="Filter Text"/>
    </form>
    <?php
    if (isset($_POST['text']) && isset($_POST['bans'])) {
        $banned = preg_split('/[,.\s+]+/', $_POST["bans"], -1, PREG_SPLIT_NO_EMPTY);
        $text = $_POST['text'];
        foreach ($banned as $word) {
            $text = str_replace($word, str_repeat('*', strlen($word)), $text);
        }
        echo "<p>$text</p>";
    }
    ?>
</body>
</html>