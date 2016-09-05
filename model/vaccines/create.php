<?php
    include('../master/connect.php');

$vaccine = trim($_POST['vaccine']);
$content = trim($_POST['content']);
$unit = trim($_POST['unit']);
$price = trim($_POST['price']);
$desc = trim($_POST['desc']);


$id = uniqid('MD');

  $sql = "INSERT INTO vaccines values(?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$vaccine,$content,$unit,$price,$desc,'active'));
     

$conn = null;             

echo json_encode($output);
?>    