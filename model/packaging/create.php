<?php
    include('../master/connect.php');

$packaging = trim($_POST['packaging']);


$id = uniqid('PK');

  $sql = "INSERT INTO packaging values(?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$packaging,'active'));
     

$conn = null;             

echo json_encode($output);
?>    