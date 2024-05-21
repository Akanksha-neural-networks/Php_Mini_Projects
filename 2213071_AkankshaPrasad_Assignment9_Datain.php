<?php
$conn = mysqli_connect('localhost', 'root', '', 'mitsoe');
if (!$conn) 
{
 die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"]== "POST") 
{
 // Get form data
 $rollNo= $_POST["rollNo"];
 $studName= $_POST["studName"];
 $studDept= $_POST["studDept"];
 $passYear= $_POST["passYear"];
 $classGrade= $_POST["classGrade"];
 // Add item to database
 
 $sql = "INSERT INTO students(rollNo,studName,studDept,passYear,classGrade)
 VALUES ('$rollNo','$studName','$studDept','$passYear','$classGrade')";
 if (mysqli_query($conn, $sql)) 
 {
 echo "Item added successfully Kindly Refresh Database Page";
 } 
 else 
 {
 echo "Error adding item: Check Your Connection" . mysqli_error($conn);
 }
}
?>

<html>
<head>
 <title>Shopping Cart</title>
 <style>
 body 
 {
 background-color: #f2f2f2;
 font-family: Arial, sans-serif;
 }
 h2 
 {
 color: #333333;
 }
 form 
 {
 background-color: #ffffff;
 padding: 20px;
 margin-bottom: 20px;
 border-radius: 5px;
 }
 table 
 {
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
 <h2>Insert Data in Students Information Table</h2>
 <form method="post">
 <label for="rollNo">Roll No:</label>
 <input type="text" name="rollNo" id="rollNo">
 <label for="studName">Student Name:</label>
 <input type="text" name="studName" id="studName">
 <label for="studDept">Student Department:</label>
 <input type="text" name="studDept" id="studDept">
 <label for="passYear">Passing Year:</label>
 <input type="text" name="passYear" id="passYear">
 <label for="classGrade">Passing Grade:</label>
 <input type="text" name="classGrade" id="classGrade">
 <input type="submit" value="Add Record">
 </form>
 <table>
 <thead>
 <tr>
 <th>Roll No</th>
 <th>Student Name</th>
 <th>Department</th>
 <th>Passing Year</th>
 <th>Passing Grade</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $sql = "SELECT * FROM students";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
 while ($row = mysqli_fetch_assoc($result))
 {
 echo "<tr>";
 echo "<td>" . $row["rollNo"] . "</td>";
 echo "<td>" . $row["studName"] . "</td>";
 echo "<td>" . $row["studDept"] . "</td>";
 echo "<td>" . $row["passYear"] . "</td>";
 echo "<td>" . $row["classGrade"] . "</td>";
 echo "</tr>";
 }
 }
 ?>
 </tbody>
 </table>
 <?php
 $sql = "SELECT COUNT(*) as totalCount FROM students";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 echo "<p>Total Records in Table: " . $row["totalCount"] . "</p>";
 ?>
</body>
</html>
<?php
mysqli_close($conn);
?>


<html> 
<head> 
<title>Search Result</title> 
</head> 
<body> 
 <form action ="display.php" method="POST"> 
 <label for="year">Enter Year:</label> 
 <input type="number" name="year" id="year" required><br><br>   
 <label>Class Grades:</label><br> 
 <input type="radio" name="grades" value="First Class" id="firstClass">  
 <label for="firstClass">First Class</label><br> 
 <input type="radio" name="grades" value="Second Class"  id="secondClass"> 
 <label for="secondClass">Second Class</label><br>
 <input type="radio" name="grades" value="Pass" id="pass">  
 <label for="pass">Pass</label><br> 
 <input type="radio" name="grades" value="Fail" id="fail">  
 <label for="fail">Fail</label><br><br> 
 <input type="submit" name="submit" value="Submit">  
 </form> 
</body> 
</html> 
