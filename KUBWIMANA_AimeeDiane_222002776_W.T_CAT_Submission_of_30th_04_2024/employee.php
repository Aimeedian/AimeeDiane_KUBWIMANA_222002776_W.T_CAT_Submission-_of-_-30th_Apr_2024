<!DOCTYPE html>
<html lang="en">
<head>
<!-- official website designed by G8 on 24th march 2024-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration form</title>
    <style>
         .p1{
            font-family: Elephant;
            font-weight: bold;
            font-size: 20px;
            align-items: center;
        }
        form{
            width: 500px;
            height:580px;
        border: 2px solid red;
        margin-top: 50px;
        background-color: skyblue;
        }
        tr{
            color: deeppink;
            font-size: 25px;
        }
        tr td{
            font-size: 20px;
            color:  black;
            width: 300px;
            height: 40px;
        }
          tr td input{
            font-size: 20px;
            color:  black;
            width: 300px;
            height: 40px;
        }
    body {
            font-family: Arial, sans-serif;
            margin: 10;
            padding: 10;
        }
.navigation a:link{
    color: white;
    background-color:none;
    padding: 5px;
    margin: 5px;
      border-radius: 15px;

}
.navigation a:visited{
    color: white;
    background-color:none;
     padding: 5px;
     margin: 5px;
       border-radius: 15px;
}
.navigation a:hover{
    color: white;
    background-color: none;
     padding: 5px;
     margin: 5px;
     border-radius: 15px;
}
 .navigation a:active{
    color: white;
    background-color: none;
     padding: 5px;
     margin: 5px;
       border-radius: 15px;
}

         .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color:teal;
            border-bottom: 5px solid black;
            position: absolute;
            top: 0px;
            width: 100%;
            left: 0px;
        }
        .logo {
            width: 60px; /* Adjust logo size */
            height: auto;
        }
        .navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align:none;
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
            color: #333;
        }
        .p1{
            font-size: 20px;
            color: black;
        }
        .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    margin-left: 400px;
    margin-top: -200px;
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
                return confirm('Are you sure you want to insert this record?');
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

</head>
<body>


<center>
<p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</i></p>
<form action="" method="POST" onsubmit="return confirmInsert();">
    <table><tr><h3  style="font-size: 20px;color: deeppink;"><i>EMPLOYEE  FORM</i></h3></tr>
    <tr><td>Firstname</td>
    <td><input type="text" name="fname" id="fname"></td>
    </tr>
    <tr><td>Lastname</td>
    <td><input type="text" name="lname" id="lname"></td>
    </tr>
    <tr>
    <td>Username</td>
    <td><input type="text" name="uname"  required=""></td></tr>
    <tr><td>email</td>
    <td><input type="text" name="email"  required=""></td></tr>
    <tr><td>password</td>
    <td><input type="password" name="pword"  required=""></td>
    </tr>
     <tr>
    <td>Telephone</td>
    <td><input type="number" name="phone" value="phone" required="">
    </td></tr>
     <tr><td>hireddate</td>
    <td><input type="date" name="hired"  required=""></td>
    </tr>
    <tr><td>status</td>
    <td><input type="text" name="status"  required=""></td>
    </tr>
     <tr><td>Department_Id</td>
    <td><input type="number" name="dept"  required=""></td>
    </tr>
   

    <tr><td>  </td><td><input type="submit" name="send"  value="Register" style="width: 150px;background-color: indigo;color: white;font-size: 30px;">
    <input type="submit" name="send"  value="Cancel" style="width: 150px;background-color:blue;color: white;font-size: 30px;""></td></tr></table>
</form>

<?php
include "dbconnection.php";
if(isset($_POST['send'])) {
    // Retrieve values from form
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password=password_hash($_POST['pword'], PASSWORD_DEFAULT);
    $telephone = $_POST['phone'];
    $hireddate = $_POST['hired'];
     $h = $_POST['status'];
    $dept = $_POST['dept'];  
    // Insert new record into the database
    $stmt = $connection->prepare("INSERT INTO employee (firstname, lastname, username, email, password, telephone, hireddate, status, dept_id) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");

    $stmt->bind_param("ssssssssi", $firstname, $lastname, $username, $email, $password, $telephone, $hireddate,$h,$dept);

    if ($stmt->execute()) {
         // this message displayed after insert and location reach after insert
       echo "<script>alert('send employee record successfully.'); window.location.href = 'employee.php?id=$user_id';</script>"; 
    } else {
        echo "Error inserting record: " . $stmt->error;
    }
}
?>
<div><footer style="background-color:teal;text-align: center;width:100%;height:70px; color: white;font-size: 25px;"><p style="margin-top: 20px;"> Designed by Aimee Diane KUBWIMANA_222002776 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>
</body>
</html>
