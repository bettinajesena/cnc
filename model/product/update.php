<?php
    include('../master/connect.php');

$id = $_POST['id'];
$product = trim($_POST['product']);
$category = trim($_POST['category']);
$packaging = trim($_POST['packaging']);
$weight = trim($_POST['weight']);
$unit = $_POST['unit'];
$price = trim($_POST['price']);
$desc = trim($_POST['desc']);


  $sql = "UPDATE products SET product_name=?, category=?, packaging=?, weight=?, unit=?, prod_price=?, description=? WHERE product_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($product,$category,$packaging,$weight,$unit,$price,$desc,$id));
     
$conn = null;             

echo json_encode($output);
?>    