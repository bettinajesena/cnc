<?php

include('php/connect.php'); 

if(isset($_POST['slots_booked'])) $slots_booked = mysqli_real_escape_string($link, $_POST['slots_booked']);
if(isset($_POST['f_owner'])) $owner = mysqli_real_escape_string($link, $_POST['f_owner']);
if(isset($_POST['f_pet'])) $pet = mysqli_real_escape_string($link, $_POST['f_pet']);
if(isset($_POST['f_service'])) $service = mysqli_real_escape_string($link, $_POST['f_service']);
if(isset($_POST['details'])) $details = mysqli_real_escape_string($link, $_POST['details']);
if(isset($_POST['booking_date'])) $booking_date = mysqli_real_escape_string($link, $_POST['booking_date']);


$booking_array = array(
	"slots_booked" => $slots_booked,	
	"booking_date" => $booking_date,
	"name" => $owner,
	"pet" => $pet,
	"service" => $service,
	"details" => $details
);

$id= uniqid('A');
$status='active';

$explode = explode('|', $slots_booked);

foreach($explode as $slot) {

	if(strlen($slot) > 0) {

		$stmt = $link->prepare("INSERT INTO appointment (app_id,date,start,name,pet_name,service,details,status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"); 
		$stmt->bind_param('ssssssss',$id, $booking_date, $slot, $owner, $pet, $service, $details, $status);
		$stmt->execute();
		
	} // Close if
	
} // Close foreach

?>


2
3
<script>
  window.location.href = "main.php";
</script>
