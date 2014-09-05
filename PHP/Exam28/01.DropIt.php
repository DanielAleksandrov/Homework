<?php
if (!isset($_GET['text']) || !isset($_GET['minFontSize']) || !isset($_GET['maxFontSize']) || !isset($_GET['step']) ) die;

$arr = $_GET['text'];
$min = (int)$_GET['minFontSize'];
$max = (int)$_GET['maxFontSize'];
$step = (int)$_GET['step'];
$len = strlen($arr);

$fontSize = $min;
$strike = ["text-decoration:line-through;",""];
for ($i = 0; $i < $len; $i++) {
    $char = htmlspecialchars($arr[$i]);
    echo "<span style='font-size:".$fontSize.";".$strike[ord($char)%2]."'>$char</span>";
    if ( ctype_alpha($char) ) {
        $fontSize += $step;
        if ($fontSize>=$max || $fontSize<=$min ) $step *= -1;
    }

}
?>
