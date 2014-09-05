<form method="post">
    <textarea name="text" cols="30" rows="10"></textarea><br>
    <input type="text" name="banned"/><br>
    <input type="hidden" name="check"/>
    <input type="submit"/>
</form>

<?php
if(isset($_POST['check'])){
    $textstring=$_POST['text'];
    $banned=explode(", ",$_POST['banned']);
    $textwords=preg_split('/\W/',$textstring);
    for($i=0;$i<count($banned);$i++){
        $aster=$banned[$i];
        for($j=0;$j<strlen($banned[$i]);$j++){
            $aster[$j]="*";
        }
        $newtext=str_replace($banned[$i],$aster,$textstring);
        $textstring=$newtext;
    }
    echo $newtext;
}
?>