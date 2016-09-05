<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE discounts SET discounts_status = 'inactive' WHERE discounts_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    