<!DOCTYPE html>
<html>
<head>
    <title>SumOfDigits</title>
 </head>
 <body>
<form action="" method="post">
    <label for="inputString">Input string:</label>
    <input type='text' name="inputString" />
    <input type="submit" value="Show result" />
</form>
</body>
</html>
<?php
if(isset($_POST['inputString']) && !empty($_POST["inputString"])){
    $output="<table border=1>";
    $input=explode(",",$_POST['inputString']);
   // $input=explode(",",str_replace(' ','',($_POST['inputString'])));
       foreach($input as $cur){
        $cur=trim($cur);
        $sum="I cannot sum that";
        if(ctype_digit($cur)){
            $digitArray=preg_split("//",$cur);//str_split($cur)
            $sum=array_sum($digitArray);
        }
        $output.= "<tr><td>$cur</td><td>$sum</td></tr>";
    }
    $output.= "</table>";
    echo $output;
}
?>