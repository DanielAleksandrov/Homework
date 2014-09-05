<!DOCTYPE html>
<html>
<head>
    <title>Print Tags</title>
 </head>
</html>
<?php
$sumSquare=0;
$st="style=\"border:solid 1px #000000\"";
echo "<table $st><tr><th $st>Number</th><th $st>Square</th></tr>";
for ($i=0; $i <=100 ; $i++) {
    $square=round(sqrt($i),2) ;
    $sumSquare=$sumSquare+$square;
    echo "<tr ><td $st>$i</td><td $st>$square</td></tr>";
}
echo "<tr><td $st>Total:</td><td $st>$sumSquare</td></tr></table>";
?>
   
