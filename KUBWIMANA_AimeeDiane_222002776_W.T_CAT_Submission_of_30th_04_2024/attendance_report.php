<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>online employee system</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: indigo;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body> 
<center><p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</i></p></center><hr>
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div><hr>
    <center><h2><i> my attendance reports</h2></i></center>
    <table>
        <tr>
            <th>Attendance Id</th>
            <th>Employee_Code</th>
            <th>Date</th>
            <th>Time_In</th>
            <th>Time_Out</th>
            <th>workinghours</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        // Define connection parameters
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "employee_attendance";

        // Establish a new connection
        $connection = new mysqli($host, $user, $pass, $database);

        // Check if connection was successful
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Prepare SQL query to retrieve all products
        $sql = "SELECT * FROM attendance";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['id']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['employee_code'] . "</td>
                    <td>" . $row['Date'] . "</td>
                    <td>" . $row['time_in'] . "</td>
                    <td>" . $row['time_out'] . "</td>
                    <td>" . $row['workinghours'] . "</td>
                    <td style='background-color:red'><a style='padding:4px' href='delete_attendance.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:red'><a style='padding:4px' href='update_attendance.php?id=$pid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
    <center><button style="background-color: indigo; width: 150px;height: 40px;" ><a href="admin dashboard.html" style=" font-size: 15px;color: white;text-decoration: none;margin-top: 400px;" >Back Home</a></button></center>
</body>

<div><footer style="background-color:teal;text-align: center;width:100%;height:auto; color: white;font-size: 25px; bottom: 0;position: fixed;"><p> Designed by Aimee Diane KUBWIMANA_222002776 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>

</body>
</html>