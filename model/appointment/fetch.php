<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM breed1 WHERE breed_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['breed_name'],$fetch['species_id']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    