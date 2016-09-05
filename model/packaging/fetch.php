<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM packaging WHERE pack_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['pack_name']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    