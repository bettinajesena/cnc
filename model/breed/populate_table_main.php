<?php
    include('../master/connect.php');


  $sql = "SELECT breed_id, breed_name, species_name 
  FROM breed1 b, species s
  WHERE b.species_id = s.species_id
  AND (b.status = 'active')
  GROUP BY b.breed_id";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['breed_id'],$fetch['breed_name'],
    	$fetch['species_name']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    