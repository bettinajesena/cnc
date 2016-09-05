<?php
    include('../master/connect.php');


  $sql = "SELECT * from generic where status='active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['generic_id'],$fetch['generic_name'],
    	$fetch['status']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    