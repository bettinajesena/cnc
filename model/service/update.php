<?php
    include('../master/connect.php');

$id = $_POST['id'];
$service_name = trim($_POST['service_name']);
$category = trim($_POST['category']);
$price = trim($_POST['price']);


  $sql = "UPDATE services SET service_name=?, category=?, price=? where service_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($service_name, $category, $price, $id));
     
$conn = null;             

echo json_encode($output);
?>    