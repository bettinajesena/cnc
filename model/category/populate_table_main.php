<?php
    include('../master/connect.php');


  $sql = "SELECT * from category where cat_status='active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['cat_id'],$fetch['cat_name'],$fetch['category_use'],
    	$fetch['cat_status']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    