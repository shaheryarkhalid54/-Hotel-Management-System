<?php
$id=$_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username)){
if (!empty($password)){
$host = "localhost";
$dbusername = "arbaz";
$dbpassword = "fizza";
$dbname = "company";
// Create connection
$conn = new mysqli ($host,$dbusername , $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO login(id,username,password)
 values('$id','$username','$password');";
if ($conn->query($sql)){
echo "id created";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "password should not be empty";
die();
}
}
else{
echo "username should not be empty";
die();
}
?>