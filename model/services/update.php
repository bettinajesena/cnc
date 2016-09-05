<?php
    include('../master/connect.php');

$owner = trim($_POST['client_name']);
$products = trim($_POST['products']);
$qty = trim($_POST['quantity']);
$date = trim($_POST['date']);
$total = trim($_POST['total']);


  $sql = "UPDATE transac_products SET client_name=?, date=?, products=?, quantity=?, total=? where tproduct_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($client_name,$date,$products,$quantity,$total));
     
$conn = null;             

echo json_encode($output);
?>    