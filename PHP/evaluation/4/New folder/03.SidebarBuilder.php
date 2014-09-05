<!DOCTYPE html>
<html>
<head>
    <title>Sidebar Builder</title>
    <style>
        aside {
            background: deepskyblue;
            border: 1px solid black;
            border-radius: 15px;
            margin: 5px 0;
            padding: 0 10px;
            width: 200px;
        }
    </style>
</head>
<body>
<form method="post" >
    <label for="categories">Categories</label>
    <input id="categories" name="categories" type="text"> <br/>
    <label for="tags">Tags</label>
    <input id="tags" name="tags" type="text"> <br/>
    <label for="months">Months</label>
    <input id="months" name="months" type="text"> <br/>
    <input type="submit" value="Generate">
</form>
    <?php
    if($_POST){
        $inputs = array("Categories", "Tags", "Months");
        $arrays = array(explode(', ', $_POST['categories']), explode(', ', $_POST['tags']), explode(', ', $_POST['months']));
        $counter = 0;
        foreach($inputs as $input){
            echo "<aside><div>$input</div><hr /><ul>";
            foreach($arrays[$counter] as $arr){
                echo "<li>$arr</li>";
            }
            $counter++;
            echo  "</ul></aside>";
        }
    }
    ?>
</body>
</html>