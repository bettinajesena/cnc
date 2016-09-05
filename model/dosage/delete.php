<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE dosage SET dosage_status = 'inactive' WHERE dosage_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  
$conn = null;             

echo json_encode($output);
?>    