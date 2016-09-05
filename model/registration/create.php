<?php
    include('../master/connect.php');

$id=trim(($_POST['id']));
$client_name = trim($_POST['clients_name']);
$client_contact = trim($_POST['client_contact']);
$client_bdate = trim($_POST['clients_bdate']);
$client_gender = trim($_POST['clients_gender']);
$client_address = trim($_POST['clients_address']);


  $sql = "INSERT INTO Clients values(?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$client_name,$client_address,$client_contact,$client_bdate,$client_gender,'active'));
    

$pet_name = trim($_POST['pet_name']);
$species = trim($_POST['species']);
$breed = trim($_POST['breed']);
$color = trim($_POST['color']);
$markings = trim($_POST['markings']);
$birthdate = $_POST['birthdate'];
$sex = trim($_POST['sex']);

$id1 = uniqid('PT');

  $sql = "INSERT INTO patient values(?,?,?,?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$id1,$pet_name,$species,$breed,$color,$markings,$birthdate,$sex,'active'));
     

$conn = null;             

echo json_encode($output);
?>  
  