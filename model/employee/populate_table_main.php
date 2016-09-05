<?php
    include('../master/connect.php');


  $sql = "SELECT * FROM employee1 WHERE status = 'active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['user_id'],$fetch['name'],
    	$fetch['contact_no'],$fetch['address'],
    	$fetch['job'],$fetch['license']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    