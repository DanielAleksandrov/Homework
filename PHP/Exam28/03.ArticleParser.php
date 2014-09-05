<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        label, textarea {
            display: block;
        }
        textarea {
            width: 500px;
            height: 150px;
        }
    </style>
</head>
<body>
<form action="#" method="get">
    <label>Text:</label>
    <textarea name="text">The dangers of smoking%Dr. Elliot Hawking;13-06-2014-Recent research has proven that about 80% of all smokers, who smoke on a regular daily basis, are developing.</textarea>
    <input type="submit" value="SUBMIT"/>
</form>

<br>




<?php
if (!isset($_GET['text'])) die;
date_default_timezone_set("Europe/Sofia");
$items = preg_split("/\r\n/",$_GET['text'],-1,PREG_SPLIT_NO_EMPTY);

foreach ($items as $arr) {
    $isValid = true;
    $topic = '';
    $i=0;
    while ($i < strlen($arr)) {
        if ($arr[$i]=='%') {$i++; break;}
        $topic .= $arr[$i];
        $i++;
    }
    $topic = trim($topic);

    $author = '';
    while ($i < strlen($arr) ) {
        if ($arr[$i]==';') {$i++; break;}
        $author .= $arr[$i];
        $i++;

    }
    $author = trim($author);

    $date = '';
    $count=0;
    while ($i < strlen($arr)) {
        if ($arr[$i]=='-') $count++;
        if ($count==3) {$i++; break;}
        $date .= $arr[$i];
        $i++;
    }
    $date = trim($date);

    $article = '';
    while ($i < strlen($arr)) {
        if ((strlen($article)>=100)) break;
        $article .= $arr[$i];
        $i++;
    }
    $article = trim($article)."...";

    if (preg_match("/[^\w\- ]+/",$topic)) $isValid = false;
    if (preg_match("/[^\w\.\- ]+/",$author)) $isValid = false;
    //if (preg_match("/\d\d-\d\d-\d\d\d\d/",$date)) $isValid = false;
    if (preg_match("/(\d{2})\s*-\s*(\d{2})\s*-\s*(\d{4})/",$date, $tmp)>0) {
        $m =(int)$tmp[2];
        $d = (int)$tmp[1];
        $y = (int)$tmp[3];
        if (!checkdate($m, $d, $y)) $isValid = false;
        $jd=gregoriantojd($m,$d,$y);
        $month = jdmonthname($jd,1);;//date("m",strtotime($date));
    } else $isValid = false;

    if (preg_match("/\r\n/",$article)) $isValid = false;

    if ($isValid) {


        echo "<div>".PHP_EOL;
        echo "<b>Topic:</b> <span>".htmlspecialchars($topic)."</span>",PHP_EOL;
        echo "<b>Author:</b> <span>".htmlspecialchars($author)."</span>",PHP_EOL;
        echo "<b>When:</b> <span>".$month."</span>",PHP_EOL;
        echo "<b>Summary:</b> <span>".htmlspecialchars($article)."</span>",PHP_EOL;
        echo "</div>".PHP_EOL;
    }

}

?>


</body>
</html>