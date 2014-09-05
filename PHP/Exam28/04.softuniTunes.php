<?php
if (!isset($_GET['text'])) die;

$data = preg_split("/\r\n/",$_GET['text'],-1,PREG_SPLIT_NO_EMPTY);
$artist = $_GET['artist'];
$prop = $_GET['property'];
$order = $_GET['order']=='ascending' ? 'SORT_ASC' : 'SORT_DESC';

foreach ($data as $el) {
    $tmp = preg_split("/\s*\|\s*/",$el,-1,PREG_SPLIT_NO_EMPTY);
    $srt = preg_split("/\s*\,\s*/",$tmp[2],-1,PREG_SPLIT_NO_EMPTY);
    sort($srt); //artists
    if (in_array($artist,$srt)) {
    $name[] = $tmp[0];
    $genre[] = $tmp[1];
    $artists[] = $srt;
    $downloads[] = (int)$tmp[3];
    $rating[] = $tmp[4];
    }
}
$toSort = [];
$tmp = $$prop;
$br = array_count_values($tmp);
$keys = array_keys($br);
for ($i = 0; $i < count($tmp); $i++) {
    if ($br[$tmp[$i]]>1)
        $toSort[] = $tmp[$i].$name[$i];
    else $toSort[] = $tmp[$i];
}

if ($order == 'ascending')
    array_multisort($toSort,SORT_DESC,$name,$genre,$artists,$downloads,$rating);
else
    array_multisort($toSort,SORT_ASC,$name,$genre,$artists,$downloads,$rating);


echo "<table>".PHP_EOL;
echo "<tr><th>Name</th><th>Genre</th><th>Artists</th><th>Downloads</th><th>Rating</th></tr>".PHP_EOL;
for ($i = 0; $i < count($name); $i++) {
    echo "<tr><td>{$name[$i]}</td><td>{$genre[$i]}</td><td>".implode(', ',$artists[$i])."</td><td>{$downloads[$i]}</td><td>{$rating[$i]}</td></tr>".PHP_EOL;
}
echo "</table>";


