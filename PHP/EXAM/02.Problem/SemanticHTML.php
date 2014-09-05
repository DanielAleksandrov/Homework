<?php
$textInput = htmlspecialchars($_GET['html']);
$arr = preg_split('/<div/g' ,$textInput);
var_dump($arr);

?>