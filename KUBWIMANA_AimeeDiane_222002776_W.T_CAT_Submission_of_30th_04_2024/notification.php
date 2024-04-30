<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Employee System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color:teal;
            border-bottom: 5px solid black;
            top: 0;
            width: 100%;
            color: white;
            margin: 10px;
        }

        .logo {
            width: 60px;
            height: auto;
        }

        .navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
            color: white;
        }

        .navigation li {
            display: inline-block;
            margin-right: 15px;
        }

        .navigation li:last-child {
            margin-right: 0;
        }

        .navigation li a {
            text-decoration: none;
            color: #333;
            padding: 5px;
            border-radius: 15px;
            color: white;
        }

        .navigation li a:hover {
            background-color: lightgray;
        }

        .container {
            width: 500px;
            margin: 100px auto;
            padding: 20px;
            border: 2px solid red;
            background-color: skyblue;
            border-radius: 10px;
        }

        .container h3 {
            font-size: 20px;
            color: deeppink;
            margin-bottom: 20px;
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

    <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you ready to insert this data?');
            }
        </script>
</head>
<body>
<div class="header">
    <img class="logo" src="tt.png" alt="Logo">
    <h3><i>ONLINE EMPLOYEE ATTENDANCE SYSTEM</i></h3>
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
<center><p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</i></p></center>
<div class="container">
    <h3><i>NOTIFICATION FORM</i></h3>
    <form method="post" onsubmit="return confirmInsert();">
        <table>
            <tr>
                <td>Employee Code</td>
                <td><input type="number" name="code" required></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><input type="text" name="cnt" required></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><input type="text" name="t" required></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" name="s" required></td>
            </tr>
            <tr>
                <td>Send Date</td>
                <td><input type="date" name="sd" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="send" value="Send">
                    <input type="submit" name="send" value="Cancel">
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
// file contain database connection
include "dbconnection.php";
if (isset($_POST['send'])) {
    // Retrieve values from form
    $employee_code = $_POST['code'];
    $content = $_POST['cnt'];
    $type = $_POST['t'];
    $status = $_POST['s'];
    $sendingdate = $_POST['sd'];
    // Insert new record into the database
    $stmt = $connection->prepare("INSERT INTO notification (employee_code, content, type, status, sendingdate) VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $employee_code, $content, $type, $status, $sendingdate);

    if ($stmt->execute()) {
           echo "<script>alert('send notification successfully.'); window.location.href = 'notification.php?id=$user_id';</script>";
        exit();
    } else {
        echo "Error inserting record: " . $stmt->error;
    }
}
// Close connection
$connection->close();
?>

<script>
    function validateForm() {
        var form = document.getElementById("notificationForm");
        var code = form.elements["code"].value;
        var cnt = form.elements["cnt"].value;
        var t = form.elements["t"].value;
        var s = form.elements["s"].value;
        var sd = form.elements["sd"].value;

        if (!code || !cnt || !t || !s || !sd) {
            alert("Please fill in all fields");
            return false;
        }

        return true;
    }
</script>
   <div><footer style="background-color:teal;text-align: center;width:100%;height:90px; color: white;font-size: 25px;margin-top: 20px;bottom: 0px;left: 0;"><p> Designed by Aimee Diane KUBWIMANA_222002776 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>


</body>
</html>
