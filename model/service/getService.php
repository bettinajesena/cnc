<?php
    include('../master/connect.php');

  $category = trim($_POST['category']);

  $sql = "SELECT service_id, service_name, category
  FROM services
  WHERE category = ?
  AND (status = 'active')";
  $q = $conn->prepare($sql);
  $q -> execute(array($category));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['service_id'],$fetch['service_name'],
    	$fetch['category']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    