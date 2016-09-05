<?php
    include('../master/connect.php');


  $sql = "SELECT * from species where status='active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['species_id'],
    	$fetch['species_name']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    