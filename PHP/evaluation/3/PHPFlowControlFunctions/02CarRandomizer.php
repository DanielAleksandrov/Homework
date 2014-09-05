<!DOCTYPE html>
<html>
<head>
    <title>CarRandomizer</title>
    <style>
        th , td {
            padding: 5px;
        }
    </style>
</head>
<body>
<form action="" method="get">
    <label for="cars">Enter cars:</label>
    <input type='text' name="cars" />
    <input type="submit" value="Show result" />
</form>
</body>
</html>

<?php
if(isset($_GET['cars']) && !empty($_GET["cars"])){
    $colors=["green","red","silver","black","blue"];
    echo "<table border=1><tr><th>Car</th><th>Color</th><th>Count</th></tr>";
    $carsArray=array_filter(explode(",",$_GET['cars']));
    foreach($carsArray as $car){
        $count=rand(1,5);
        $color=rand(0,4);
        echo "<tr><td>$car</td><td>$colors[$color]</td><td>$count</td></tr>";
    }
    echo "</table>";
}
?>
