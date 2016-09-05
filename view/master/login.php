<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
<div class="login-page">
<h1 style="text-align: center; color:#214761;">ChatsN'Chiens</h1>
  <div class="form">

    <form action="../../model/master/login_process.php" method="post" class="login-form">
    <!--go to php file where it process login, validate and return if login is success or failure -->
      <input name="user_name" type="text" placeholder="username"/ required>
      <input name="user_password" type="password" placeholder="password"/ required>
      <button>login</button>
    </form>
  </div>
</div>
</body>

</html>

<script>

</script