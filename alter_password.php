<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>�����޸�����</title> 
</head> 
<body> 
  <?php
  session_start (); 
  $username = $_REQUEST ["username"]; 
  $oldpassword = $_REQUEST ["oldpassword"]; 
  $newpassword = $_REQUEST ["newpassword"]; 

  $conn=new mysqli('localhost','root','wenny673','member');
   if(mysqli_connect_errno())
     {
      echo 'Error: Can not connect to database.';
      }

  $dbusername=null;
  $dbpassword=null;
  $result=mysqli_query($conn,"select * from webuser where username='{$username}'");
  while ($row=mysqli_fetch_array($result)) {//whileѭ����$result�еĽ���ҳ��� 
      $dbusername=$row["username"]; 
      $dbpassword=$row["password"]; 
    } 
    if (is_null($dbusername)) {//�û��������ݿ��в�����ʱ����index.html���� 
?> 
<script type="text/javascript"> 
    alert("�û���������"); 
    window.location.href="alter_password.html"; 
  </script> 
<?php
  } 
  if ($oldpassword != $dbpassword) { 
    ?> 
  <script type="text/javascript"> 
    alert("�������"); 
    window.location.href="alter_password.html"; 
  </script> 
  <?php
  } 
  $sql="update webuser set password='{$newpassword}' where username='{$username}'" ;
  if(mysqli_query($conn,$sql))
   {
	   ?>
  <script type="text/javascript"> 
    alert("�����޸ĳɹ�"); 
    window.location.href="index.html"; 
  </script> 
	<?php
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	 mysqli_close ( $conn ); 
  ?> 
</body> 
</html> 
