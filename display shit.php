
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
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
      <a class="navbar-brand" href="index.html">Mövenpick Hotel</a>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Home</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="display shit.php">Bookings</a>
          </li>
		            <li class="nav-item">
            <a class="nav-link" href="maintainance.php">Maintainance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="createcustomer.html">New Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.html">Logout</a>
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
<th>NIC</th>
<th>Check IN</th>
<th>Check OUT</th>
<th>Room type</th>
<th>Food Service</th>
<th>Payment Type</th>
<th>Gym & Spa</th>
<th>Loyalty Card No.</th>
<th>No. of Adults</th>
<th>Conference Room</th>
<th>Transport Service</th>
<th>Daycare & Nursing</th>
<th>Status</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "arbaz","fizza", "fyp");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT bid,NIC,check_in,check_out,room_type,Food,Payment_details,Gym_spa,Loyalty_card_no,no_of_adults,Conference_room,transport,daycare_and_nursing from booking_info_khi";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["bid"]. "</td><td>" . $row["NIC"] . "</td><td>" . $row["check_in"]. "</td>
<td>" . $row["check_out"]. "</td><td>" . $row["room_type"]. "</td><td>" . $row["Food"]. "</td><td>" . $row["Payment_details"]. "</td>
<td>" . $row["Gym_spa"]. "</td><td>" . $row["Loyalty_card_no"]. "</td><td>" . $row["no_of_adults"]. "</td><td>" . $row["Conference_room"]. "</td>
<td>" . $row["transport"]. "</td><td>" . $row["daycare_and_nursing"]. "</td>
<td>"?>
<html>
<head>
</head>
<body>
</body>
<input href="CHECK_IN.php" type="submit" name="Submit" value="CHECK_IN" />
<input href="CHECK_OUT.php" type="submit" name="Submit" value="CHECK_OUT"" />
</html>
<?php

"</td></tr>";

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





