<?php
$input = preg_split('/\r\s+/', $_GET['list']);
$size = $_GET['maxSize'];
$arr = [];

foreach ($input as $arrIndex) {
    $arrIndex = trim($arrIndex);
    if (strlen($arrIndex) > $size) {
        $arr[] = substr($arrIndex, 0, $size) . "...";       
    } else {
        $arr[] = $arrIndex;
    }
}

echo "<ul>";
foreach ($arr as $result) {
    echo "<li>" . htmlspecialchars($result) . "</li>";
}
echo "</ul>";
?>