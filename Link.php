<?php

$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$idcard=$_POST["idcard"];
$arrive=$_POST["arrive"];
$depart=$_POST["depart"];
$people=$_POST["people"];
$room=$_POST["room"];
$bed=$_POST["bed"];

$conn = new mysqli('localhost','root','','booking');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into booking(Name, Email, Phone, Aadhar_No, Check_In, Check_Out, People, Room_Type, Bedding) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiississ", $name, $email, $phone, $idcard, $arrive, $depart, $people, $room, $bed);
		$stmt->execute();
		echo "Booking Confirmed";
		$stmt->close();
		$conn->close();
	}
?>
