<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM medicines WHERE medicine_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['medicine_name'],$fetch['category'],$fetch['packaging'],$fetch['dosage'],$fetch['generic'],
      $fetch['brand'],$fetch['content'],$fetch['unit'],$fetch['price'],$fetch['description']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    