<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE medicines SET status = 'inactive' WHERE medicine_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    