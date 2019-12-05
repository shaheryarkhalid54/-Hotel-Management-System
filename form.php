<?php

$bid = $_POST['bid'];
$Cid= $_POST['Cid'];
$NIC=$_POST['NIC'];
$room_type=$_POST['room_type'];
$Food=$_POST['Food'];
$Payment_details=$_POST['Payment_details'];
$Gym_Spa=$_POST['Gym_Spa'];
$Loyalty_card_no=$_POST['Loyalty_card_no'];
$no_of_adults=$_POST['no_of_adults'];
$Conference_room=$_POST['Conference_room'];
$transport=$_POST['transport'];
$daycare_and_nursing=$_POST['daycare_and_nursing'];


if(!empty($bid)|| !empty($Cid) || !empty($NIC) || !empty($room_type) || !empty($Food) || !empty($Payment_details)|| !empty($Gym_Spa)|| !empty($no_of_adults) || !empty($Conference_room) || !empty($transport)|| !empty($daycare_and_nursing))
 {
	 $servername="localhost";
	 $dbUsername="arbaz";
	 $dbPassword="fizza";
	 $dbname="fyp";
	 
	 $conn= new mysqli($servername,$dbUsername,$dbPassword,$dbname);
	 
	 if(mysqli_connect_error()){
	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		$SELECT="select bid from booking_info_khi where bid = ? limit 1";
		$INSERT="insert into booking_info_khi(bid,Cid,NIC,room_type,Food,Payment_details,Gym_Spa,Loyalty_card_no,no_of_adults,Conference_room,transport,daycare_and_nursing) values(?,?,?,?,?,?,?,?,?,?,?,?)";
		
		$stmt=$conn->prepare($SELECT);
		$stmt->bind_param("i",$bid);
		$stmt->execute();
		$stmt->bind_result($bid);
		$stmt->store_result();
		$rnum=$stmt->num_rows;
		
		if($rnum==0){
			
			stmt->close();
			$stmt=$conn->prepare($INSERT);
			stmt->bind_param("iiissssiisss",$bid,$Cid,$NIC,$room_type,$Food,$Payment_details,$Gym_Spa,$Loyalty_card_no,$no_of_adults,$Conference_room,$transport,$daycare_and_nursing);
			$stmt->execute();
			echo "successful";
			
		}
		else{
			echo"already present"; 
		}
		stmt->close();
		$conn->close();
	}
 }
 else
 {
	 echo"all fields are required";
	 die();
 }

?>