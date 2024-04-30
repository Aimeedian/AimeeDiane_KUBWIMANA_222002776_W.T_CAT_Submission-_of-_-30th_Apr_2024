<!DOCTYPE html>
<html lang="en">
<head>
 <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you ready to insert this notification?');
            }
        </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Employee System</title>
    <style>
        body {
            background-color: skyblue;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
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
            text-align: none;
            flex-grow: 2; 
        }
        .navigation li {
            display: inline-block;
            margin-right: 5px;
            padding: 5px;
        }
        .navigation li:last-child {
            margin-right: 0;
        }
        .navigation li a {
            text-decoration: none;
            color: white; /* Changed color to white */
        }
        .dropdown-contents {
            display: none;
            position: absolute;
            background-color: none;
            text-decoration: none;
        }
        .dropdown-contents a {
            color: black;
            text-decoration: none;
            display: block;
        }
        .dropdown-contents a:hover {
            background-color: red;
        }
        .dropdown:hover .dropdown-contents {
            display: block;
        }
        form {
            width: 500px;
            height: 400px;
            border: 2px solid red;
            margin-top: 50px;
            border-radius: 14px;
        }
        tr {
            color: deeppink;
            font-size: 25px;
        }
        tr td {
            font-size: 20px;
            color: black;
            width: 300px;
            height: 40px;
        }
        tr td input {
            font-size: 20px;
            color: black;
            width: 300px;
            height: 40px;
        }
    </style>
</head>
<body>
<div class="header">
    <img class="logo" src="tt.png" alt="Logo">
    <h3 style="color: white;"><i>ONLINE EMPLOYEE ATTENDANCE SYSTEM</i></h3>
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
                <a href="permission.php">Notification</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#">Tables</a>
            <div class="dropdown-contents">
                <a href="employeetable.php">Employee</a>
                <a href="attendtable.php">Attendance</a>
                <a href="holtable.php">Holiday</a>
                <a href="Notiftable.php">Notification</a>
                <a href="permtable.php">Notification</a>
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
    <form action="" method="POST" onsubmit="return confirmInsert();">
    <p style="font-size: 25px;color: white; font-weight: bold;">Attendance Form</p>
        <table>
            <tr>
                <td>Employee Code</td>
                <td><input type="number" name="code" required></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" name="date" required></td>
            </tr>
            <tr>
                <td>Time In</td>
                <td><input type="time" name="tme" required></td>
            </tr>
            <tr>
                <td>Time Out</td>
                <td><input type="time" name="out" required></td>
            </tr>
            <tr>
                <td>Worked Hours</td>
                <td><input type="number" name="hours" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="send" value="Attend" style="width: 150px; background-color: indigo; color: white; font-size: 30px;">
                    <input type="submit" name="send" value="Cancel" style="width: 150px; background-color: blue; color: white; font-size: 30px;">
                </td>
            </tr>
        </table>
    </form>
    <?php
    include('dbconnection.php');

    if (isset($_POST['send'])) {
        // Retrieve values from form
        $employee_code = $_POST['code'];
        $date = $_POST['date'];
        $time_in = $_POST['tme'];
        $time_out = $_POST['out'];
        $working_hours = $_POST['hours'];

        // Insert new record into the database
        $stmt = $connection->prepare("INSERT INTO attendance (employee_code, Date, time_in, time_out, workinghours) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("sssss", $employee_code, $date, $time_in, $time_out, $working_hours);

        if ($stmt->execute()) {
            // Redirect to attendtable.php after successful insertion
            header('Location: attendtable.php');
            exit(); // Ensure that no other content is sent after the header redirection
        } else {
            echo "Error inserting record: " . $stmt->error;
        }
    }
    ?>
</center>

<footer style="background-color: teal; text-align: center; width: 100%; height: 90px; color: white; font-size: 25px; margin-top: 20px; bottom: 0; left: 0;">
    <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>
</body>
</html>
