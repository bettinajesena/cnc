<?php 


  // konichiwa, hello, sa mga dev, to the devs
  // let's all build a better web together
  // Read first README in the github for FULL Description, Instructions and Notes
  

//  this upper part before the start of <HTML> tag is a Javascript Code
//  para, for conditions in SESSION
// IF you are logged in, SESSION variable is CREATED


  if(!isset($_SESSION)) 
  { session_start(); }
  
  if($_SESSION["chatsnchiens_user_name"]=="" || $_SESSION["chatsnchiens_user_type"]=="") // IF WALANG SESSION VARIABLE (means hindi naka login), redirect sa LOGIN PAGE
  {?>
    <script type="text/javascript">   
      function Redirect() 
      {  
        window.location="view/master/login.php"; 
       // alert("Please Log-in"); 
      } 
      Redirect();
    </script>
  <?php } 
  else{ // ELSE of course MAYROONG SESSION VARIABLE, edi wala pasok dito sa INDEX.php, but iistore ang SESSION sa local php variables for other uses
  $chatsnchiens_user_name = $_SESSION["chatsnchiens_user_name"];
  $chatsnchiens_user_type = $_SESSION["chatsnchiens_user_type"];
  echo'<input type="hidden" id="chatsnchiens_user_type" value="'.$chatsnchiens_user_type.'">';
  }
?>

<!DOCTYPE html>
<html lan='en'>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>chatsnchiens</title>

    <link href="assets/css/custom.css" rel="stylesheet" />

    <script src="controller/master/logout.js" type="text/javascript"></script>

  <!--GEMS-->
    <link href="gems/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
    <!--Bootstrap CSS BELOW-->
    <link href="gems/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <!--JQUERY BELOW-->
    <script src="gems/jQuery/jQuery-2.1.4.min.js"></script>
    <!--Datatables BELOW-->
    <script src="gems/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <!--Datatables Bootsrap CSS BELOW -->
    <script src="gems/datatables/dataTables.bootstrap.js" type="text/javascript"></script>   
    <!--Datatables Javascript BELLOW -->
    <link href="gems/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />  

    <script src="controller/master/logout.js" type="text/javascript"></script>
  <!-- end of gems-->
