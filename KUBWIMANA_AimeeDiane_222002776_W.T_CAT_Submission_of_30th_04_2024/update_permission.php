<?php
// File contains database connection
include "dbconnection.php";
// Check if user_id is set
if(isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];
    
    // Prepare and execute SELECT statement to retrieve user_id details
    $stmt = $connection->prepare("SELECT * FROM permission WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['Reasonforleave'];
        $x = $row['Date'];
        $z = $row['StartDate'];
        $b = $row['EndDate'];
        $c = $row['Duration'];
        $d = $row['leavetype'];
        $y = $row['employee_code'];
       
    } else {
        echo "User not found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Permission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border: 2px solid red;
            border-radius: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: calc(100% - 22px); /* Adjusting width to account for padding and border */
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
            margin-top: 5px;
        }
        input[type="submit"],
        input[type="reset"] {
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
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>

    <form method="POST" onsubmit="return confirmUpdate();">
   <center><p style="color: deeppink;font-size: 20px;">update Leave records</p></center>
        <label for="reason">Reason:</label>
        <input type="text" name="reason" id="reason" value="<?php echo isset($a) ? $a : ''; ?>" required>
        <br><br>
        <label for="date">Apply date:</label>
        <input type="date" name="date" id="date" value="<?php echo isset($x) ? $x : ''; ?>" required>
        <br><br>
        <label for="StartDate">Start date:</label>
        <input type="date" name="StartDate" id="StartDate" value="<?php echo isset($z) ? $z : ''; ?>" required>
        <br><br>
        <label for="EndDate">End date:</label>
        <input type="date" name="EndDate" id="EndDate" value="<?php echo isset($b) ? $b : ''; ?>" required>
        <br><br>
        <label for="Duration">Duration:</label>
        <input type="text" name="Duration" id="Duration" value="<?php echo isset($c) ? $c : ''; ?>" required>
        <br><br>
        <label for="leavetype">Leave type:</label>
        <input type="text" name="leavetype" id="leavetype" value="<?php echo isset($d) ? $d : ''; ?>" required>
        <br><br>
        <label for="employee_code">Employee code:</label>
        <input type="number" name="employee_code" id="employee_code" value="<?php echo isset($y) ? $y : ''; ?>" required>
        <br><br>
       
        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>

    <script>
        function validateForm() {
            var reason = document.getElementById("reason").value;
            var applyDate = document.getElementById("date").value;
            var startDate = document.getElementById("StartDate").value;
            var endDate = document.getElementById("EndDate").value;
            var duration = document.getElementById("Duration").value;
            var leaveType = document.getElementById("leavetype").value;
            var employeeCode = document.getElementById("employee_code").value;

            if (reason === "" || applyDate === "" || startDate === "" || endDate === "" || duration === "" || leaveType === "" || employeeCode === "") {
                alert("All fields are required");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $reason = $_POST['reason'];
    $date = $_POST['date'];
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $duration = $_POST['Duration'];
    $leaveType = $_POST['leavetype'];
    $employeeCode = $_POST['employee_code'];

    // Update the users in the database
    $stmt = $connection->prepare("UPDATE permission SET Reasonforleave=?, date=?, StartDate=?, EndDate=?, Duration=?, leavetype=?, employee_code=? WHERE id=?");

    $stmt->bind_param("ssssssss", $reason, $date, $startDate, $endDate, $duration, $leaveType, $employeeCode, $user_id);
    
    if ($stmt->execute()) {
       echo "<script>alert('attendance updated successfully.'); window.location.href = 'permission.php?id=$user_id';</script>";
        exit();
    } else {
         echo echo "<script>alert('fail in editing record.');</script>" . $stmt->error;
    }
}
?>
