<?php
$NIC=$_POST['NIC'];
$check_in=$_POST['check_in'];
$check_out=$_POST['check_out'];
$room_type=$_POST['room_type'];
$phone=$_POST['phone'];
$Food=$_POST['Food'];
$Payment_details=$_POST['Payment_details'];
$Gym_Spa=$_POST['Gym_Spa'];
$Loyalty_card_no=$_POST['Loyalty_card_no'];
$no_of_adults=$_POST['no_of_adults'];
$Conference_room=$_POST['Conference_room'];
$transport=$_POST['transport'];
$daycare_and_nursing=$_POST['daycare_and_nursing'];



$host = "localhost";
$dbusername = "arbaz";
$dbpassword = "fizza";
$dbname = "fyp";
// Create connection
$conn = new  mysqli("localhost", "arbaz", "fizza","fyp");
//$db = mysql_select_db("fyp", $conn);
if (mysqli_connect_error()){
die();
}
else{
	
	$sql="select no_of_rooms from rooms_khi where name='$room_type';";
	$retval=$conn->query($sql);
	$row=$retval->fetch_assoc();
	if($row!=0){
		$new=$row["no_of_rooms"]-1;
		if($row==0 || $row<0)
		{
		echo "your rooms is not available";	
		$sql.="update rooms_khi set no_of_rooms=0 where name='$room_type';";
		}
		else{	$sql.="update rooms_khi set no_of_rooms=$new where name='$room_type';";	
	
	$sql.= "INSERT INTO booking_info_khi(NIC,check_in,check_out,room_type,phone,Food,Payment_details,
	Gym_Spa,Loyalty_card_no,no_of_adults,Conference_room,transport,daycare_and_nursing)
	values($NIC,'$check_in','$check_out','$room_type',$phone,'$Food','$Payment_details',
	'$Gym_Spa',$Loyalty_card_no,$no_of_adults,'$Conference_room','$transport','$daycare_and_nursing');";


		}

	}
	else
	{
		echo "Your desired room is not available.";
	}
$conn->close();
}
?>