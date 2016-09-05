<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE species SET status = 'inactive' WHERE species_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    