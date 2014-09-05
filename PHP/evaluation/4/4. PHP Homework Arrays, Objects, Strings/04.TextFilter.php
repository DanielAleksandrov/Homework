<!DOCTYPE html>
<html>
	<head>
		<title>Text Filter</title>
		<meta charset ='UTF-8' />
		<style>
			input#list {
				width:250px;
			}
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
			<label for="list">Enter blacklist here</label><br />
			<input type="text" name="blacklist" placeholder="blacklist" id="list" /><br/>
			<input type="submit" name="submit" value="Submit" />
		</form><br />
	<?php
	 if( (isset($_POST['text'])) && (!empty($_POST['text']))  && (isset($_POST['blacklist'])) &&
	 	 (!empty($_POST['blacklist'])) && (isset($_POST['submit'])) ){
	 	 		 			
		$text = $_POST['text'];
		$blacklist = $_POST['blacklist'];
		$pattern = '/[,\s+]+/';
		$bl = preg_split($pattern, $blacklist, -1, PREG_SPLIT_NO_EMPTY);
			
		for ($i=0; $i < count($bl) ; $i++) { 
			$curr_ptrn = '/\b'.$bl[$i].'\b/';
			$replace = str_repeat("*", strlen($bl[$i]));
			$text = preg_replace($curr_ptrn, $replace, $text);	
		}
		
		echo $text;
		
	 }
	?>
</body>
</html>