<?php
    include('../master/connect.php');

$id = $_POST['id'];
$employee_name = trim($_POST['name']);
$employee_cn = trim($_POST['contact_no']);
$employee_address = trim($_POST['address']);
$employee_job = trim($_POST['job']);

  $sql = "UPDATE employee1 SET name=?, contact_no=?, address=?, job=? WHERE user_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($employee_name,$employee_cn,$employee_address,$employee_job,$id));
     
$conn = null;             

echo json_encode($output);
?>    