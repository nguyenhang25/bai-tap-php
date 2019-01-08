<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		$word = "";
		$arrayWord = array();
		$index = "";
		if (isset($_POST['submit'])) {
			$str = $_POST['inputText'];
			$word = LongestWord($str);
		}
		
		function LongestWord($str){
			$strlen = strlen($str);
			
			for ($i = 0; $i < $strlen; $i++) 
			{
				if (!preg_match('/^[a-zA-Z]+$/', $str[$i])) {
					$str = str_replace($str[$i], " ", $str);
				}
			}
			$str =  trim($str);
			$arrayWord = explode(' ', $str);

			$max = 0;
			foreach ($arrayWord as $i=>$value) 
			{
			  if (strlen($value) > $max) {
			      $max = strlen($value);
			      $index = $i;
			    }
			}
			return 	$arrayWord[$index];
		}
	?>

	<form method="post" action="">
		Input: <input type="text" name="inputText">
		<input type="submit" name="submit" value="Click me">
	</form>

	<?php
		echo "Output: ".$word;
	?>

</body>
</html>