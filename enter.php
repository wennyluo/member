<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>��¼ϵͳ�ĺ�ִ̨�й���</title>
</head>
<body>
<?php
session_start();//��¼ϵͳ����һ��session����
$username=$_REQUEST["username"];//��ȡhtml�е��û�����ͨ��post����
$password=$_REQUEST["password"];//��ȡhtml�е����루ͨ��post����

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
    window.location.href="index.html"; 
  </script>
<?php 
    } 
    else { 
      if ($dbpassword!=$password){//����Ӧ���벻��ʱ����index.html���� 
  ?> 
  <script type="text/javascript"> 
    alert("�������"); 
    window.location.href="index.html"; 
  </script> 
 <?php 
      } 
      else { 
        $_SESSION["username"]=$username; 
        $_SESSION["code"]=mt_rand(0, 100000);//��session��һ�����ֵ����ֹ�û�ֱ��ͨ�����ý������welcome.php 
  ?> 
  <script type="text/javascript"> 
    window.location.href="welcome.php"; 
  </script> 
  <?php 
      } 
    } 
   $conn->close();//�ر����ݿ����ӣ��粻�رգ��´�����ʱ����� 
   ?>
</body>
</html>