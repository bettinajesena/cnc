<?php
    include('../master/connect.php');

$date = trim($_POST['booking_date']);
$slots_booked = trim($_POST['slots_booked']);
$name = trim($_POST['owner']);
$pet = trim($_POST['f_pet']);
$service = trim($_POST['f_service']);
$details = trim($_POST['details']);


$id = uniqid('A');

 
		  $sql = "INSERT INTO appointment values(?,?,?,?,?,?,?,?)";
		  $q = $conn->prepare($sql);
		  $q -> execute(array($id,$date,$slots_booked,$name,$pet,$service,$details,'active'));

$conn = null;             

?>    