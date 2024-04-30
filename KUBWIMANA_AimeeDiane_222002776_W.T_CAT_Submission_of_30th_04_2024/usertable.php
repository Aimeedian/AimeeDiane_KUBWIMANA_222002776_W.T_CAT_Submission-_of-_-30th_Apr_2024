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
            padding: 8px;
            text-align: left;
        }

      
        th {
            background-color: indigo;
            color: white;
        }
    </style>
</head>
<body>
<center><p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</i></p></center><hr>
    <center>
  <div><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
    </form></div><h2><i>Table For All users</h2></i></center>
    <table>
        <tr>
            <th>User Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Password</th>
            <th>Telephone</th>
            <th>Hired_Date</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection connection
       include "dbconnection.php";

        // Prepare SQL query to retrieve all products
        $sql = "SELECT * FROM register";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['id']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['firstname'] . "</td>
                    <td>" . $row['lastname'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['telephone'] . "</td>
                    <td>" . $row['hireddate'] . "</td>
                    <td style='background-color:red'><a style='padding:4px' href='adelete.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:red'><a style='padding:4px' href='update_user.php?id=$pid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
 <center><button style="background-color: indigo; width: 150px;height: 40px;margin-top: 100px;" ><a href="admin dashboard.html" style=" font-size: 15px;color: white;text-decoration: none" >Back Home</a></button></center>
    </section>



</body>
</html>