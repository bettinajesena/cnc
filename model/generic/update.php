<?php
    include('../master/connect.php');

$id = $_POST['id'];
$generic = trim($_POST['generic']);


  $sql = "UPDATE generic SET generic_name=? where generic_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($generic, $id));
     
$conn = null;             

echo json_encode($output);
?>    