<?php
    include('../master/connect.php');

$id = $_POST['id'];
$unit_name = trim($_POST['unit_name']);
$abbreviation = trim($_POST['abbreviation']);
$unit_type = trim($_POST['unit_type']);


  $sql = "UPDATE unit_modifier SET unit_name=?, unit_abbreviation=? where unit_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($unit_name, $abbreviation, $id));
     
$conn = null;             

echo json_encode($output);
?>    