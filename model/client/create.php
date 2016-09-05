<?php
    include('../master/connect.php');

$client_name = trim($_POST['client_name']);
$client_contact = trim($_POST['client_contact']);
$client_bdate = trim($_POST['client_bdate']);
$client_gender = trim($_POST['client_gender']);
$client_address = trim($_POST['client_address']);


$id = uniqid('CL');

  $sql = "INSERT INTO Clients values(?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$client_name,$client_address,$client_contact,$client_bdate,$client_gender,'active'));
    

$conn = null;             

echo json_encode($output);
?>    