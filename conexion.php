<?php
ob_start(); $db = new mysqli("sql.epizy.com","epiz_28","3b"); if($db->connect_errno > 0){ die('Unable to connect to database [' . $db->connect_error . ']');  }  mysqli_select_db($db,"epiz_28591516_biitte_users"); $db->set_charset("utf8mb4"); 
?>

<?php
//ob_start(); $db = new mysqli("localhost","root",""); if($db->connect_errno > 0){  die('Unable to connect to database [' . $db->connect_error . ']');  } mysqli_select_db($db,"biitte_users"); $db->set_charset("utf8mb4");				
?>
