<?php
    include('../master/connect.php');

$employee_name = trim($_POST['name']);
$employee_cn = trim($_POST['contact_no']);
$employee_address = trim($_POST['address']);
$employee_job = trim($_POST['job']);
$employee_license = trim($_POST['license']);


$id = uniqid('CL');

  $sql = "INSERT INTO employee1 values(?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$employee_name,$employee_cn,$employee_address,$employee_job,$employee_license,'active'));
    

$conn = null;             

echo json_encode($output);
?>    