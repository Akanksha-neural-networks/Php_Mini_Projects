<?php
$conn = mysqli_connect('localhost', 'root', '', 'wtl_lab');
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // Get form data
 $itemID = $_POST["itemID"];
 $itemName = $_POST["itemName"];
 $itemQuantity = $_POST["itemQuantity"];
 // Add item to database
 $sql = "INSERT INTO shopping_cart_lab_8 (itemID, itemName,
itemQuantity)
 VALUES ('$itemID', '$itemName', '$itemQuantity')";
 if (mysqli_query($conn, $sql)) {
 echo "Item added successfully";
 } else {
 echo "Error adding item: " . mysqli_error($conn);
 }
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Shopping Cart</title>
 <style>
 body {
 background-color: #f2f2f2;
 font-family: Arial, sans-serif;
 }
 h2 {
 color: #333333;
 }
 form {
 background-color: #ffffff;
 padding: 20px;
 margin-bottom: 20px;
 border-radius: 5px;
 }
 table {
 border-collapse: collapse;
 margin-bottom: 20px;
 }
 th,
 td {
 padding: 8px;
 border: 1px solid #dddddd;
 text-align: left;
 }
 th {
 background-color: #4CAF50;
 color: #ffffff;
 }
 tr:nth-child(even) {
 background-color: #f2f2f2;
 }
 input[type="text"],
 input[type="number"] {
 padding: 8px;
 border-radius: 5px;
 border: 1px solid #cccccc;
 width: 100%;
 }
 input[type="submit"] {
 background-color: #4CAF50;
 color: #ffffff;
 border-radius: 5px;
 border: none;
 padding: 8px 16px;
 margin-top: 10px;
 cursor: pointer;
 }
 input[type="submit"]:hover {
 background-color: #3e8e41;
 }
 </style>
</head>
<body>
 <h2>Shopping Cart</h2>
 <form method="post">
 <label for="itemID">Item ID:</label>
 <input type="text" name="itemID" id="itemID">
 <label for="itemName">Item Name:</label>
 <input type="text" name="itemName" id="itemName">
 <label for="itemQuantity">Quantity:</label>
 <input type="number" name="itemQuantity" id="itemQuantity">
 <input type="submit" value="Add Item">
 </form>
 <table>
 <thead>
 <tr>
 <th>Item ID</th>
 <th>Item Name</th>
 <th>Quantity</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $sql = "SELECT * FROM shopping_cart_lab_8";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<tr>";
 echo "<td>" . $row["itemID"] . "</td>";
 echo "<td>" . $row["itemName"] . "</td>";
 echo "<td>" . $row["itemQuantity"] . "</td>";
 echo "</tr>";
 }
 }
 ?>
 </tbody>
 </table>
 <?php
 $sql = "SELECT COUNT(*) as totalCount FROM shopping_cart_lab_8";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 echo "<p>Total Items: " . $row["totalCount"] . "</p>";
 ?>
</body>
</html>
<?php
mysqli_close($conn);
?>