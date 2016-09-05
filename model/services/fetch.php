<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM transac_products WHERE tproduct_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['client_name'],$fetch['products'],$fetch['quantity'],$fetch['date'],$fetch['total']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    s