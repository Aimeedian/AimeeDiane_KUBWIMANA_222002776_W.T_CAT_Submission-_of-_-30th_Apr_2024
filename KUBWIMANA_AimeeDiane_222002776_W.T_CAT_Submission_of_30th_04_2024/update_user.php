<?php
//file contain database connection
include "dbconnection.php";

// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM register WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['firstname'];
        $x = $row['lastname'];
        $z = $row['username'];
        $b = $row['email'];
        $c = $row['password'];
        $d = $row['telephone'];
        $y = $row['hireddate'];
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
    <center><p style="color: deeppink;font-size: 20px;">update user records</p></center>
        <label for="firstname">First Name:</label><br>
        <input type="text" name="firstname" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="password">Password:</label>
        <input type="text" name="password" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>
        <label for="telephone">Telephone:</label>
        <input type="text" name="telephone" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>
        <label for="hireddate">Hire Date:</label>
        <input type="date" name="hireddate" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $hireddate = $_POST['hireddate'];

    // Update the user in the database
    $stmt = $connection->prepare("UPDATE register SET firstname=?, lastname=?, username=?, email=?, password=?, telephone=?, hireddate=? WHERE id=?");

    $stmt->bind_param("sssssssi", $firstname, $lastname, $username, $email, $password, $telephone, $hireddate, $user_id);

    if ($stmt->execute()) {
       echo "<script>alert('attendance updated successfully.'); window.location.href = 'usertable.php?id=$user_id';</script>";
        exit();
    } else {
        echo "Error updating user: " . $stmt->error;
    }
}
?>
