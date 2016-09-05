<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM patient WHERE pet_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['owner_id'],$fetch['pet_name'],$fetch['species'],$fetch['breed'],$fetch['color'],$fetch['markings'],
      $fetch['birthdate'],$fetch['sex']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    