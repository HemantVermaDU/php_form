<?php
include 'dbconnection.php';
if(isset($_POST['submit'])){
$username=mysqli_real_escape_string($con , $_POST['fname']);
$email=mysqli_real_escape_string($con , $_POST['email']);
$mobile=mysqli_real_escape_string($con , $_POST['mobile']);
$password=mysqli_real_escape_string($con , $_POST['psw']);
$cpassword=mysqli_real_escape_string($con , $_POST['psw-repeat']);

$pass=password_hash($password,PASSWORD_BCRYPT);
$cpass=password_hash($cpassword,PASSWORD_BCRYPT);

$emailquery = "select * from registration where email='$email'";
$query=mysqli_query($con,$emailquery);

$emailcount =mysqli_num_rows($query);

if($emailcount>0){
  echo "email already exits";
}
else{
  if($password === $cpassword){
    $insertquery ="insert into registration(username,email,mobile,password,cpassword) values('$username','$email','$mobile','$pass','$cpass')";

    $iquery = mysqli_query($con ,$insertquery);
    if($con){
  ?>
  <script>
  alert("Inserted Successful");
    </script>
    <?php
}
else{
  ?>
  <script>
  alert("NO Inserted Successful");
    </script>
    <?php
}
  }else{
    echo "password are not match";
  }
}}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
body{
  background-color: #344a72;
}

.signup-box{
  width: 360px;
  height: 520px;
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

form input{
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
<div class="signup-box">
  <h1> Sign Up Form</h1>
  <h4>Register</h4>
 <form action="" method="POST">
   <label>Full Name</label>
    <input type="text" placeholder="Full Name" name="fname" required>
       <label>Email</label>
    <input type="email" placeholder="Enter Email" name="email" required>
      <label>Mobile</label>
    <input type="Mobile" placeholder="Mobile Number" name="mobile" required>
       <label>Password</label>
    <input type="password" placeholder="Enter Password" name="psw" required>
       <label>Confirm Password</label>
    <input type="password" placeholder="Confirm Password" name="psw-repeat" required><br><br>
    <button type="submit" class="registerbtn" name="submit">Create Account</button>
  </form>
</div>
<p class="para-2">
Already have an account?<a href="login.php"> Login Here</a>
</p>
</body>
</html>

