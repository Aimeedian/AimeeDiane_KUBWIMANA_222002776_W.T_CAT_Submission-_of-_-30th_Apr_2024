<?php
//file contains database connection
include "dbconnection.php";

// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM attendance WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['employee_code'];
        $x = $row['Date'];
        $z = $row['time_in'];
        $b = $row['time_out']; // Corrected 'Status' to 'status'
        $c = $row['workinghours'];
    } else {
        echo "User not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>update attendance record</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
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
            margin-bottom: 5px;
            display: block;
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
    </style></head>
<body>
    <form method="POST" onsubmit="return confirmUpdate();">
    <center><p style="color: deeppink;font-size: 20px;">update notification records</p></center>
        <label for="employee_code">Employee_code:</label>
        <input type="text" name="employee_code" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="Date">Date:</label>
        <input type="text" name="Date" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="time_in">Time_in:</label>
        <input type="time" name="time_in" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="time_out">Time_out:</label>
        <input type="time" name="time_out" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="workinghours">workinghours:</label>
        <input type="number" name="workinghours" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $firstname = $_POST['employee_code'];
    $lastname = $_POST['Date'];
    $username = $_POST['time_in'];
    $email = $_POST['time_out'];
    $password = $_POST['workinghours'];
    // Update the user in the database
    $stmt = $connection->prepare("UPDATE attendance SET employee_code=?, Date=?, time_in=?, time_out=?, workinghours=? WHERE id=?");

    $stmt->bind_param("sssssi", $firstname, $lastname, $username, $email, $password, $user_id);

    if ($stmt->execute()) {
      echo "<script>alert('attendance updated successfully.'); window.location.href = 'attendance.php?id=$user_id';</script>";
        exit();
    } else {
        echo "<script>alert('Fail in editting record.');</script>" . $stmt->error;
    }
}
?>
