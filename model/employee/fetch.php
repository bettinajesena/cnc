<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM employee1 WHERE user_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['name'],$fetch['contact_no'],
      $fetch['address'],$fetch['job'],$fetch['license']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    