<!DOCTYPE html>
<html>
	<head>
		<title>URL Replacer</title>
		<meta charset ='UTF-8' />
		<style>
			input[type='submit']{
				width: 100px;
				height:35px;
			}
		</style>
	</head>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label for="textarea">Enter text here</label><br/>
			<textarea rows="4" cols="50" placeholder = "Enter text here" name="text" id="textarea"></textarea><br />
			<input type="submit" name="submit" value="Submit" />
		</form><br />
	<?php
	
	header("Content-Type: text/html; charset=utf-8");
	mb_internal_encoding("utf-8");
	 if( (isset($_POST['text'])) && (!empty($_POST['text'])) && (isset($_POST['submit'])) ){ 	 		 			
		$text = $_POST['text'];
		// $pattern = '/<a href="[\w+\d+:\/]+\.[\w+\d+]+">[\w+\d+\s+ ]+<\/a>/i';
		$pattern = '/(<a href="(.*?)">)(.*?)(<\/a>)/';
		preg_match_all($pattern, $text,$urls);
		var_dump($urls);
		
		for ($i=0; $i < count($urls[0]) ; $i++) { 
			$curr_match = $urls[0][$i];
			$url =  $urls[2][$i];
			$txt =  $urls[3][$i];
			$replace = "[URL=".$url."]".$txt."[/URL]";
		    $text = str_replace($curr_match, $replace, $text);	
	
		}
			echo $text;
	 }
	?>
</body>
</html>