<?php
session_start();
if (!isset($_SESSION['username'])) {
	echo "You are logout";
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<style>
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
.container{
	width: 100%;
	height: 100vh;
	background-image: url("pic.jpg");
}
 span{
 	color: green;
 }
 h1{
 	position: absolute;
 	display: flex;
 	top: 200px;
 	left: 300px;
 	align-items: center;
 	font-size: 60px;
} 
span{
 	top: 50px;
 	left: 400px;
 	align-items: center;
 	padding: 10px;
}

 a{
 	position: absolute;
 	top: 10px;
 	right: 20px;
 	font-size: 20px;
 }
 a:hover{
 	color: green;
 }

 </style>
<body>
    <div class="container">
	<h1>Hello this is<span> <?php echo $_SESSION['username']; ?></span></h1>
	<a href="logout.php">Logout</a>
	</div>
</body>
</html>