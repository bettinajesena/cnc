<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM vaccines WHERE vaccine_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['vaccine_name'],$fetch['content'],$fetch['unit_modifier'],$fetch['price'],$fetch['description']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    