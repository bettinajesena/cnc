<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE packaging SET pack_status = 'inactive' WHERE pack_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  
$conn = null;             

echo json_encode($output);
?>    