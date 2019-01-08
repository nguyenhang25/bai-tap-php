<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php
		$phoneNumber = "";

		if (isset($_POST['submit'])) {
			$textInput = $_POST['inputText'];
			$textInput = str_replace(',', ' ', $textInput);
			$textInput = trim($textInput);
			$array = explode(' ', $textInput);
			for($i=0; $i < count($array); $i++){
			  if($array[$i] == null) 
			      array_splice($array, $i, 1);
			}
			
			$phoneNumber = createPhoneNumber($array);

		}

		function createPhoneNumber($array)
		{	
			$str = "";
			$count = count($array);
			if ($count != 10) {
				$error = "Plese enter 10 number";
			} else {
				$array1 = array("(", $array[0], $array[1], $array[2], ")");
				$array2 = array($array[3], $array[4], $array[5]);
				$array3 = array($array[6], $array[7], $array[8], $array[9]);

				$str1 = implode($array1);
				$str2 = implode($array2);
				$str3 = implode($array3);

				$str = $str1 . " " . $str2 . "-" . $str3;
			}
			return $str;
		}
		

	?>

	<form method="post" action="">
		<p>Enter 10 numbers separated by commas</p>
		<input type="text" name="inputText">
		<input type="submit" name="submit" value="Click me">
	</form>

	<?php
		echo "Output: ";
		echo $phoneNumber;
	?>


</body>
</html>