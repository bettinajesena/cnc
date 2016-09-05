<?php
    include('../master/connect.php');


  $sql = "SELECT * from packaging";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['pack_id'],$fetch['pack_name'],
    	$fetch['pack_status']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    