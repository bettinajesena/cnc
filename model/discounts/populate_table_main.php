<?php
    include('../master/connect.php');


  $sql = "SELECT * FROM Discounts WHERE discounts_status = 'active' ORDER BY discounts_rate desc";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['discounts_id'],
    	$fetch['discounts_name'],$fetch['discounts_rate'].' %');				 	
  }         
$conn = null;             

echo json_encode($output);
?>    