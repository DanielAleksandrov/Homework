<!DOCTYPE html>
<html>
	<head>
		<title>Sentence Extractor</title>
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
			<label for="search">Enter word here</label><br />
			<input type="text" name="word" placeholder="Enter word" id="search" /><br/>
			<input type="submit" name="submit" value="Submit" />
		</form><br />
	<?php
	 if( (isset($_POST['text'])) && (!empty($_POST['text']))  && (isset($_POST['word'])) &&
	 	 (!empty($_POST['word'])) && (isset($_POST['submit'])) ){
	 	 		 			
		$text = $_POST['text'];
		$word = $_POST['word'];
		$pattern = '/(?<=[.?!])\s+/';
		$sentences = preg_split($pattern, $text, -1, PREG_SPLIT_NO_EMPTY);
		
		foreach ($sentences as $sentence) {
			$ptrn = '/\s+'.$word.'\s+.*[!?.]+$/';
			if(preg_match($ptrn, $sentence)){
				echo $sentence."<br/>";
			}
		}		
	 }
	?>
</body>
</html>