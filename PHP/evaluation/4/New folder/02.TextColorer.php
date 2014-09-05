<!DOCTYPE html>
<html>
<head>
    <title>Text Colorer</title>
</head>
<body>
    <form method="post">
        <input type="text" name="text">
        <input type="submit">
    </form>
    <?php
        if($_POST){
            $text = $_POST['text'];
            for ($i = 0; $i < strlen($text); $i++) {
                if (ord($text[$i]) % 2 == 0) {
                    echo "<span style='color: red'>$text[$i] </span>";
                } else {
                    echo "<span style='color: blue'>$text[$i] </span>";
                }
            }
        }
    ?>
</body>
</html>