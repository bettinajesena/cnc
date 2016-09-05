<?php 
  if(!isset($_SESSION)) 
  { session_start(); }
  
  if($_SESSION["chatsnchiens_user_name"]=="" || $_SESSION["chatsnchiens_user_type"]=="")
  {?>
    <script type="text/javascript">   
      function Redirect() 
      {  
        window.location="../master/login.php"; 
       // alert("Please Log-in"); 
      } 
      Redirect();
    </script>
  <?php } 
  else{
  $chatsnchiens_user_name = $_SESSION["chatsnchiens_user_name"];
  $chatsnchiens_user_type = $_SESSION["chatsnchiens_user_type"];
  }
  echo'<input type="hidden" id="chatsnchiens_user_type" value="'.$chatsnchiens_user_type.'">';  
?>
