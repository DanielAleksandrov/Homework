<!DOCTYPE html>
<html>
<head>
    <title>Sentence Extractor</title>
</head>
<body>
    <form method="post">
        <textarea name="text"></textarea>
        <input type="text" name="word">
        <input type="submit">
    </form>
    <?php
    if($_POST){
        $text = $_POST['text'];
        $word = $_POST['word'];
        preg_match_all('/(\S.+?[.!?])(?=\s+|$)/', $text, $matches);
        $arr = $matches[0];
        foreach($arr as $key => $value){
            $split = preg_split('/[\s]/', $value);
            if(in_array($word,$split)){
                echo $value . "<br/>";
            }
        }
    }
    ?>
</body>
</html>

