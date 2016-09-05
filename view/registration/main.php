<?php include('../../controller/master/log.php'); ?>


<!DOCTYPE html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
	<!-- BOOTSTRAP STYLES-->
     <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="../../controller/master/logout.js" type="text/javascript"></script>

  <!--GEMS-->
    <link href="../../gems/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
    <!--Bootstrap CSS BELOW-->
    <link href="../../gems/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <!--JQUERY BELOW-->
    <script src="../../gems/jQuery/jQuery-2.1.4.min.js"></script>
    <!--Datatables BELOW-->
    <script src="../../gems/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <!--Datatables Bootsrap CSS BELOW -->
    <script src="../../gems/datatables/dataTables.bootstrap.js" type="text/javascript"></script>   
    <!--Datatables Javascript BELLOW -->
    <link href="../../gems/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />  


</head>
<body>
     
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        Chats N Chiens                     
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="../../model/master/logout_process.php" style="color:#fff;" onclick="return logout();">LOGOUT</a>  

                </span>
            </div>
        </div>
        <?php include('../master/sidebar.php');?>

        <div id="page-wrapper" >

            <div id="page-inner">

                <div class="row">
                    <div class="col-md-8 col-xs-12"><h2 style="color:grey"><i class="fa fa-user"></i> REGISTRATION </h2></div>
                    <div class="col-md-2 col-xs-12"><br><button id="btn_reset" class="btn btn-block btn-lg">Reset</button></div>                    
                    <div class="col-md-2 col-xs-12"><br><button id="btn_save" value="create" class="btn btn-block btn-success btn-lg">SAVE</button></div>
                </div>      

            
                 <?php include('main_form.html'); ?>

                 <!-- /. ROW  -->
                 <hr>
<div class="row">
  <!-- Trigger the modal with a button -->
  <button type="button"  id="btn_add" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">+ ADD PET</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pet</h4>
        </div>
        <div class="modal-body">

<div class="row" style="margin-bottom:5px">
        <div class="col-sm-3 col-xs-12" id="f_owner1_div" class='form-group'> 
    <label>Owner Name: <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <input type="text" readonly="readonly" name="bookId" id="bookId" value=""class="form-control " required>
  </div>  
</div>
        <div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->
  
  <div class="col-sm-3 col-xs-12" id="f_petname1_div" class='form-group'> 
    <label>Pet Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <input type="text" class="form-control " id="f_petname1" required>
  </div>  


  <div class="col-sm-3 col-xs-12" id="f_species1_div" class='form-group'> 
    <label>Species <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control " onchange="getBreed1(this.value)" id="f_species1" required>
      <option value="none"> -- SEARCH Species -- </option>
    </select>
  </div>

  <div class="col-sm-3 col-xs-12" id="f_breed1_div" class='form-group'> 
    <label>Breed <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> <!-- Prod_Name -->
    <select type="text" class="form-control " id="f_breed1" required>
      <option value="none"> -- SEARCH Breed -- </option>
    </select>
  </div>              

  <div class="col-sm-3 col-xs-12" id="f_color1_div" class='form-group'> 
    <label>Color <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <input type="text" class="form-control " id="f_color1" required>
  </div>  
  </div>

   <!-- /.row -->   

<div class="row">

  <div class="col-sm-3 col-xs-12" id="f_markings1_div" class='form-group'> 
    <label>Markings <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <input type="text" class="form-control " id="f_markings1" required>
  </div>    


  <div class="col-sm-3 col-xs-12" id="f_birthdate1_div" class='form-group'> 
    <label>Birthdate <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label> 
    <input type="date" class="form-control " id="f_birthdate1" required>
  </div>    

    <div class="col-sm-2 col-xs-12" id="f_sex1_div" class='form-group'> 
    <label>Gender <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></label> <!-- Prod_Name -->
    <select class="form-control" id="f_sex1" required>
      <option value="none">--SELECT--</option>
      <option value="male">MALE</option>
      <option value="female">FEMALE</option>
    </select>
  </div>                    

</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button"  value="add" id="btn_okay" class="btn btn-success">SAVE</button>
        </div>
      </div>
     
    </div>
  </div>
   </div>


                  <hr />

          <div class="row">                     <!-- TABLES -->          

            <div class="col-lg-12 col-sm-12 col-xs-12">
              <table id="table_main" class="table table-condensed table-striped table-hover">
                <thead>
                  <tr>
                    <th>Name</th>   
                    <th>Contact</th>                    
                    <th>Age</th>
                    <th>Gender</th> 
                    <th>Address</th>                   
                    <th style="width: 10px"></th>                       
                    <th style="width: 10px"></th>
                  </tr>
                  <tbody></tbody>
                </thead>
              </table>

              </div><!-- /.col -->
          </div>  <!-- /.row -->                 

        



                 <!-- /. ROW  -->           
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
              <?php include('../../view/master/footer.html'); ?>

        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
      <!-- BOOTSTRAP SCRIPTS -->

    <script src="../../controller/registration/main.js" type="text/javascript"></script>
    <script type="text/javascript">

    </script>
   
</body>
</html>
