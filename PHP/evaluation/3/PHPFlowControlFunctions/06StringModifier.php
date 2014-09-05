<!DOCTYPE html>
<?php
if(isset($_GET['inputText']) && isset($_GET['action'])){
            
     $action = $_GET['action'];
     $text = $_GET['inputText'];
     $result='';
     
                switch ($action) {
                    case "checkp":
                        $rev=strrev(strtolower($text));
                        if($rev==strtolower($text))
                         $result=$text . " is a palindrome!";
                        else
                          $result=$text . " is not a palindrome!"  ;
                        break;
                    
                    case "reverse":
                        $rev=strrev($text);
                        $result=$rev;
                        break;
                    case "split":
                        preg_match_all("/[A-Za-z]/",$text,$chars,PREG_PATTERN_ORDER);
                        $result=implode(' ',$chars[0]);
                        break;
                      case "hstring":  
                        $result = crypt($text);
                          break;
                          case "shuffle":  
                        $result = str_shuffle($text);
                          break;
                    default:
                        $result=$text;
                    }
           
        
    } 
?>
<html>
<head>
 <title>StringModifier</title>
</head>
<body>
<form action="" method="get">
<fieldset>
     
<input type='text' name="inputText" />
<input type="radio" name="action" value="checkp"> <label >Check Palindrome </label>
<input type="radio" name="action" value="reverse"><label >Reverse String</label>
<input type="radio" name="action" value="split"><label >Split</label>
<input type="radio" name="action" value="hstring"><label >Hash String</label>
<input type="radio" name="action" value="shuffle"><label >Shuffle String</label>
<input type="submit" value="Submit" />

</fieldset>
</form>
</body>
</html>

<?php
  if(isset($result)) {
    echo $result;  
  }
?>