<!DOCTYPE html>
<html>
<head>
    <title>URL Replacer</title>
</head>
<body>
    <form method="post">
        <input type="text" name="text">
    </form>
    <?php
    if (isset($_POST['text'])) {
        $text = ($_POST['text']);
        $text = str_replace('</a>', '[/URL]', $text);
        $text = preg_replace('/<a href="(.*?)">/', '[URL=\1]', $text);
        echo htmlentities($text);
    }
    ?>
</body>
</html>