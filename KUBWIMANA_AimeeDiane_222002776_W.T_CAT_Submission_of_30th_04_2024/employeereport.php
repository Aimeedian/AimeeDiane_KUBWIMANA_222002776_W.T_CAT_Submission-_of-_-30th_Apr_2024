<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>online attendance system</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 0px;
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
    </form></div>

<hr>

    <h2><i>Table For Employees</h2></i></center>
    <table>
        <tr>
            <th>Employee Code</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Password</th>
            <th>Telephone</th>
            <th>Hired_Date</th>
            <th>Status</th>
            <th>DepartmentId</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
       include "dbconnection.php";
        $sql = "SELECT * FROM employee";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['employee_code']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['employee_code'] . "</td>
                    <td>" . $row['firstname'] . "</td>
                    <td>" . $row['lastname'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['telephone'] . "</td>
                    <td>" . $row['hireddate'] . "</td>
                     <td>" . $row['status'] . "</td>
                    <td>" . $row['dept_id'] . "</td>
                    <td style='background-color:red'><a style='padding:4px' href='delete_employee.php?employee_code=$pid'>Delete</a></td> 
                    <td style='background-color:red'><a style='padding:4px' href='update_employee.php?employee_code=$pid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
    <center><button style="background-color: indigo; width: 150px;height: 40px;margin-top: 100px;" ><a href="admin dashboard.html" style=" font-size: 15px;color: white;text-decoration: none" >Back</a></button></center>

    </section>
<div><footer style="background-color:pink;text-align: center;width:100%;height:auto; color: white;font-size: 25px;"><p> Designed by Aimee Diane KUBWIMANA_222002776 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>
</center>


</body>
</html>