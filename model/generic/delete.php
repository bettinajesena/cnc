<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE generic SET status = 'inactive' WHERE generic_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  
$conn = null;             

echo json_encode($output);
?>    