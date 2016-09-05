<?php
    include('../master/connect.php');

$discount_name = trim($_POST['discount_name']);
$discount_rate = trim($_POST['discount_rate']);

$id = uniqid('DS');

  $sql = "INSERT INTO discounts values(?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$discount_name,$discount_rate,'active'));
     

$conn = null;             

echo json_encode($output);
?>    