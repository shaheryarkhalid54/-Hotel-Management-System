<?php
$bid=$_POST['bid'];
$cid=0;
$inumber=1;
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
		$sql="SELECT DATEDIFF('check_in','check_out') from booking_info_khi where bid=$bid;";	
		
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
		/////room checking block
		if($roomtype=="double deluxe")
		{
			$bill=$bill+8000;
		}
		else if($roomtype=="economy double")
		{
			$bill=$bill+8000;
		}
		else if($roomtype=="economy single")
		{
			$bill=$bill+4000;
		}
		else if($roomtype=="single deluxe")
		{
			$bill=$bill+8000;
		}
		else if($roomtype=="Suite")
		{
			$bill=$bill+32000;
		}
		else{
			
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
		
		echo $bill;
		
	   
	
		
}
$conn->close();
?>


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
<?php

$conn = new mysqli($host,$dbusername , $dbpassword, $dbname);
$sql="INSERT INTO `billing_record_khi`(`invoice_no`, `b_id`, `c_id`, `bill`, `balance`) VALUES (1,$bid,$cid,$bill,$balance)";
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




