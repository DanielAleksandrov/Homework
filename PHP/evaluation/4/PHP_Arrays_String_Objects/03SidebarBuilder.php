<?php
header("Content-Type: text/html; charset=utf-8");
mb_internal_encoding("utf-8");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sidebar Builder</title>
    <style type="text/css">
        .error {
            color: #ff0000;
            font-weight: bold;
        }

        aside {
            width: 140px;
            font-family: Arial, Tahoma, sans-serif;
            padding: 10px;
            border: 1px solid #5c5c5c;
            border-radius: 10px;
            background: lightblue; 
        }

        aside h2 {
            font-size: 20px;
            border-bottom: 1px solid #5c5c5c;
            width: 100%;
            padding-left: 5px;
        }

        aside li {
            list-style-type: disc;
        }

        aside a, a:active, a:hover, a:visited {
            color: #000000;
        }
    </style>
</head>
<body>
<form method="post">
    <label for="categories">Categories: </label>
    <input type="text" name="categories" id="categories"/><br/>
    <label for="tags">Tags: </label>
    <input type="text" name="tags" id="tags"/><br/>
    <label for="months">Months: </label>
    <input type="text" name="months" id="months"/><br/>
    <input type="submit" value="Generate"/>
</form>
<br/>
<?php
if (isset($_POST["categories"]) && isset($_POST["tags"]) && isset($_POST["months"])) {
    if (!empty($_POST["categories"]) && !empty($_POST["tags"]) && !empty($_POST["months"])) {
        echo generateSidebar("Categories", $_POST["categories"]);
        echo generateSidebar("Tags", $_POST["tags"]);
        echo generateSidebar("Months", $_POST["months"]);
    } else {
        echo "<div class=\"error\">Not all fields have been filled in.</div>";
    }
}

function generateSidebar($title, $values)
{
    $valuesSplit = preg_split('/[,.\s+]+/', $values, 0, PREG_SPLIT_NO_EMPTY);
    $sidebar = "<aside><header><h2>$title</h2></header><ul>";
    foreach ($valuesSplit as $item) {
        $sidebar .= "<li><a href=\"#\">$item</a></li>";
    }

    $sidebar .= "</ul></aside><br/>";
    return $sidebar;
}

?>
</body>
</html>