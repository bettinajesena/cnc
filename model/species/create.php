<?php
    include('../master/connect.php');

$species_name = trim($_POST['species_name']);


$id = uniqid('SP');

  $sql = "INSERT INTO species values(?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$species_name,'active'));
     

$conn = null;             

echo json_encode($output);
?>    