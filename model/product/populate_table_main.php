<?php
    include('../master/connect.php');


  $sql = "SELECT p.product_id as id, p.product_name as product_name, c.cat_name as category_name, pk.pack_name as packaging_name, 
  p.weight as weight, u.unit_abbreviation as uom, p.prod_price as price,p.description as remarks 
  FROM products p, category c, packaging pk, units u 
  WHERE (p.category = c.cat_id) 
  AND (p.packaging = pk.pack_id) 
  AND (p.unit = u.unit_id) 
  AND (p.status = 'active') 
  GROUP BY p.product_id";

  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['id'],$fetch['product_name'],$fetch['category_name'],$fetch['packaging_name'],
    	$fetch['weight']."".$fetch['uom'],$fetch['price'],$fetch['remarks']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    