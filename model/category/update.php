<?php
    include('../master/connect.php');

$id = $_POST['id'];
$category = trim($_POST['category']);
$categuse = trim($_POST['categuse']);


  $sql = "UPDATE category SET cat_name=?,category_use=? where cat_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($category, $categuse,$id));
     
$conn = null;             

echo json_encode($output);
?>    