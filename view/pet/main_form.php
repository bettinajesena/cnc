<hr>

<div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->
  
  <div class="col-sm-3 col-xs-12" id="f_owner_div" class='form-group'> 
    <label>Owner <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control " id="f_owner" required>
      <option value="none"> -- SEARCH OWNER -- </option>
    </select>
  </div>

  <div class="col-sm-3 col-xs-12" id="f_petname_div" class='form-group'> 
    <label>Pet Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <input type="text" class="form-control " id="f_petname" required>
  </div>  

  <?php
include('../master/connect.php');

//Get all country data
$query = $db->query("SELECT * FROM species where status='active'");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<div class="col-sm-3 col-xs-12" id="f_species_div" class='form-group'> 
    <label>Species <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <form action="#" method="post" onchange="reload(this.form)">

    <?php

    echo '<select type="text" name="f_species" class="form-control " id="f_species" required>
      <option value="none"> -- SEARCH SPECIES -- </option>';
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['species_id'].'">'.$row['species_name'].'</option>';
        }
    
    }
    echo"</select> </div>";

//Get all country data
$query = $db->query("SELECT * FROM breed1 where status='active'");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<div class="col-sm-3 col-xs-12" id="f_breed_div" class='form-group'> 
    <label>Breed <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
<select type="text" class="form-control " id="f_breed" required>
      <option value="none"> -- SEARCH BREED -- </option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['breed_id'].'">'.$row['breed_name'].'</option>';
        }
    
    }
    ?>
</select>
</div>
            
     
</div> <!-- /.row -->   

<div class="row">

<div class="col-sm-3 col-xs-12" id="f_color_div" class='form-group'> 
    <label>Color <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <input type="text" class="form-control " id="f_color" required>
  </div>  

  <div class="col-sm-3 col-xs-12" id="f_markings_div" class='form-group'> 
    <label>Markings <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <input type="text" class="form-control " id="f_markings" required>
  </div> 
  
  <div class="col-sm-3 col-xs-12" id="f_birthdate_div" class='form-group'> 
    <label>Birthdate <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <input type="date" class="form-control " id="f_birthdate" required>
  </div>    

  <div class="col-sm-3 col-xs-12" id="f_sex_div" class='form-group'> 
    <label>Sex <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <select type="text" class="form-control " id="f_sex" required>
      <option val="none"> -- SELECT SEX --</option>
      <option value="M">Male</option>
      <option value="F">Female</option>      
    </select>
  </div>   

</div>

