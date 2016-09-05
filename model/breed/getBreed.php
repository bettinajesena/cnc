<?php
    include('../master/connect.php');

  $species_id = trim($_POST['species_id']);

  $sql = "SELECT breed_id, breed_name, species_name 
  FROM breed1 b, species s
  WHERE b.species_id = s.species_id
  AND (s.species_id = ?)
  AND (b.status = 'active')
  GROUP BY b.breed_id";
  $q = $conn->prepare($sql);
  $q -> execute(array($species_id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['breed_id'],$fetch['breed_name'],
    	$fetch['species_name']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    