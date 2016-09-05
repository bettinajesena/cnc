<?php
    include('../master/connect.php');

  $species = trim($_POST['species']);

  $sql = "SELECT breed_id, breed_name, species_name 
  FROM breed1 b, species s
  WHERE b.species_id = s.species_id
  AND (b.status = 'active')
  AND b.species_id='$species'
  GROUP BY b.breed_id";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['breed_id'],$fetch['breed_name'],
    	$fetch['species_name']);				 	
  }       

  ?> 

<?php 
    //Get all state data
    $query = $db->query("SELECT * FROM breed1 WHERE species_id = ".$_POST['species']." AND status = 'active'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select state</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['breed_id'].'">'.$row['breed_name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }*/

    /*$f_species = $_GET['f_species'];
 
$query = mysql_query("SELECT * FROM breed1 WHERE species_id = {$species}");
while($row = mysql_fetch_array($query)) {
  echo "<option value='$row[breed_id]'>$row[breed_name]</option>";
}

$conn = null;             

echo json_encode($output);

if($_POST['id'])
{
 $id=$_POST['id'];
  
 $stmt = $DB_con->prepare("SELECT * FROM breed1 WHERE species_id=:id");
 $stmt->execute(array(':id' => $id));
 ?><option selected="selected">--SEARCH BREED--</option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
        <option value="<?php echo $row['breed_id']; ?>"><?php echo $row['breed_name']; ?></option>
        <?php
 }
}

$db_handle = new DBController();
if(!empty($_POST["species_id"])) {
  $query ="SELECT * FROM breed1 WHERE species_id = '" . $_POST["species_id"] . "'";
  $results = $db_handle->runQuery($query);
?>
  <option value="none"> -- SEARCH BREED -- </option>
<?php
  foreach($results as $breed) {
?>
  <option value="<?php echo $breed["breed_id"]; ?>"><?php echo $breed["breed_name"]; ?></option>
<?php
  }
}
?>    