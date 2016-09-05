<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE products SET status = 'inactive' WHERE product_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    