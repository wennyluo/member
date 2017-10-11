<!doctype html> 
<?php
session_start ();//将session销毁时调用destro
?>
<html> 
<head> 
<meta charset="UTF-8"> 
</head> 
<body> 
<?php 
session_destroy (); 
?> 
<script type="text/javascript"> 
 window.location.href="index.html"; 
</script> 
</body> 
</html> 
