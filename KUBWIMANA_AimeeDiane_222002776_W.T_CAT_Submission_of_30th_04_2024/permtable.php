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
        }
    </style>
</head>
<body> 
<center><p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>EMPLOYEE ATTENDANCE MANAGEMENT SYSTEM</i></p></center>
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div>
<hr>
    <center><h2><i>TABLE FOR EMPLOYEES PERMISSION </h2></i></center>
    <table>
        <tr>
            <th>Permission Id</th>
            <th>Reason for Permission</th>
            <th>Date of Application</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Duration</th>
            <th>Type of permission</th>
            <th>Employee_Code</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        //file contain database connection
    include "dbconnection.php";
        $sql = "SELECT * FROM permission";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['id']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['Reasonforleave'] . "</td>
                    <td>" . $row['Date'] . "</td>
                    <td>" . $row['StartDate'] . "</td>
                    <td>" . $row['EndDate'] . "</td>
                    <td>" . $row['Duration'] . "</td>
                    <td>" . $row['leavetype'] . "</td>
                    <td>" . $row['employee_code'] . "</td>
                    <td><a style='padding:4px' href='delete_permission.php?id=$pid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_permission.php?id=$pid'>Update</a></td> 
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
   <div><footer style="background-color:teal;text-align: center;width:100%;height:90px; color: white;font-size: 25px;margin-top: 20px; position: fixed;bottom: 0px;left: 0;"><p> Designed by Aimee Diane KUBWIMANA_222002776 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>

</center>



</body>
</html>