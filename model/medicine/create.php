<?php
    include('../master/connect.php');

$medicine = trim($_POST['medicine']);
$category = trim($_POST['category']);
$packaging = trim($_POST['packaging']);
$dosage = trim($_POST['dosage']);
$generic = trim($_POST['generic']);
$brand = trim($_POST['brand']);
$content = trim($_POST['content']);
$unit = trim($_POST['unit']);
$price = trim($_POST['price']);
$desc = trim($_POST['desc']);


$id = uniqid('MD');

  $sql = "INSERT INTO medicines values(?,?,?,?,?,?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$medicine,$category,$packaging,$dosage,$generic,$brand,$content,$unit,$price,$desc,'active'));
     

$conn = null;             

echo json_encode($output);
?>    