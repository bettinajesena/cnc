<?php
    include('../master/connect.php');

$id = $_POST['id'];
$dosage = trim($_POST['dosage']);


  $sql = "UPDATE dosage SET dosage_name=? where dosage_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($dosage, $id));
     
$conn = null;             

echo json_encode($output);
?>    