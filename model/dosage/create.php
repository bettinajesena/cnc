<?php
    include('../master/connect.php');

$dosage = trim($_POST['dosage']);


$id = uniqid('DO');

  $sql = "INSERT INTO dosage values(?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$dosage,'active'));
     

$conn = null;             

echo json_encode($output);
?>    