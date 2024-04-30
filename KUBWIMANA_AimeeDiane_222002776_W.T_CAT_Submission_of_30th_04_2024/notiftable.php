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
<center><p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</i></p></center>
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center>
    <h2><i> TABLE FOR NOTIFICATION</h2></i></center>
    <table>
        <tr>
            <th>Notification Id</th>
            <th>Employee_code</th>
            <th>Contect</th>
            <th>Type</th>
            <th>Status</th>
            <th>Sendingdate</th>
            <th colspan="2">Action</th>
        </tr>
        <?php

      include "dbconnection.php";
        $sql = "SELECT * FROM notification";
        $result = $connection->query($sql);

        // Check if there are any notification
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['Id']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['Id'] . "</td>
                    <td>" . $row['employee_code'] . "</td>
                    <td>" . $row['content'] . "</td>
                    <td>" . $row['type'] . "</td>
                    <td>" . $row['Status'] . "</td>
                    <td>" . $row['sendingdate'] . "</td>
                    <td style='background-color:red'><a style='padding:4px' href='delete_notification.php?id=$pid'>Delete</a></td> 
                    <td style='background-color:brown'><a style='padding:4px' href='update_notification.php?id=$pid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
       <center><button style="background-color: indigo; width: 150px;height: 40px;margin-top: 100px;" ><a href="home page.html" style=" font-size: 15px;color: white;text-decoration: none" >Back Home</a></button></center>

    </section>

   <div><footer style="background-color:teal;text-align: center;width:100%;height:90px; color: white;font-size: 25px;margin-top: 20px;bottom: 0px;"><p> Designed by Aimee Diane KUBWIMANA_222002776 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>

</center>

</body>
</html>