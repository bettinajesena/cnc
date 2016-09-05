<?php
    include('../master/connect.php');

$category = trim($_POST['category']);
$categuse= trim($_POST['categuse']);

$id = uniqid('C');

  $sql = "INSERT INTO category values(?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$category,$categuse,'active'));
     

$conn = null;             

echo json_encode($output);
?>    