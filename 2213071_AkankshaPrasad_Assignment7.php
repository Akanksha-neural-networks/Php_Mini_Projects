<!DOCTYPE html>
<html>
<head>
 <title>Table of a Number</title>
 <style>
 body {
 font-family: Arial, sans-serif;
 background-color: #f2f2f2;
 }
 h2 {
 text-align: center;
 margin-top: 40px;
 color: #1e90ff;
 }
 table {
 margin: 0 auto;
 border-collapse: collapse;
 background-color: #ff;
 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 margin-top: 50px;
 }
 th,
 td {
 padding: 10px;
 border: 1px solid #ddd;
 text-align: center;
 }
 th {
 background-color: #f2f2f2;
 color: #66;
 font-weight: bold;
 }
 input[type="number"] {
 padding: 10px;
 border-radius: 5px;
 border: 1px solid #ddd;
 margin-right: 10px;
 }
 input[type="submit"] {
 background-color: #4CAF5;
 color: #fff;
 padding: 10px;
 border-radius: 5px;
 border: none;
 cursor: pointer;
 }
 input[type="submit"]:hover {
 background-color: #3e8e;
 }
 </style>
</head>
<body>
 <div style="display: flex; justify-content: center;">
 <form method="post">
 <label for="number">Enter a number:</label>
 <input type="number" name="number" id="number" required>
 <input type="submit" value="Generate Table">
 </form>
 </div>
 <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $number = $_POST['number'];
 echo "<h2>Table of $number</h2>";
 echo "<table>";
 echo "<tr><th style='background-color: #1e90ff; color:
#fff;'>Number</th><th style='background-color: #1e90ff; color:
#fff;'>Multiplier</th><th style='background-color: #1e90ff; color:
#fff;'>Result</th></tr>";
 for ($i = 1; $i <= 10; $i++) {
 echo "<tr><td style='background-color: #f2f2f2; color:
#1e90ff;'>$number</td><td style='background-color: #f2f2f2; color:
#1e90ff;'>$i</td><td style='background-color: #f2f2f2; color: #1e90ff;'>" .
($number * $i) . "</td></tr>";
 }
 echo "</table>";
 }
 ?>
</body>
</html>