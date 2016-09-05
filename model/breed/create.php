<?php
    include('../master/connect.php');

$species_id = trim($_POST['species_id']);
$breed_name = trim($_POST['breed_name']);

$id = uniqid('BR');

 
		  $sql = "INSERT INTO breed1 values(?,?,?,?)";
		  $q = $conn->prepare($sql);
		  $q -> execute(array($id,$species_id,$breed_name,'active'));

$conn = null;             

?>    