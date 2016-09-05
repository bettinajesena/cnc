<?php
    include('../master/connect.php');


  $sql = "SELECT * FROM cage WHERE status = 'active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['cage_id'],$fetch['cage_name'],$fetch['cage_size'],
    	$fetch['price']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    