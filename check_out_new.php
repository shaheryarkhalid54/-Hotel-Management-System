
//getting no of days 
<?php
$bid=$_POST['bid'];
$cid=0;
$inumber=mt_rand(1,1000);
$bill=0;
$balance=0;
$host = "localhost";
$dbusername = "arbaz";
$dbpassword = "fizza";
$dbname = "fyp";
$row;
// Create connection
$conn = new mysqli($host,$dbusername , $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
		$sql="SELECT To_days( check_out ) - TO_DAYS( check_in ) as mydiff from booking_info_khi where bid=$bid;";	
		$retval2=$conn->query($sql);
		$row2=$retval2->fetch_array();
		$new2=$row2['mydiff'];
}
$conn->close();
?>

//extracting values from table of booking 
<?php
		$conn = new mysqli($host,$dbusername , $dbpassword, $dbname);
		$sql="select NIC,room_type,Food,Gym_Spa,Conference_room,transport,daycare_and_nursing
		from booking_info_khi where bid=$bid ;";
		$retval=$conn->query($sql);
		while($row=$retval->fetch_array()){
		$cid=$row["NIC"];
		$roomtype= $row["room_type"];
		$food= $row["Food"];
		$gymspa= $row["Gym_Spa"];
		$Conference= $row["Conference_room"];
		$trans= $row["transport"];
		$care= $row["daycare_and_nursing"];	
		}
	   //////////the other facilities block
     	if($food=="yes")
		{
			$bill=$bill+2000;
		}
	    if($gymspa=="yes")
		{
			$bill=$bill+3000;
		}
	    if($Conference=="yes")
		{
			$bill=$bill+3000;
		}
		if($trans=="yes")
		{
			$bill=$bill+2000;
		}
		if($care=="yes")
		{
			$bill=$bill+5000;
		}
$conn->close();
?>

//extracting price of room 

<?php
$conn = new mysqli($host,$dbusername , $dbpassword, $dbname);
$sql="select no_of_rooms from rooms_khi where name='$roomtype';";
	$retval4=$conn->query($sql);
	$row4=$retval4->fetch_assoc();
	if($row4!=0){
		echo $row4["no_of_rooms"];
		$new4=$row4["no_of_rooms"]+1;
	echo $new4;}
$conn->close();
?>

//extracting and adding room value 
<?php
$conn = new mysqli($host,$dbusername , $dbpassword, $dbname);
$sql="UPDATE `rooms_khi` SET `no_of_rooms`=[$new4] WHERE name='$roomtype';";
$conn->close();
?>
//updating value of room
<?php
$conn = new mysqli($host,$dbusername , $dbpassword, $dbname);
$sql="SELECT `cost_per_night` as cost FROM `rooms_khi` WHERE name='$roomtype'";
		$retval3=$conn->query($sql);
		$row3=$retval3->fetch_array();
		$new3=$row3['cost'];

			$bill=$bill+($new3*$new2);
			echo $bill;
	if ($conn->query($sql)==True){
			echo "Working shit";
		}
		else{
				echo "Error: ". $sql ."
			". $conn->error;
		}
$conn->close();
?>

//updating status of booking 
<?php
$conn = new mysqli($host,$dbusername , $dbpassword, $dbname);
$sql="update booking_info_khi set status=0 where bid='$bid';";
	if ($conn->query($sql)==True){
			echo "Working shit";
		}
		else{
				echo "Error: ". $sql ."
			". $conn->error;
		}
$conn->close();
?>

//insert value into billing record 
<?php

$conn = new mysqli($host,$dbusername , $dbpassword, $dbname);
$sql="INSERT INTO `billing_record_khi`(`invoice_no`, `b_id`, `c_id`, `bill`, `balance`) VALUES ($inumber,$bid,$cid,$bill,$balance)";
 echo " done ";

	if ($conn->query($sql)==True){
			echo "Working shit";
		}
		else{
				echo "Error: ". $sql ."
			". $conn->error;
		}


$conn->close();
?>





<!DOCTYPE html>
<html>
<head>
<title>Hotel Management System</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 20px;
text-align: left;
}
th {
background-color: #343a40;
color: white;
text-align:left;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Mövenpick Hotel</a>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Home</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="display12.php">Bookings</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="maintainance.php">Maintainance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="createcustomer.html">New Customer</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="check_in.html">Check in</a>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" href="check_out.html">Check Out</a>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" href="login.php">Logout</a>
          </li>
		  
		  
        </ul>
      </div>
    </div>
  </nav>





 <div class="container">
<br>
<br>
<br>
<table>
<tr>
<th>BOOKING ID</th>
<th>Check IN</th>
<th>Check OUT</th>
<th>STATUS</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "arbaz","fizza", "fyp");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT bid,check_in,check_out,status from booking_info_khi";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_array()) {
echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["check_in"]. "</td>
<td>" . $row["check_out"]. "</td> <td>" . $row["status"]. "</td></tr>";

}
echo "</table>";
}
else 
{	echo "0 results"; }
$conn->close();
?>

</table>


</div>

 <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>
