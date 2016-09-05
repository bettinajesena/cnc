<?php
    include('../master/connect.php');

$generic = trim($_POST['generic']);


$id = uniqid('G');

  $sql = "INSERT INTO generic values(?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$generic,'active'));
     

$conn = null;             

echo json_encode($output);
?>    