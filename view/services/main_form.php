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
    <label>Name<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></label> 
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
<div class="col-sm-3 col-xs-12" id="f_owner_div" class='form-group'> 
    <label>Client Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control" id="f_owner" name="f_owner" required onchange="getPet(this.value)">
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
    <select type="text" class="form-control " id="f_category" name="f_category" required onchange="getService1(this.value)">
      <option val="none"> -- SELECT --</option>
      <option value="vet">Vet</option>
      <option value="grooming">Grooming</option>   
      <option value="lab">Lab Exam</option>
      <option value="others">Others</option>         
    </select>
  </div>   

   <div class="col-sm-3 col-xs-12" id="f_services1_div" class='form-group'> 
    <label>Services <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control" id="f_services1" name="f_services1" required>
      <option val="none"> -- SEARCH SERVICES -- </option>
    </select>
  </div>      
                   
  </div>  

 
  </div>
  </form>

<h2 style="color:grey"><i class="fa fa-medkit"></i> Products</h2>
         <div class="row" style="margin-bottom:5px"> 
                <div class="col-sm-3 col-xs-12" id="f_owner_div" class='form-group'> 
              <label>Form No. <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
             <?php
            if($connect=@mysql_connect("localhost","root")){
                echo"";
              } else {
                die(@mysql_error());
              }

              $connect=@mysql_select_db("vet1");
              $content = "SELECT max(tproduct_id) FROM transac_products";
              $result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
              $row = mysql_fetch_array($result);
              $id=$row['max(tproduct_id)']+1;
             echo '<form method="post">';
             echo'<input id="form_no" name="form_no" value="'.$id.'" readonly></input>';
             echo '</form>';
             ?>
              </div>
            <?php
            //session_start();
            require_once("dbcontroller.php");
            $db_handle = new DBController();
            if(!empty($_GET["action"])) {
            switch($_GET["action"]) {
              case "add":
                if(!empty($_POST["quantity"])) {
                  $productByproduct_id = $db_handle->runQuery("SELECT * FROM products WHERE product_id='" . $_GET["product_id"] . "'");
                  $itemArray = array($productByproduct_id[0]["product_id"]=>array('product_name'=>$productByproduct_id[0]["product_name"], 'product_id'=>$productByproduct_id[0]["product_id"], 'quantity'=>$_POST["quantity"], 'prod_price'=>$productByproduct_id[0]["prod_price"]));
                  
                  if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByproduct_id[0]["product_id"],$_SESSION["cart_item"])) {
                      foreach($_SESSION["cart_item"] as $k => $v) {
                          if($productByproduct_id[0]["product_id"] == $k)
                            $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                      }
                    } else {
                      $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                  } else {
                    $_SESSION["cart_item"] = $itemArray;
                  }
                }
              break;
              case "remove":
                if(!empty($_SESSION["cart_item"])) {
                  foreach($_SESSION["cart_item"] as $k => $v) {
                      if($_GET["product_id"] == $k)
                        unset($_SESSION["cart_item"][$k]);        
                      if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                  }
                }
              break;
              case "empty":
                unset($_SESSION["cart_item"]);
              break;  
            }
            }
            ?>
            <HEAD>
            <TITLE>Simple PHP Shopping Cart</TITLE>
            <link href="style.css" type="text/css" rel="stylesheet" />
            </HEAD>
            <body>
            <div class="col-xs-12" id="shopping-cart">
              <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="products.php?action=empty">Empty Cart</a></div>
              <?php
              if(isset($_SESSION["cart_item"])){
                  $item_total = 0;
              ?>  
              <table cellpadding="10" cellspacing="1">
              <tbody>
              <tr>
              <th><strong>Name</strong></th>
              <!-- <th><strong>product_id</strong></th> -->
              <th><strong>Quantity</strong></th>
              <th><strong>Price</strong></th>
              <th><strong>Action</strong></th>
              </tr> 
              <?php   
                  foreach ($_SESSION["cart_item"] as $item){
                  ?>
                      <tr>
                      <td><strong><?php echo $item["product_name"]; ?></strong></td>
                      <!-- <td><?php echo $item["product_id"]; ?></td> -->
                      <td><?php echo $item["quantity"]; ?></td>
                      <td><?php echo "$".$item["prod_price"]; ?></td>
                      <td><a href="products.php?action=remove&product_id=<?php echo $item["product_id"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                      </tr>
                      <?php
                      $item_total += ($item["prod_price"]*$item["quantity"]);
                  }
                  ?>

              <tr>
              <td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
              </tr>
              </tbody>
              </table>    
                <?php
              }
              ?>
            </div>

            <div class="col-xs-12" id="product-grid">
              <div class="txt-heading">Products</div>
              <?php
              $product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY product_id ASC");
              if (!empty($product_array)) { 
                foreach($product_array as $key=>$value){
              ?>
                <div class="product-item">
                  <form method="post" action="products.php?action=add&product_id=<?php echo $product_array[$key]["product_id"]; ?>">
                  
                  <div><strong><?php echo $product_array[$key]["product_name"]; ?></strong></div>
                  <div class="product-price"><?php echo "$".$product_array[$key]["prod_price"]; ?></div>
                  <div><input type="text" name="quantity" value="1" size="2" /><input type="submit"  value="Add to cart" class="btnAddAction" /></div>
                  </form>
                </div>
              <?php
                  }
              }

             echo '<form method="post">';
            echo'<input type="submit" name="btnAdd" value="Add">';
             echo  '</form>';
             echo'<button type="button"  onclick="print()" class="w3-btn">Print</button>';

          

if($connect=@mysql_connect("localhost","root")){
    echo"";
  } else {
    die(@mysql_error());
  }

  $connect=@mysql_select_db("vet1");

date_default_timezone_set('Asia/Manila');
            if(isset($_POST['btnAdd']))
            {
              $client=$_POST['f_name'];
              $date= date('Y-m-d');
             
              foreach ($_SESSION["cart_item"] as $item) 
              {

                mysql_query("insert into transac_products(tproduct_id,client_name,date,products, quantity, total) values('".$id."','".$client."','".$date."','".$item["product_name"]."','".$item["quantity"]."','".$item["prod_price"]."')");
                
              }
              echo '<script type="text/javascript">alert("Record has been '.$client.' added")</script>';
              echo'<script type="text/javascript">
              window.location = "products.php?action=empty";
              </script>';  
            }

              ?>
 </div>
</div>


    
    <script>
    function print() {
    window.open("pdf/tutorial/or.php");
    }
    </script>
  
  
<!-- <form method="post">
<input type="submit" name="btnPrint"  onclick="window.location.href='pdf/tutorial/or.php';" value="Proceed">
</form>
 -->
<script>
    // Run on page load
    window.onload = function() {

        // If sessionStorage is storing default values (ex. name), exit the function and do not restore data
        if (sessionStorage.getItem('name') == "name") {
            return;
        }

        // If values are not blank, restore them to the fields
        var name = sessionStorage.getItem('name');
        if (name !== null) $('#f_name').val(name);

    }

    // Before refreshing the page, save the form data to sessionStorage
    window.onbeforeunload = function() {
        sessionStorage.setItem("name", $('#f_name').val());
    }
</script>