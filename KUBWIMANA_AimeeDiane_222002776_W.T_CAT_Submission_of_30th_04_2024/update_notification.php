<?php
// file contain database connection
include "dbconnection.php";

// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM notification WHERE id =?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['employee_code'];
        $x = $row['content'];
        $z = $row['type'];
        $b = $row['Status']; // Corrected 'Status' to 'status'
        $c = $row['sendingdate'];
    } else {
        echo "User not found.";
    }
}

$stmt->close(); // Close the statement after use

?>

<!DOCTYPE html>
<html>
<head>
   <head><title>update employee record</title> 
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
<html>

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
        <label for="content">content:</label>
        <input type="text" name="content" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="type">type:</label>
        <input type="text" name="type" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="status">status:</label>
        <input type="text" name="status" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="sendingdate">senddate:</label>
        <input type="text" name="senddate" value="<?php echo isset($c) ? $c : ''; ?>">
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
    $lastname = $_POST['content'];
    $username = $_POST['type'];
    $email = $_POST['status'];
    $password = $_POST['senddate'];
    // Update the user in the database
    $stmt = $connection->prepare("UPDATE notification SET employee_code=?, content=?, type=?, Status=?, sendingdate=? WHERE id=?");

    $stmt->bind_param("sssssi", $firstname, $lastname, $username, $email, $password, $user_id); // Corrected binding parameters

    if ($stmt->execute()) {
        echo "<script>alert('attendance updated successfully.'); window.location.href = 'notification.php?id=$user_id';</script>";
        exit(); 
    } else {
        echo "Error updating user: " . $stmt->error;
    }
}
?>
