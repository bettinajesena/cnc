<?php
    include('../master/connect.php');

$id = $_POST['id'];
$breed_name = trim($_POST['breed_name']);
$species_id = trim($_POST['species_id']);


  $sql = "UPDATE breed1 SET species_id=?, breed_name=? where breed_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($species_id, $breed_name, $id));
     
$conn = null;             

echo json_encode($output);
?>    