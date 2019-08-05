<?php
session_start();
if(isset($_SESSION['unm']))
{
  header("location:home.php");
}
if(isset($_POST['login']))
{
  $con=mysqli_connect('localhost','root','') or die("connection not established");
  mysqli_select_db($con,'atg') or die("no db found");
  $unm = $_POST['username'];
  $pass = $_POST['password'];
  $pass1 = md5($pass);
  $login = mysqli_query($con,"select * from admin where c_username like '".$unm."' and c_password like '".$pass1."'  ");
  $res = mysqli_fetch_array($login);
  if($res)
  {
    $_SESSION["unm"] = $unm;
    header("location:home.php");
  }
  else
  {
    $msg = "Invalid username or password";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="image/logo.jpg" type="image/ico" />

    <title> Automatic TimeTable Generator </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script type="text/javascript">
      function validate()
      {
        var u=document.getElementById("username").value;
        var p=document.getElementById("password").value;
        var patt1=/^[a-z_]+[a-zA-Z_.@0-9]*[a-z_0-9]+$/;
        var result=u.match(patt1);
        var flag=true;
        var msg="";
        if(result==null)
        {
          msg=msg+"\nEnter valid username";
          flag=false;
        }
        if(!flag)
        {
          alert(msg);
          return false;
        }
        return true;
      }
    </script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post" name="login_form" onsubmit="return validate();">
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required=""  />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="" />
              </div>
              
            <div class="separator">
              <div>
                <button class="btn btn-lg submit col-md-12" style="background-color:#D7DBDD;" name="login" type="submit"><b>Log In</b></button>
                <?php
                if(isset($msg)) { ?>
                  <h4 style="color:red;"><?php echo $msg; ?></h4> 
                <?php } ?>
              </div>            
              <div class="clearfix"></div>
               <br />
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>