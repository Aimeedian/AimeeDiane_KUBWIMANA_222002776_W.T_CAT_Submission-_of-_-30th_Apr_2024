<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .header {
            background-color: teal;
            color: white;
            display: flex;
            align-items: center;
            padding: 10px 20px;
        }
        .header .logo {
            width: 60px;
            height: auto;
        }
        .header p {
            margin: 0;
            font-weight: initial;
            font-size: 20px;
        }
        .navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navigation li {
            margin-right: 10px;
        }
        .navigation li:last-child {
            margin-right: 0;
        }
        .navigation a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .navigation a:hover {
            background-color: #666;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border: 2px solid red;
            border-radius: 10px;
            background-color: skyblue;
        }
        .container h3 {
            text-align: center;
            color: deeppink;
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: black;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="number"] {
            width: calc(100% - 22px); /* Adjusting width to account for padding and border */
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
            margin-top: 5px;
        }
        .form-group button[type="submit"],
        .form-group button[type="button"] {
            width: 45%;
            background-color: indigo;
            color: white;
            font-size: 20px;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }
        .form-group button[type="submit"]:hover,
        .form-group button[type="button"]:hover {
            background-color: darkblue;
        }
        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
            margin-right: 10px;
        }
        .dropdown-contents {
            display: none;
            position: absolute;
            background-color: deeppink;
            text-decoration: none;
            min-width: 120px;
            z-index: 1;
        }
        .dropdown-contents a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .dropdown-contents a:hover {
            background-color: red;
        }
        .dropdown:hover .dropdown-contents {
            display: block;
        }
    </style>
    <script>
        function validateForm() {
            // Basic validation example, you can add more as needed
            var reason = document.getElementById("reason").value;
            var applyDate = document.getElementById("apply").value;
            var startDate = document.getElementById("start").value;
            var endDate = document.getElementById("end").value;
            var duration = document.getElementById("duration").value;
            var type = document.getElementById("type").value;
            var code = document.getElementById("code").value;

            if (reason === "" || applyDate === "" || startDate === "" || endDate === "" || duration === "" || type === "" || code === "") {
                alert("All fields are required");
                return false;
            }
            return true;
        }
    </script>
    <script>
            function confirmInsert() {
                return confirm('Are you ready to insert this data?');
            }
        </script>
</head>
<body>
<div class="header">
    <img class="logo" src="tt.png" alt="Logo">
    <p>ONLINE EMPLOYEE ATTENDANCE SYSTEM</p>
    <ul class="navigation">
        <li><a href="home page.html">Home</a></li>
        <li><a href="aboutus.html">About Us</a></li>
        <li><a href="contactus.html">Contact Us</a></li>
        <li class="dropdown">
            <a href="#">Forms</a>
            <div class="dropdown-contents">
                <a href="employee.php">Employee</a>
                <a href="attendance.php">Attendance</a>
                <a href="holiday.php">Holiday</a>
                <a href="Notification.php">Notification</a>
                <a href="permission.php">Permission</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#">Tables</a>
            <div class="dropdown-contents">
                <a href="employeetable.php">Employee</a>
                <a href="attendtable.php">Attendance</a>
                <a href="holtable.php">Holiday</a>
                <a href="Notiftable.php">Notification</a>
                <a href="permtable.php">Permission</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#">Settings</a>
            <div class="dropdown-contents">
                <a href="adminlogin.php">Admin</a>
                <a href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</div><center><p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</i></p></center>
<div class="container">
    <h3>PERMISSION FORM</h3>
    <form action="" method="POST" onsubmit="return confirmInsert();">
        <div class="form-group">
            <label for="reason">Reason:</label>
            <input type="text" name="reason" id="reason" required>
        </div>
        <div class="form-group">
            <label for="apply">Apply Date:</label>
            <input type="date" name="apply" id="apply" required>
        </div>
        <div class="form-group">
            <label for="start">Start Date:</label>
            <input type="date" name="start" id="start" required>
        </div>
        <div class="form-group">
            <label for="end">End Date:</label>
            <input type="date" name="end" id="end" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration:</label>
            <input type="number" name="duration" id="duration" required>
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" name="type" id="type" required>
        </div>
        <div class="form-group">
            <label for="code">Employee Code:</label>
            <input type="number" name="code" id="code" required>
        </div>
        <div class="form-group">
            <button type="submit" name="send" style="width: 45%; background-color: indigo; color: white; font-size: 20px; border: none; padding: 10px; cursor: pointer; border-radius: 5px; margin-top: 10px; transition: background-color 0.3s ease;">Apply</button>
            <button type="button" name="cancel" onclick="cancelForm()" style="width: 45%; background-color: red; color: white; font-size: 20px; border: none; padding: 10px; cursor: pointer; border-radius: 5px; margin-top: 10px; transition: background-color 0.3s ease;">Cancel</button>
        </div>
    </form>
</div>
<?php
        if(isset($_POST['send'])) {
           include "dbconnection.php";
            $reason = $_POST['reason'];
            $applyDate = $_POST['apply'];
            $startDate = $_POST['start'];
            $endDate = $_POST['end'];
            $duration = $_POST['duration'];
            $type = $_POST['type'];
            $employeeCode = $_POST['code'];

            $sql = "INSERT INTO permission (Reasonforleave, Date, StartDate, EndDate, Duration, leavetype, employee_code) 
                    VALUES ('$reason', '$applyDate', '$startDate', '$endDate', '$duration', '$type', '$employeeCode')";

            if ($connection->query($sql) === TRUE) {

                echo "Data inserted successfully<br>";
            } else {
                echo "Error inserting data: " . $connection->error;
            }

            $connection->close();
        }
        ?>
<div>
    <footer style="background-color:teal;text-align: center;width:100%;height:90px; color: white;font-size: 25px;margin-top: 20px; position: fixed;bottom: 0px;left: 0;">
        <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</div>
</body>
</html>
