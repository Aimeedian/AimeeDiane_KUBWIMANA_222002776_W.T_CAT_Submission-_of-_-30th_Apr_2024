<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Employee System</title>
    <style>
        .p1 {
            font-family: Elephant;
            font-weight: bold;
            font-size: 20px;
            /* Removed align-items: center; as it's not applicable */
        }
        form {
            width: 500px;
            height: 400px;
            border: 2px solid red;
            padding: 20px; /* Added padding for better spacing */
        }
        tr {
            color: deeppink;
            font-size: 25px;
        }
        tr td {
            font-size: 20px;
            color: black;
            width: 300px;
            height: 40px;
        }
        tr td input {
            font-size: 20px;
            color: black;
            width: 300px;
            height: 40px;
            box-sizing: border-box; /* Added for consistent input sizing */
        }
    </style>
</head>
<body>
<center>
    <form action="" method="POST">
        <table>
            <tr>
                <td colspan="2"><h3 style="font-size: 20px;color: deeppink;"><i>ADMIN FORM</i></h3></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="user" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="em" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="psword" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="send" value="Send" style="width: 150px;background-color: violet;color: white;font-size: 30px;">
                    <input type="reset" value="Cancel" style="width: 150px;background-color: violet;color: white;font-size: 30px;">
                </td>
            </tr>
        </table>
    </form>

    <?php
    // Connection details
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "employee_attendance";

    // Establishing connection
    $connection = new mysqli($host, $user, $pass, $dbname);

    // Checking connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Selecting database
    $connection->select_db($dbname);

    // Inserting data into the database
    if (isset($_POST['send'])) {
        $username = $_POST['user'];
        $email = $_POST['em'];
        $password = $_POST['psword'];

        $sql = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($connection->query($sql) === TRUE) {
            echo "Data inserted successfully<br>";
            header("location:adminlogin.php");
        } else {
            echo "Error inserting data: " . $connection->error;
        }
    }

    // Closing connection
    $connection->close();
    ?>

    <footer style="background-color:pink;text-align: center;width:100%;height:auto; color: white;font-size: 25px;">
        <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</center>
</body>
</html>
