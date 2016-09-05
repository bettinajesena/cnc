<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM discounts WHERE discounts_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['discounts_name'],$fetch['discounts_rate']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    