<?php
    include('../master/connect.php');

$id = $_POST['id'];
$owner=trim($_POST['owner']);
$pet_name = trim($_POST['pet_name']);
$species = trim($_POST['species']);
$breed = trim($_POST['breed']);
$color = trim($_POST['color']);
$markings = trim($_POST['markings']);
$birthdate = $_POST['birthdate'];
$sex = trim($_POST['sex']);


  $sql = "UPDATE patient SET owner_id=?, pet_name=?, species=?, breed=?, color=?, markings=?, birthdate=?, sex=? WHERE pet_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($owner,$pet_name,$species,$breed,$color,$markings,$birthdate,$sex,$id));
     
$conn = null;             

echo json_encode($output);
?>    