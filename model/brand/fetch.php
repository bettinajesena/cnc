<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM brand WHERE brand_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['brand_name'],$fetch['brand_generic_id']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    