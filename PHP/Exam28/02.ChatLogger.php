<?php
if (!isset($_GET['currentDate']) || !isset($_GET['messages']) ) die;

date_default_timezone_set("Europe/Sofia");
$messages = preg_split("/\s*\r\n\s*/",$_GET['messages'],-1,PREG_SPLIT_NO_EMPTY);
$currDate = date_create_from_format("d-m-Y H:i:s",$_GET['currentDate']);
$crt = strtotime($_GET['currentDate']);
$chat = [];
foreach ($messages as $item) {
    $tmp = preg_split("/\//",$item,-1,PREG_SPLIT_NO_EMPTY);
    $chat[(trim($tmp[1]))] = trim($tmp[0]);
}
ksort($chat);
foreach ($chat as $arrIndex) {
    echo "<div>".htmlspecialchars($arrIndex)."</div>\r\n";
}
end($chat);
$str = key($chat);
$lastTime =  date_create_from_format("d-m-Y H:i:s",$str);
$lst = strtotime($str);
$diff = date_diff($lastTime, $currDate);
reset($chat);
$timeInfo = '';

$days = abs($lastTime->format("d") - $currDate->format("d"));
if ($days>1) {$timeInfo = $lastTime->format("d-m-Y");}
elseif ($days==1) {$timeInfo = "yesterday";}
else {
    $delay = $crt - $lst;
    if ($delay>=3600) {$timeInfo = (int)($delay / 3600)." hour(s) ago";}
    elseif ($delay>60) {$timeInfo = (int)($delay / 60)." minute(s) ago";}
    else {$timeInfo = "a few moments ago";}

}

echo "<p>Last active: <time>".($timeInfo)."</time></p>";
