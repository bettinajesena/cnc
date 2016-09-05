<?php
    include('../master/connect.php');

$unit_name = trim($_POST['unit_name']);
$abbreviation = trim($_POST['abbreviation']);
$id = uniqid('U');

  $sql = "INSERT INTO unit_modifier values(?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$unit_name,$abbreviation,'active'));
     

$conn = null;             

echo json_encode($output);
?>    