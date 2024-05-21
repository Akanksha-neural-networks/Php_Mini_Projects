<?php 
 $conn = mysqli_connect('localhost', 'root', '', 'mitsoe'); 
 if(isset($_POST['submit'])) 
 { 
 $year = $_REQUEST['year']; 
 $grades = $_REQUEST['grades']; 
 $sql = 'SELECT * FROM students WHERE passYear=? AND classGrade=?'; 
 $stmt = mysqli_prepare($conn, $sql); 
 mysqli_stmt_bind_param($stmt, 'is', $year, $grades);   
 mysqli_stmt_execute($stmt); 
 $result = mysqli_stmt_get_result($stmt); 
 if (mysqli_num_rows($result) > 0)
 { 
 while ($row = mysqli_fetch_assoc($result)) 
 {  
 echo '<p>Roll No: ' . $row['rollNo'] . '</p>';  
 echo '<p>Name: ' . $row['studName'] . '</p>'; 
 echo '<p>Department: ' . $row['studDept'] . '</p>';  
 echo '<p>Passing Year: ' . $row['passYear'] . '</p>';  
 echo '<p>Class Grades: ' . $row['classGrade'] . '</p>';  
 echo '<hr>'; 
 } 
 }
 else 
 { 
 echo 'No records found'; 
 } 
mysqli_close($conn); 
} 
?> 
