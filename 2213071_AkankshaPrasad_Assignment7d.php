<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
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
    <h2>Electricity Bill Calculator</h2>
    <form method="post">
        Enter units consumed: <input type="number" name="units" required>
        <input type="submit" value="Calculate Bill">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $units = $_POST['units'];
        $totalBill = 0;

        if ($units <= 50) {
            $totalBill = $units * 3.50;
        } elseif ($units <= 150) {
            $totalBill = (50 * 3.50) + (($units - 50) * 4.00);
        } elseif ($units <= 250) {
            $totalBill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
        } else {
            $totalBill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
        }

        echo "Units Consumed: $units<br>";
        echo "Total Bill: Rs. $totalBill";
    }
    ?>
</body>
</html>
