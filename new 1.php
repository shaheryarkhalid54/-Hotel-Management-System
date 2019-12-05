<?php

$c_id = $_POST['c_id'];
$f_name= $_POST['f_name'];
$l_name=$_POST['l_name'];
$Gender=$_POST['Gender'];
$NIC=$_POST['NIC'];
$email=$_POST['email'];
$contact_no=$_POST['contact_no'];
 
 
     $servername="localhost";
	 $dbUsername="arbaz";
	 $dbPassword="fizza";
	 $dbname="fyp";
	 $conn=mysqli_connect($servername,$dbUsername,$dbPassword,$dbname)
	 $sql.="insert into customer_khi(c_id,f_name,l_name,Gender,NIC,email,
		contact_no)
		values('$c_id','$f_name','$l_name','$Gender','$NIC','$email',
		'$contact_no')";
		
	 if (mysqli_multi_query($conn,$sql))
	 {
		 
		 echo 'not inserted';
	 }
	 else
	 {
		 
		 echo"inserted";
	 }
?>