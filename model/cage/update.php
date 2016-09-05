<?php
    include('../master/connect.php');

$id = $_POST['id'];
$cage_name = trim($_POST['cage_name']);
$cage_size = trim($_POST['cage_size']);
$price = trim($_POST['price']);


  $sql = "UPDATE cage SET cage_name=?, cage_size=?, price=? where cage_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($cage_name, $cage_size, $price, $id));
     
$conn = null;             

echo json_encode($output);
?>    