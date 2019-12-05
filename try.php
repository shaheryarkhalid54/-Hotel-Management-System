<?php
$NIC=$_POST['NIC'];
$check_in=$_POST['check_in'];
$check_out=$_POST['check_out'];
$room_type=$_POST['room_type'];
$contact=$_POST['phone'];
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
$conn = new mysqli ($host,$dbusername , $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO booking_info_khi(NIC,check_in,check_out,room_type,phone,Food,Payment_details,Gym_Spa,Loyalty_card_no,no_of_adults,Conference_room,transport,daycare_and_nursing)
 values($NIC,'$check_in','$check_out','$room_type','$contact','$Food','$Payment_details','$Gym_Spa',$Loyalty_card_no,$no_of_adults,'$Conference_room','$transport','$daycare_and_nursing');";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();

}
?>