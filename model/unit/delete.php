<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE unit_modifier SET unit_status = 'inactive' WHERE unit_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    