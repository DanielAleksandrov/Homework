<!DOCTYPE html>
<html>
<head>
    <title>Text Filter</title>
</head>
<body>
    <form method="post">
        <label for="text">Text</label>
        <input type="text" id="text" name="text"> <br/>
        <label for="banlist">Banlist</label>
        <input type="text" id="banlist" name="banlist"> <br/>
        <input type="submit">
    </form>
    <?php
    if($_POST){
        $banlist = explode(', ', $_POST['banlist']);
        $text = $_POST['text'];
        foreach($banlist as $list){
            $stars = str_repeat('*', strlen($list));
            $text = str_replace($list,$stars,$text);
        }
        echo "<p>$text</p>";
    }
    ?>
</body>
</html>