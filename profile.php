<?php
$username=$_POST['username'];
$password=$_POST['password'];

$username=stripcslashes($username);
$password=stripcslashes($password);

$username=mysql_real_escape_string($username);
$password=mysql_real_escape_string($password);

mysql_connect("localhost","arbaz","fizza");
mysql_select_db("company");

$result=mysql_query("select * from login where username='$username' and
 password='$password'") or die("failed to query database".mysql_error());
 $row=mysql_fetch_array($result);
 if($row['username']==$username && $row['password']==$password)
 {
	 echo "login successfull ".$row['username'];
	 
	 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hotel Management System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
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


  <!-- Page Content -->
  <div class="container">
   

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">BOOK HERE
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">BOOKING</li>
    </ol>

    <div class="jumbotron">
      
	  
		<form name="myForm" action="abc.php" method="post" style="  width:200px;
    text-align:left;
    padding:20px" onsubmit="return validateForm()">
	CNIC:<input type="number" name="NIC" required><br/><br/>
	
	Check_in:<input type="date" name="check_in" required><br/><br/>
	
	Check_out:<input type="date" name="check_out" required><br/><br/>

	<br/><label>Room_Type</label>
             <select id = "myList" name= "room_type">
               <option value = "economy single">economy single</option>
               <option value = "economy double">economy double</option>
               <option value = "single deluxe">single deluxe</option>
               <option value = "double deluxe">double deluxe</option>
			   <option value = "Suite">Suite</option>
             </select>
			 Contact No:<br/><input type="number" name="phone" required><br/><br/>
			 
		<br/><label>Food</label>
             <select id = "myList" name="Food">
               <option value = "YES">YES</option>
               <option value = "NO">NO</option>
             </select>
		<br/>Payment_details:<br/><input type="radio" name="Payment_details" value="Credit_card" required>Credit card <br/>
		<input type="radio" name="Payment_details" value="Cash" required >Cash <br/><br/>
		<label>Gym_Spa</label>
             <select id = "myList" name="Gym_Spa" >
               <option value = "YES">YES</option>
               <option value = "NO">NO</option>
     
	 </select>
	 	Loyalty Card no:<br/><input type="text" name="Loyalty_card_no"  required/>
		No.of Adults:<br/><input type="number" name="no_of_adults" required><br/>
		<label>Conference_room</label>
             <select name="Conference_room" id = "myList">
               <option value = "YES">YES</option>
               <option value = "NO">NO</option>
             </select>
		<br/><label>Transport</label>
             <select name="transport" id = "myList">
               <option value = "YES">YES</option>
               <option value = "NO">NO</option>
             </select>
		<label>Daycare_and_nursing</label>
             <select name="daycare_and_nursing" id = "myList">
               <option value = "YES">YES</option>
               <option value = "NO">NO</option>
             </select>
<br/>




	
	
	
		<input type="submit" name="   Enter   " value="  Enter  " style="font-size: 20px"><br/><br/>

      
    </div>
    <!-- /.jumbotron -->

  </div>
  <!-- /.container -->


  <!-- Footer -->
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
<?php		 
 }
 else{
	 echo "failed to login ";
 }







?>