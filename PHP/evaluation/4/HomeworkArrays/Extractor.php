<form method="post">
    <textarea name="text" cols="30" rows="10"></textarea><br>
    <input type="text" name="word"/><br>
    <input type="hidden" name="check"/>
    <input type="submit"/>
</form>

<?php
if(isset($_POST['check'])){
    $text=$_POST['text'];
    $word=$_POST['word'];
    $current=0;
    for($i=0;$i<strlen($text);$i++){
        if($text[$i]=="!"||$text[$i]=="."||$text[$i]=="?"){
            $sentence='';
            for($j=$current;$j<=$i;$j++){
                $sentence.=$text[$j];
            }
            if(preg_match("/ is /",$sentence)){
            echo $sentence."<br>";
            }
            $current=$i+1;

        }
    }


}
?>