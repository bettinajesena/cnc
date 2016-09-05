<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE services SET status = 'inactive' WHERE service_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    