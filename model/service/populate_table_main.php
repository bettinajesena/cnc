<?php
    include('../master/connect.php');


  $sql = "SELECT * FROM services WHERE status = 'active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['service_id'],$fetch['service_name'],$fetch['category'],
    	$fetch['price']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    