<!DOCTYPE html>
<html>
	<head>
		<title>Factorial Using Recursive Function</title>
		<style>
			body {
            font-family: Arial, sans-serif;
            text-align: center;
			background-color: #f2f2f2;
			}
			h2 {
			text-align: center;
			margin-top: 40px;
			color: #1e90ff;
			}
			input[type="number"] {
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ddd;
			margin-right: 10px;
			}
			input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
			}
			input[type="submit"]:hover {
			background-color: #3e8e40;
			}
		</style>
	</head>
	<body>
		<h2>Factorial Calculator</h2>
		<form method="post">
			Enter a number: <input type="number" name="number" required>
			<input type="submit" value="Calculate">
		</form>
		
		<?php
			function factorial($n) {
				if ($n == 0) {
					return 1;
					} else {
					return $n * factorial($n - 1);
				}
			}
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$number = $_POST['number'];
				
				if ($number >= 0) {
					$result = factorial($number);
					echo "Factorial of $number is $result.";
					} else {
					echo "Invalid input. Please enter a non-negative integer.";
				}
			}
		?>
	</body>
</html>
