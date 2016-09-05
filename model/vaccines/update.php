<?php
    include('../master/connect.php');

$id = $_POST['id'];
$medicine = trim($_POST['medicine']);
$category = trim($_POST['category']);
$packaging = trim($_POST['packaging']);
$dosage = trim($_POST['dosage']);
$generic = $_POST['generic'];
$brand = $_POST['brand'];
$content = trim($_POST['content']);
$unit = trim($_POST['unit']);
$price = trim($_POST['price']);
$desc = trim($_POST['desc']);



  $sql = "UPDATE medicines SET medicine_name=?, category=?, packaging=?, dosage=?, 
  brand=?, content=?, unit=?, price=?, description=? WHERE medicine_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($medicine,$category,$packaging,$dosage,$generic,$brand,$content,$unit,$price,$desc,$id));
     
$conn = null;             

echo json_encode($output);
?>    