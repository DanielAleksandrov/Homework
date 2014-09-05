<?php

$arr = $_GET['text'];
$duljina = $_GET['lineLength'];

while (strlen($arr) % $duljina !== 0) {
    $arr .= " ";
}

$h = 0;

for ($i = 0, $lenght = strlen($arr), $uvelichenie = 0; $i < $lenght; $i++) {
    if ($i % $duljina === 0 && $i !== 0) {
        $uvelichenie++;
    }

    $m[$uvelichenie][] = $arr[$i];

    $h = $uvelichenie + 1;
}

$ContentR = [];

for ($x = 0; $x < $duljina; $x++) {
    for ($uvelichenie = 0, $elements = 1, $count = ""; $uvelichenie < $h; $uvelichenie++) {
        $content = $m[$uvelichenie][$x];

        if ($content != ' ') {
            $count .= $content;
        }
    }

    $ContentR[$x] = $count;
}

$tr = [];

foreach ($ContentR as $key => $value) {
    $diff = ($h - strlen($value));

    for ($i = 0; $i < $diff; $i++) {
        $tr[$key][] = ' ';
    }

    for ($i = 0; $i < strlen($value); $i++) {
        $tr[$key][] = $value[$i];
    }
}

echo '<table>';
for ($i = 0; $i < $h; $i++) {
    $fuc = null;

    for ($x = 0; $x < $duljina; $x++) {
        $fuc .= '<td>' . htmlspecialchars($tr[$x][$i]) . '</td>';
    }

    if ($fuc !== str_repeat('<td> </td>', $duljina)) {
        echo '<tr>' . $fuc . '</tr>';
    }
}
echo '<table>';