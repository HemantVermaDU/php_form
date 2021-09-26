<?php
session_start();
ob_start();
?>
<?php
include 'dbconnection.php';
if (isset($_POST['Login'])) {
  $email=$_POST['email'];
  $password=$_POST['password'];

  $email_search="select * from registration where email='$email'";
  $query=mysqli_query($con,$email_search);

  $email_count=mysqli_num_rows($query);

  if ($email_count) {
    $email_pass=mysqli_fetch_assoc($query);

    $db_pass=$email_pass['password'];

    $_SESSION['username'] =$email_pass['username'];

    $pass_decode=password_verify($password, $db_pass);

    if($pass_decode){
      if(isset($_POST['rememberme'])){

        setcookie('emailcookie',$email,time()+86400);
        setcookie('passwordcookie',$password,time()+86400);

        header('location:home.php');
      }else{
        header('location:home.php');
      }

    }
    else{
      echo "Incorrect password";
    }}
    else{
      echo "invalid Email";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
  <style>
    body{
  background-color: #344a72;
}

.signup-box{
  width: 360px;
  height: 620px;
  margin: auto;
  background-color: white;
  border-radius: 3px;
}

.login-box{
  width: 360px;
  height: 280px;
  margin: auto;
  background-color: white;
  border-radius: 3px;
}

h1{
  text-align: center;
}
h4{
  text-align: center;
}
form{
  width: 300px;
  margin-left: 20px;
}

form label{
  display: flex;
  margin-top: 20px;
  font-size: 18px;
}

input[type="email"]{
  width: 100%;
  padding: 7px;
  border: none;
  border: 1px solid gray;
  border-radius: 6px;
  outline: none;
}
input[type="password"]{
  width: 100%;
  padding: 7px;
  border: none;
  border: 1px solid gray;
  border-radius: 6px;
  outline: none;
}
input[type="button"]{
  width: 320px;
  height: 35px;
  margin-top: 20px;
  border: none;
  background-color: #49c1a2;
  color: white;
  font-size: 18px;

}

p{
  text-align: center;
  padding-top: 20px;
  font-size: 15px;
}

.para-2{
  text-align: center;
  color: white;
  font-size: 15px;
  margin-top: -10px;
}

.para-2 a{
  color: #49c1a2;
}
  </style>
</head>
<body>
<div class="login-box">
  <h1> Login Form</h1>
 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <label>Email</label>
    <input type="email" placeholder="Enter Email" name="email" required value="<?php if(isset($_COOKIE['emailcookie'])) {echo $_COOKIE['emailcookie']; } ?>">
     <label>Password</label>
    <input type="password" placeholder="Enter Password" name="password" required value="<?php if(isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'];} ?>"><br><br>
      
      <input type="checkbox" name="rememberme"> Remember Me <br><br>
    <input type="submit" name="Login">
  </form>
</div>
<p class="para-2">
Not have an account?<a href="signup.php">Sign Up Here</a>
</p>
</body>
</html>
