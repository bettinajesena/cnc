<?php
    include('../master/connect.php');

$cage_name = trim($_POST['cage_name']);
$cage_size = trim($_POST['cage_size']);
$price = trim($_POST['price']);

$id = uniqid('CG');

  $sql = "INSERT INTO cage values(?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$cage_name,$cage_size,$price,'active'));
     

$conn = null;             

echo json_encode($output);
?>    