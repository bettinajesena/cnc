<!-- SESSION LOG BEFORE <html> TAG -->
<?php include('../../controller/master/log.php'); ?>

<!DOCTYPE html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>
	<!-- BOOTSTRAP STYLES-->
     <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />


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
                      <!-- LOGO HERE -->
                        Chats N Chien                     
                    </a>
                </div>
              
                 <span class="logout-spn" > <!-- LOGO -->
                  <a href="../../model/master/logout_ process.php" style="color:#fff;" onclick="return logout();">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- SIDE BAR -->
        <?php include('../master/sidebar.php');?>

        <div id="page-wrapper" >

            <div id="page-inner">
              <!-- BUTTON CONTROLS -->
              <!-- Button IDs are important for javascript functions -->
                <div class="row"> 
                    <!-- class fa fa-users is calling font-awesome gem icon -->
                    <div class="col-md-8 col-xs-12"><h2 style="color:grey"><i class="fa fa-users"></i> USERS </h2></div>
                    <!-- 2 button controls -->
                    <div class="col-md-2 col-xs-12"><br><button id="btn_reset" class="btn btn-block btn-lg">Reset</button></div>                    
                    <div class="col-md-2 col-xs-12"><br><button id="btn_save" class="btn btn-block btn-success btn-lg">SAVE</button></div>
                </div>      

            <!-- FORM HERE, calling form via include-->
            <?php include('main_form.html'); ?>


                 <!-- /. ROW  -->
                  <hr> <!--divider -->

          <!-- MAIN TABLE HERE -->
          <div class="row">                     <!-- TABLES -->          

            <div class="col-lg-12 col-sm-12 col-xs-12">
              <table id="table_main" class="table table-condensed table-striped table-hover">
                <thead>
                  <tr>
                    <th>Username</th>                       
                    <th>User Type</th> 
                    <th>Status</th>                         
                    <th></th> <!-- COLUMN IS BLANK SO that in the process of populating table, 
                    this will be populated with a BUTTON -->
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
        <div class="footer"> <!-- FOOTER HERE -->
           <div class="row">
              <?php include('../../view/master/footer.html'); ?>
          </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
      <!-- BOOTSTRAP SCRIPTS -->

    <!-- CONNECTING CONTROLLER of USER from controller/user -->
    <script src="../../controller/user/main.js" type="text/javascript"></script>

    <script type="text/javascript">
      // insert here your local javascript codes
    </script>
   
</body>
</html>
