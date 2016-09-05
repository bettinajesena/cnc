<?php
    include('../master/connect.php');

  $client_id = trim($_POST['client_id']);

  $sql = "SELECT owner_id, pet_id, pet_name
  FROM patient p, clients c
  WHERE p.owner_id = c.clients_id
  AND (c.clients_id = ?)
  AND (p.status = 'active')";
  $q = $conn->prepare($sql);
  $q -> execute(array($client_id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['owner_id'],$fetch['pet_id'],
    	$fetch['pet_name']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    