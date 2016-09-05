<?php
    include('../master/connect.php');

$id = $_POST['id'];
$brand = trim($_POST['brand']);
$generic = trim($_POST['generic']);


  $sql = "UPDATE brand SET brand_name=?, brand_generic_id=? where brand_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($brand, $generic, $id));
     
$conn = null;             

echo json_encode($output);
?>    