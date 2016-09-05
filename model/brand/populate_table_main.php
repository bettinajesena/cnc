<?php
    include('../master/connect.php');


  $sql = "SELECT brand_id,brand_name, g.generic_name as genericname
  FROM brand b, generic g
  WHERE (b.brand_generic_id = g.generic_id)
  AND (b.brand_status = 'active')
  GROUP BY b.brand_id";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['brand_id'],$fetch['brand_name'],
    	$fetch['genericname']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    