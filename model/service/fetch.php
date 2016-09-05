<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM services WHERE service_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['service_name'],$fetch['category'],$fetch['price']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    