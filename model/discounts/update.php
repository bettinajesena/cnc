<?php
    include('../master/connect.php');

$id = $_POST['id'];
$discount_name = trim($_POST['discount_name']);
$discount_rate = trim($_POST['discount_rate']);


  $sql = "UPDATE discounts SET discounts_name=?, discounts_rate=? WHERE discounts_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($discount_name,$discount_rate,$id));
     
$conn = null;             

echo json_encode($output);
?>    