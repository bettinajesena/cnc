<?php
    include('../master/connect.php');

$product = trim($_POST['product']);
$category = trim($_POST['category']);
$packaging = trim($_POST['packaging']);
$weight = trim($_POST['weight']);
$unit = $_POST['unit'];
$price = trim($_POST['price']);
$desc = trim($_POST['desc']);


$id = uniqid('PR');

  $sql = "INSERT INTO products values(?,?,?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$product,$category,$packaging,$weight,$unit,$desc,$price,'active'));
     

$conn = null;             

echo json_encode($output);
?>    