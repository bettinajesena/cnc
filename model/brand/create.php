<?php
    include('../master/connect.php');

$brand = trim($_POST['brand']);
$generic = trim($_POST['generic']);

$id = uniqid('B');

  $sql = "INSERT INTO brand values(?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$generic,$brand,'active'));
     

$conn = null;             

echo json_encode($output);
?>    