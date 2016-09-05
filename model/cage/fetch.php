<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM cage WHERE cage_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['cage_name'],$fetch['cage_size'],$fetch['price']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    