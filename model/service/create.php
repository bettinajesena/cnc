<?php
    include('../master/connect.php');

$service_name = trim($_POST['service_name']);
$category = trim($_POST['category']);
$price = trim($_POST['price']);

$id = uniqid('SV');

  $sql = "INSERT INTO services values(?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$service_name,$category,$price,'active'));
     

$conn = null;             

echo json_encode($output);
?>    