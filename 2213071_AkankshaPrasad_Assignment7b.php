<!DOCTYPE html>
<html>
	<head>
		<title>Day of the Week</title>
		<style>
			body {
            font-family: Arial, sans-serif;
            text-align: center;
			background-color: #f2f2f2;
			}
			.result {
            font-size: 24px;
            margin-top: 50px;
			}
			.invalid {
            color: red;
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
		<h2>Enter a Day Number (1-7):</h2>
		<form method="post">
			<input type="number" name="dayNumber" min="1" max="7" required>
			<input type="submit" value="Check Day">
		</form>
		
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$dayNumber = $_POST['dayNumber'];
				
				switch ($dayNumber) {
					case 1:
					$day = "Monday";
					break;
					case 2:
					$day = "Tuesday";
					break;
					case 3:
					$day = "Wednesday";
					break;
					case 4:
					$day = "Thursday";
					break;
					case 5:
					$day = "Friday";
					break;
					case 6:
					$day = "Saturday";
					break;
					case 7:
					$day = "Sunday";
					break;
					default:
					$day = "Invalid number";
				}
				
				echo "<div class='result " . ($day === 'Invalid number' ? 'invalid' : '') . "'>Day $dayNumber is $day.</div>";
			}
		?>
	</body>
</html>
