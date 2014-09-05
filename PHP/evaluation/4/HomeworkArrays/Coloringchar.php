<form method="post">
    <textarea name="text" id="" cols="30" rows="5"></textarea><br>
    <input type="submit"/>
</form>

<?php
if(isset($_POST['text'])){
$string=$_POST['text'];
$string = preg_replace('/\s+/', '', $string);
$hey=str_split($string);
    for($i=0;$i<count($hey);$i++){
        if(ord($hey[$i])%2==0){
            echo "<span style=\"color:red;\">$hey[$i] </span>";
        }
        else{
            echo "<span style=\"color:blue;\">$hey[$i] </span>";
        }
    }
}
?>