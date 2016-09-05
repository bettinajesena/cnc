<?php
    include('../master/connect.php');


  $sql = "SELECT a.app_id as app_id, c.clients_name as client, p.pet_name as pet, a.date as date, a.start as start, s.service_name as service, a.details as details from appointment a, clients c, patient p, services s
where
a.name=c.clients_id
AND (a.pet_name=p.pet_id)
AND (a.service=s.service_id)";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['app_id'],$fetch['client'],$fetch['pet'],$fetch['date'],$fetch['start'],$fetch['service'],
    	$fetch['details']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    