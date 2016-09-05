<?php
    include('../master/connect.php');


  $sql = "SELECT p.pet_id as id, p.pet_name as name, p.color as color, p.markings as markings, p.sex as sex, p.birthdate as birthdate, TIMESTAMPDIFF(YEAR, p.birthdate , CURDATE()) as age, c.clients_name as owner, b.breed_name as breed,s.species_name as species FROM patient p, breed1 b, species s,clients c WHERE p.breed = b.breed_id AND (p.species = s.species_id)AND (p.owner_id = c.clients_id) AND (p.status = 'active') GROUP BY p.pet_id";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['id'],$fetch['owner'],$fetch['name'],
    	$fetch['breed'],$fetch['species'],$fetch['color'],$fetch['markings'],$fetch['birthdate'],
      $fetch['age'],$fetch['sex']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    