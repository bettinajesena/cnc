<?php
    include('../master/connect.php');


  $sql = "SELECT * from dosage where dosage_status='active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['dosage_id'],$fetch['dosage_name'],
    	$fetch['dosage_status']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    