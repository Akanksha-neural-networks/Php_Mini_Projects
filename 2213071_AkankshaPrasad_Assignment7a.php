<!DOCTYPE html>
<html>
<head>
    <title>Student Grade Checker</title>
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }

        h2 {
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            padding: 5px;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e40;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Grade Checker</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['marks'])) {
                $marks = $_POST['marks'];

                if ($marks >= 60) {
                    $grade = "First Division";
                } elseif ($marks >= 45 && $marks < 60) {
                    $grade = "Second Division";
                } elseif ($marks >= 33 && $marks < 45) {
                    $grade = "Third Division";
                } else {
                    $grade = "Fail";
                }

                echo "<p>Marks: $marks%</p>";
                echo "<p>Grade: $grade</p>";
            }
        }
        ?>
        <form method="post">
            <label for="marks">Enter Marks:</label>
            <input type="number" name="marks" id="marks" required>
            <input type="submit" value="Check Grade">
        </form>
    </div>
</body>
</html>