</head>
<body>
     
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        Chats N Chien
                    </a>
                    
                </div>
              
                <span class="logout-spn" > <!-- LOG OUT -->
                  <a href="model/master/logout_process.php" style="color:#fff;" onclick="return logout();">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <!-- Here is the SIDEBAR, BELOW IS THE SIDEBAR -->
        <!-- All view files calls only 1NE sidebar.html in the view directory,  -->
        <!-- INDEX is an excemption, it has its own sidebar here since it's outside the VIEW directory so -->
        <!-- so Links are different -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">   


                    <li>
                        <a href="index.php" ><i class="fa fa-home"></i>Maintenance</a>
                    </li>

                                

                    <li>
                        <a href="view/client/main.php"><i class="fa fa-user col-xs-offset-2 "></i>Clients</a>
                    </li>   

                    <li>
                        <a href="view/species/main.php"><i class="fa fa-paw col-xs-offset-2"></i>Species</a></a>
                    </li>

                    <li>
                        <a href="view/breed/main.php"><i class="fa fa-paw col-xs-offset-2"></i>Breed</a></a>
                    </li>

                    <li>
                        <a href="view/pet/main.php"><i class="fa fa-paw col-xs-offset-2"></i>Pets</a></a>
                    </li>

                    <li>
                        <a href="view/unit/main.php"><i class="fa fa-opencart col-xs-offset-2"></i>Unit</a></a>
                    </li>

                    <li>
                        <a href="view/category/main.php"><i class="fa fa-opencart col-xs-offset-2"></i>Category</a></a>
                    </li>

                    <li>
                        <a href="view/dosage/main.php"><i class="fa fa-plus-square-o col-xs-offset-2"></i>Dosage Form</a></a>
                    </li> 

                    <li>
                        <a href="view/packaging/main.php"><i class="fa fa-opencart col-xs-offset-2"></i>Packaging</a></a>
                    </li>

                    <!-- <li>
                        <a href="view/generic/main.php"><i class="fa fa-plus-square-o col-xs-offset-2"></i>Generic</a></a>
                    </li> -->

                    <!-- <li>
                        <a href="view/brand/main.php"><i class="fa fa-plus-square-o col-xs-offset-2"></i>Brand</a></a>
                    </li> -->

                    <li>
                        <a href="view/product/main.php"><i class="fa fa-opencart col-xs-offset-2"></i>Products</a></a>
                    </li>

                    <li>
                        <a href="view/medicine/main.php"><i class="fa fa-plus-square-o col-xs-offset-2"></i>Medicines</a></a>
                    </li>

                    <li>
                        <a href="view/vaccines/main.php"><i class="fa fa-plus-square-o col-xs-offset-2"></i>Vaccines</a></a>
                    </li>
     
                    <li>
                        <a href="view/service/main.php"><i class="fa fa-send-o col-xs-offset-2"></i>Service</a></a>
                    </li >  
                    <li>
                        <a href="view/Cage/main.php"><i class="fa fa-cubes col-xs-offset-2"></i>Cages</a></a>
                    </li >  
                    <li>
                        <a href="view/employee/main.php"><i class="fa fa-cubes col-xs-offset-2"></i>Employee</a></a>
                    </li >        

                    <li>
                        <a href="index.php" ><i class="fa fa-home "></i>Transaction</a>
                    </li>

                   


                    <li>
                        <a href="view/registration/main.php"><i class="fa fa-cubes col-xs-offset-2"></i>Registration</a></a>
                    </li >

                     <li>
                        <a href="view/appointment/main.php"><i class="fa fa-cubes col-xs-offset-2"></i>Appointment</a></a>
                    </li > 

                    <li>
                        <a href="view/services/main.php"><i class="fa fa-cubes col-xs-offset-2"></i>Services</a></a>
                    </li > 

                    <li>
                        <a href="view/treatment/main.php"><i class="fa fa-cubes col-xs-offset-2"></i>Treatment</a></a>
                    </li > 

                    <li>
                        <a href="index.php" ><i class="fa fa-home"></i>Utilities</a>
                    </li>

                    <li> 
                        <a href="view/user/main.php"><i class="fa fa-users col-xs-offset-2"></i>Users</a>
                    </li>                                                                                    
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                      <!-- Dashboard Type Title,  using SESSION variable of user type -->
                     <h2><?php echo(strtoupper($chatsnchiens_user_type)); ?> MAINTENANCE</h2>  
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                              <!-- Dashboard Greeting,  using SESSION variable of username -->                          
                             <strong>Welcome <?php echo($chatsnchiens_user_name).', ';?> </strong> Select On the Menu Below
                        </div>
                       
                    </div>
                    </div>


                <!-- DASHBOARD MENU SHORTCUTS -->
                  <!-- /. ROW  --> 

                <div class="row text-center pad-top">                                      

                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Pets">
                      <div class="div-square">
                         <a href="view/pet/main.php" ><i class="fa fa-paw fa-5x"></i>
                           <h4><strong>PETS</strong></h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->      
                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Species">
                      <div class="div-square">
                         <a href="view/species/main.php" ><i class="fa fa-paw fa-5x"></i>
                           <h4>Species</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->   
                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Breed">
                      <div class="div-square">
                         <a href="view/breed/main.php" ><i class="fa fa-paw fa-5x"></i>
                           <h4>Breed</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->           

                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Service">
                      <div class="div-square">
                         <a href="view/Service/main.php" ><i class="fa fa-send-o fa-5x"></i>
                           <h4>Service</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->   

                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Cage">
                      <div class="div-square">
                         <a href="view/Cage/main.php" ><i class="fa fa-cubes fa-5x"></i>
                           <h4>Cage</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->   

                  <div id="menu_clients" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Clients">
                      <div class="div-square">
                         <a href="view/client/main.php" ><i class="fa fa-users fa-5x"></i>
                           <h4>Clients</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->  
 
                </div><!--/.row-->

                <div class="row text-center pad-top">
 
                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Products">
                      <div class="div-square">
                         <a href="view/product/main.php" ><i class="fa fa-opencart fa-5x"></i>
                           <h4><strong>PRODUCTS</strong></h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->      
                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Unit">
                      <div class="div-square">
                         <a href="view/Unit/main.php" ><i class="fa fa-opencart fa-5x"></i>
                           <h4>Unit</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->   
                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Category">
                      <div class="div-square">
                         <a href="view/Category/main.php" ><i class="fa fa-opencart fa-5x"></i>
                           <h4>Category</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->                                                                           

                   <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Packaging">
                      <div class="div-square">
                         <a href="view/Packaging/main.php" ><i class="fa fa-opencart fa-5x"></i>
                           <h4>Packaging</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->       


                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Medicine">
                      <div class="div-square">
                         <a href="view/Medicine/main.php" ><i class="fa fa-medkit fa-5x"></i>
                           <h4><strong>Medicine</strong></h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->                                                                           

                   <!-- <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Generic">
                      <div class="div-square">
                         <a href="view/Generic/main.php" ><i class="fa fa-medkit fa-5x"></i>
                           <h4>Generic</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->   

                <!-- ROW-->

                <!-- <div class="row text-center pad-top">
                   <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Brand">
                      <div class="div-square">
                         <a href="view/Brand/main.php" ><i class="fa fa-medkit fa-5x"></i>
                           <h4>Brand</h4>
                         </a>
                      </div>    -->                                       
                  <!--col-->  
                   <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Dosage Form">
                      <div class="div-square">
                         <a href="view/Dosage/main.php" ><i class="fa fa-medkit fa-5x"></i>
                           <h4>Dosage Form</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->  

                  <div id="menu_users" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain User Accounts">
                      <div class="div-square">
                         <a href="view/user/main.php" ><i class="fa fa-user fa-5x"></i>
                           <h4>Users</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->
              

                </div><!--/.row-->

             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
   <!--  <div class="footer">   
            <div class="row">
              <?php include('view/master/footer.html'); ?>
            </div>
        </div>
           -->

     <!-- /. WRAPPER  -->

   
</body>
</html>
