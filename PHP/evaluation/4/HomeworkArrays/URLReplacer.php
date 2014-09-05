<form method="post">
    <textarea name="text" cols="30" rows="10"></textarea><br>
    <input type="hidden" name="check"/>
    <input type="submit"/>
</form>

<?php

if(isset($_POST['check'])){
    $text=$_POST['text'];
    $replaced=preg_replace('/<\/a>/','[/URL]',$text);
    $finished=preg_replace('/<a href="(https?:\/\/)?(\w+[.\w+]+[\/\w+]+)">/','[URL= ${1}${2} ]',$replaced);
    echo $finished;
}