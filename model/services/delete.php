<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE transac_products SET status = 'inactive' WHERE tproduct_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    