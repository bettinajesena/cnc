<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM category WHERE cat_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['cat_name'],$fetch['category_use']);	

  }         
$conn = null;             

echo json_encode($output);
?>    