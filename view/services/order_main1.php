<?
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
?>
<hr>
<form method="post" action="main_form.php">
<div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->
  
       <div class="col-sm-3 col-xs-12" id="f_job_div" class='form-group'> 
    <label>Please select <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <select type="text" class="form-control " id="f_job" required onchange="showForm(this.value)">
      <option val="none"> -- SELECT --</option>
      <option value="walkin">Walk-in</option>
      <option value="regular">Regular</option>      
    </select>
  </div>   
  </div>
<div class="row" style="margin-bottom:5px">
   <div id="walkin_div" style="display:none">
<div class="col-sm-3 col-xs-12" id="f_name_div" class='form-group'> 
    <label>Name<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></label> <!-- Prod_Name -->
    <input type="text" class="form-control" name="f_name" id="f_name" required>
  </div>

  <div class="col-sm-3 col-xs-12" id="f_pet_div" class='form-group'> 
    <label>Pet Name<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></label> <!-- Prod_Name -->
    <input type="text" class="form-control" name="f_pet" id="f_pet" required>
  </div>
    
    <div class="col-sm-3 col-xs-12" id="f_category_div" class='form-group'> 
    <label>Category <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <select type="text" class="form-control " id="f_category" required onchange="getService(this.value)">
      <option val="none"> -- SELECT --</option>
      <option value="vet">Vet</option>
      <option value="grooming">Grooming</option>   
      <option value="lab">Lab Exam</option>
      <option value="others">Others</option>         
    </select>
  </div>   

   <div class="col-sm-3 col-xs-12" id="f_services_div" class='form-group'> 
    <label>Services <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control" id="f_services" name="f_services" required>
      <option val="none"> -- SEARCH SERVICES -- </option>
    </select>
  </div>       

   </div>
   </div>

   <div class="row" style="margin-bottom:5px">
   <div id="regular_div" style="display:none">
<div class="col-sm-3 col-xs-12" id="f_client_div" class='form-group'> 
    <label>Client Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control" id="f_client" name="f_client" required>
      <option val="none"> -- SEARCH CLIENT -- </option>
    </select>
  </div>   

  <div class="col-sm-3 col-xs-12" id="f_pet1_div" class='form-group'> 
    <label>Pet Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control" id="f_pet1" name="f_pet1" required>
      <option val="none"> -- SEARCH PET -- </option>
    </select>
  </div>   
    
    <div class="col-sm-3 col-xs-12" id="f_category_div" class='form-group'> 
    <label>Category <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <select type="text" class="form-control " id="f_category" name="f_category" required onchange="getService(this.value)">
      <option val="none"> -- SELECT --</option>
      <option value="vet">Vet</option>
      <option value="grooming">Grooming</option>   
      <option value="lab">Lab Exam</option>
      <option value="others">Others</option>         
    </select>
  </div>   

   <div class="col-sm-3 col-xs-12" id="f_services_div" class='form-group'> 
    <label>Services <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control" id="f_services" name="f_services" required>
      <option val="none"> -- SEARCH SERVICES -- </option>
    </select>
  </div>      
                   
  </div>  

<div class="col-md-2 col-xs-12">
<br>

  <button id="btn_next" name="btn_next" value="next"  class="btn btn-block btn-success btn-lg">NEXT</button>
 

  </form>
  </div>
  