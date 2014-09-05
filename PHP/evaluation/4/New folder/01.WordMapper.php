<!DOCTYPE html>
<html>
<head>
    <title>Word Mapper</title>
</head>
<body>
    <form method="post">
        <input type="text" name="text">
        <input type="submit" name="submit">
    </form>
    <table border="1">
        <?php
        if($_POST){
            $text = preg_split('/[\W+\s]/', strtolower($_POST['text']));
            $text = array_filter($text);
            $word = array_count_values($text);
            arsort($word);
            foreach($word as $key => $value){
                if(!is_numeric($key)){
                    echo "<tr><td>$key</td>
                              <td>$value</td>
                          </tr>";
                }
            }
        }
        ?>
    </table>
</body>
</html>