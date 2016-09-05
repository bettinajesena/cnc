<?php
    include('../master/connect.php');


  $sql = "SELECT * FROM unit_modifier WHERE unit_status = 'active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['unit_id'],$fetch['unit_name'],$fetch['unit_abbreviation']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    