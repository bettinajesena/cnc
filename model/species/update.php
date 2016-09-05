<?php
    include('../master/connect.php');

$id = $_POST['id'];
$species_name = trim($_POST['species_name']);


  $sql = "UPDATE species SET species_name=? where species_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($species_name, $id));
     
$conn = null;             

echo json_encode($output);
?>    