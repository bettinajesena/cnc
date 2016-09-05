<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE category SET cat_status = 'inactive' WHERE cat_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  
$conn = null;             

echo json_encode($output);
?>    