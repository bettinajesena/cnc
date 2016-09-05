<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE breed1 SET status = 'inactive' WHERE breed_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    