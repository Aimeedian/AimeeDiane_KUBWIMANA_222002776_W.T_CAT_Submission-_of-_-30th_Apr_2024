<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- JavaScript validation and content load for inserting data -->
    <script>
        function confirmInsert() {
            return confirm('Are you ready to insert this data?');
        }
    </script>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header styling */
        .header {
            display: flex;
            justify-content:none;
            align-items: center;
            padding: 10px 20px;
            background-color: teal;
            border-bottom: 5px solid black;
        }
        .logo {
            width: 60px;
            height: auto;
        }
        .navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .navigation li {
            display: inline-block;
            margin-right: 10px;
        }
        .navigation li a {
            text-decoration: none;
            color: white;
            background-color: none;
            padding: 8px 15px;
            border-radius: 15px;
        }
        .navigation li a:hover {
            background-color: purple;
        }

        /* Form styling */
        form {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid red;
            background-color: skyblue;
        }
        table {
            width: 100%;
        }

        table tr td {
            font-size: 16px;
            color: black;
            height: 40px;
        }

        table tr td input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 150px;
            padding: 10px;
            font-size: 20px;
            background-color: violet;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        /* Footer styling */
        footer {
            background-color: teal;
            text-align: center;
            color: white;
            font-size: 25px;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
  .dropdown-contents{
  display: none;
  position: absolute;
  background-color:deeppink;
 text-decoration: none;
}
.dropdown-contents a{
  color: black;
  text-decoration: none;
  display: block;
}
.dropdown-contents a :hover{
 background-color: red;
}
.dropdown:hover .dropdown-contents{
  display:block;
}
    </style>
</head>
<body>
<div class="header">
    <img class="logo" src="tt.png" alt="Logo">
    <h3><i>ONLINE EMPLOYEE <br>ATTENDANCE SYSTEM</i></h3>
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
</div>

<center>
<p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</i></p>
    <form action="" method="POST" onsubmit="return confirmInsert()">
    <p style="font-weight: bold;font-size: 25px;align-items: center;color: deeppink;"><i>Holiday Form</i></p>

        <table>
            <tr><td>Employee Code</td><td><input type="number" name="code" required></td></tr>
            <tr><td>Holiday Type</td><td><input type="text" name="type" required></td></tr>
            <tr><td>Start Date</td><td><input type="date" name="start" required></td></tr>
            <tr><td>End Date</td><td><input type="date" name="end" required></td></tr>
            <tr><td>Document</td><td><input type="file" name="d" required></td></tr>
            <tr><td colspan="2"><input type="submit" name="send" value="Apply">
            <input type="submit" name="send" value="Cancel"></td></tr>
        </table>
    </form>

    <?php
    // Include database connection file
    include "dbconnection.php";

    if (isset($_POST['send'])) {
        // Retrieve values from form
        $employee_code = $_POST['code'];
        $holiday_type = $_POST['type'];
        $start_date = $_POST['start'];
        $end_date = $_POST['end'];
        $document = $_POST['d'];

        // Insert new record into the database
        $stmt = $connection->prepare("INSERT INTO holiday (employee_code, holidaytype, StartDate, EndDate, document) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $employee_code, $holiday_type, $start_date, $end_date, $document);

        if ($stmt->execute()) {
            // Success message displayed after insert
            echo "<script>alert('Holiday data sent successfully.'); window.location.href = 'holiday.php';</script>";
        } else {
            echo "Error inserting record: " . $stmt->error;
        }
    }

    // Close connection
    $connection->close();
    ?>
</center>

<footer>
    <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>

</body>
</html>
