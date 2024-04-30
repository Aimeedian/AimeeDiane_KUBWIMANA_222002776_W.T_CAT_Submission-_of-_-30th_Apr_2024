
<?php  
//php file contain database connection
$servername="localhost";
$username="Aimee";
$password="222002776";
$dbname="aimeediane_kubwimana";
$connection=new mysqli($servername,$username,$password,$dbname);
if ($connection->connect_error) {
	die("connection failed.".$connection->connect_error);
}
$connection->select_db($dbname);
?>
