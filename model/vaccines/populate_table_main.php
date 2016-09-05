  <?php
    include('../master/connect.php');


  $sql = "SELECT v.vaccine_id as id, v.vaccine_name as vaccine_name,  
  v.content, u.unit_abbreviation as uom, v.price, v.description, v.status 
  FROM vaccines v , units u 
  WHERE v.unit_modifier = u.unit_id AND (v.status = 'active') 
  GROUP BY v.vaccine_id";


  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['id'],$fetch['vaccine_name'],$fetch['content']."".$fetch['uom'],
      $fetch['price'],$fetch['description']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    