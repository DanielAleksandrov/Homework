<form method="post">
    Categories:<input type="text" name="cat" required=""/><br>
    Tags: <input type="text" name="tag" required=""/><br>
    Months: <input type="text" name="mon" required=""/><br>
    <input type="hidden" name="check"/>
    <input type="submit"/>
</form>

<?php
 if(isset($_POST['check'])){
     $categories=explode(", ",$_POST['cat']);
     $tags=explode(", ",$_POST['tag']);
     $months=explode(", ",$_POST['mon']);

     //CATEGORIES
     $result="<aside>
     <strong>Categories</strong><br>
     <ul>";
     foreach ($categories as $cat) {
         $result.="<li>$cat</li>";
     }
     $result.='</ul></aside>';

     //TAGS
     $result.="<aside>
     <strong>Tags</strong><br>
     <ul>";
     foreach ($tags as $tag) {
         $result.="<li>$tag</li>";
     }
     $result.='</ul></aside>';

     //MONTHS
     $result.="<aside>
     <strong>Months</strong><br>
     <ul>";
     foreach ($months as $month) {
         $result.="<li>$month</li>";
     }
     $result.='</ul></aside>';

     echo $result;

 }
?>