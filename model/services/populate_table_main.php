<?php
    include('../master/connect.php');


  $sql = "SELECT * FROM transac_products WHERE status = 'active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['client_name'],$fetch['products'],$fetch['quantity'],$fetch['date'],$fetch['total']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    