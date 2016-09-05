<?php
    include('../master/connect.php');

$id = $_POST['id'];
$packaging = trim($_POST['packaging']);


  $sql = "UPDATE packaging SET pack_name=? where pack_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($packaging, $id));
     
$conn = null;             

echo json_encode($output);
?>    