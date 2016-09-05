<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE vaccines SET status = 'inactive' WHERE vaccine_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    