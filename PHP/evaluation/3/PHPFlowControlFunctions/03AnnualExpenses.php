<!DOCTYPE html>
<html>
<head>
    <title>AnnualExpenses</title>
    <style>
        th , td {
            padding: 1px;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <label for="numberYears">Enter numbers of years :</label>
    <input type='text' name="numberYears" />
    <input type="submit" value="Show result" />
</form>
</body>
</html>

<?php
if(isset($_POST['numberYears'])){
    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $nYears=$_POST['numberYears'];
    $output="<table border=1><tr><th>Year</th>";
    for ($i=0; $i <12 ; $i++) { 
        $output=$output . "<th>$months[$i]</th>";
    }
    $output.="<th>Total:</th></tr>";
    for ($i=0, $curYear=2014; $i<$nYears ; $i++,$curYear--) {
        $output.="<tr><td>$curYear</td>";
        $sum=0;
        for ($j=0; $j <12 ; $j++) {
            $expenses=rand(0, 999);
            $sum+=$expenses;
            $output.="<td>$expenses</td>";
        }
        $output.="<td>$sum</td></tr>";
    }
    $output.="</table>";
    echo $output;
   }
?>
