<!DOCTYPE html>
<html>
<head>
    <title>Word Mapper</title>
    <meta charset="UTF-8">
    <style>
        table, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form method="post">
    <textarea rows="3" cols="55" name="words"></textarea><br/>
    <input type="submit" value="Count words"/>
</form>
<br/>
<?php
if (isset($_POST["words"])) {
    if (!empty($_POST["words"])) {
        echo "<table class=\"words-table\">";
        $split = preg_split('/\W+/', $_POST["words"], 0, PREG_SPLIT_NO_EMPTY);
        $counts = array_count_values($split);
        foreach ($counts as $word => $count) {
            echo "<tr><td>$word</td><td>$count</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<div class=\"error\">No words to count.</div>";
    }
}
?>
</body>
</html>