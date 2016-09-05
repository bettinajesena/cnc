<?php
    include('../master/connect.php');

$owner = trim($_POST['client_name']);
$products = trim($_POST['products']);
$qty = trim($_POST['quantity']);
$date = trim($_POST['date']);
$total = trim($_POST['total']);

$id = uniqid('TSP');

  $sql = "INSERT INTO transac_products values(?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$client_name,$date,$products,$quantity,$total,'active'));
     

$conn = null;             

echo json_encode($output);
?>    