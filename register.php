<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>注册用户</title> 
</head> 
<body> 
  <?php
    session_start(); 
    $username=$_REQUEST["username"]; 
    $password=$_REQUEST["password"]; 
	$truename=$_REQUEST["truename"];
	$sex=$_REQUEST["sex"];
	$email=$_REQUEST["email"];
	$tel=$_REQUEST["tel"];
	$question=$_REQUEST["question"];
	$answer=$_REQUEST["answer"];
	$authority=$_REQUEST["authority"];
  
    $conn=mysqli_connect("localhost","root","wenny673","member"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	} 
    
    $dbusername=null; 
    $dbpassword=null; 
    $result=mysqli_query($conn,"select * from webuser where username ='{$username}'");//查出对应用户名的信息 
    while ($row=mysqli_fetch_array($result)) {//while循环将$result中的结果找出来 
      $dbusername=$row["username"]; 
      $dbpassword=$row["password"]; 
    } 
    if(!is_null($dbusername))
   {
  ?>
  	<script type="text/javascript"> 
    alert("用户已存在"); 
    window.location.href="register.html"; 
  </script>
  <?php
	}else{
  $sql="INSERT INTO webuser (username,password,truename,sex,email,tel,question,answer,authority) VALUES('{$username}','{$password}','{$truename}','{$sex}','{$email}','{$tel}','{$question}','{$answer}','{$authority}')";
   if(mysqli_query($conn,$sql))
   {
	?>
	<script type="text/javascript"> 
    alert("注册成功"); 
    window.location.href="index.html"; 
  </script>
<?php
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	}
	 mysqli_close ( $conn ); 
  ?> 
</body> 
</html> 
