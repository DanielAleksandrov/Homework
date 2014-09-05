<form method="post">
    <textarea name="text" id="" cols="30" rows="5"></textarea><br>
    <input type="submit"/>
</form>

<?php
 if(isset($_POST['text'])){
     $text=$_POST['text'];
     $words=preg_split('/[\W]+/',$text);
     for($i=0;$i<count($words);$i++){
         $words[$i]=strtolower($words[$i]);
     }
     $unique=array_unique($words);
     echo "<table border=\"1\">";
     foreach ($unique as $word) {
         $count=substr_count(strtolower($text),strtolower($word));

         echo "<tr><td>$word</td><td>$count</td></tr>";

     }
     echo "</table>";

 }
?>