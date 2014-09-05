<!DOCTYPE html>
<html>
<head>
    <title>PrimesInRange</title>
    
</head>
<body>
<form action="" method="post">
    <label for="start">Starting Index :</label>
    <input type='text' name="start" />
    <label for="end">End :</label>
    <input type='text' name="end" />
    <input type="submit" value="Submit" />
</form>
</body>
</html>

<?php
function isPrime($num){
    if($num==1)
        return false;//1 is not prime
    if($num==2)
        return true;//2 is not prime
    if($num % 2==0)//even number
        return false;
    for($i=3; $i<= ceil(sqrt($num)); $i=$i+2 ) {
        if($num % $i ==0)
        return false;
    }
    return true;
}

if(isset($_POST['start']) && isset($_POST['end'])){
    
    $start=$_POST['start'];
    $end=$_POST['end'];
    $numbers=array();
    if($start < $end) {
        for ($i=$start,$j=0; $i<$end ; $i++,$j++) {
        $numbers[$j]=(string)$i;
        if(isPrime($i))
            $numbers[$j]="<strong>$i</strong>";
        }
        echo implode(", ",$numbers);
     } else {
         echo "The start number must be less than the end number.";
         }
   }

?>
