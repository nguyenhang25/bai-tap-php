<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$strChange = "";
		if (isset($_POST['submit'])) {
			$str = $_POST['inputText'];
			$strChange = LetterChanges($str);
		}

		function LetterChanges($str){
			$strlen = strlen($str);
			$array = array();
			for($i = 0; $i < $strlen; $i++){
				if(preg_match('/^[a-zA-Z]+$/', $str[$i])){
					$newstr = ord($str[$i]);
					++$newstr;
					$newstr = chr($newstr);
					if (check($newstr)) {
						$newstr = strtoupper($newstr);
					}
					array_push($array, $newstr);
				} else {
					array_push($array, $str[$i]);
				} 
			}

			$strChange  = implode($array);
			return $strChange;
		}
		

		function check($str){
			if($str == 'a' || $str == 'e' || $str == 'i' || $str == 'o' || $str == 'u'){
				return true;
			} else {
				return false;
			}

		}
	?>

	<form method="post" action="">
		Input: <input type="text" name="inputText">
		<input type="submit" name="submit" value="Click me">
	</form>

	<?php
		echo "Output: ".$strChange;
	?>

</body>
</html>