<?php
session_start();
include("conexion.php");
if(isset($_COOKIE['arwenpw'])&&$_COOKIE['arwenml']){
$asid = $_COOKIE['arwenpw'];
$asml = $_COOKIE['arwenml'];

}
 else {
  header('location:login');
}

$sqluser ="SELECT * FROM users WHERE password='$asid' && correo='$asml'";
$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
       { $id_user_post= $found['id']; } 

?>

<?php 

if(isset($_POST['id_offer'])) {

  $id_offer=$_POST['id_offer'];
  $fecha = date("j/ n/ Y");  


 $sql="SELECT * FROM favoritos_ofertas  WHERE id_usuario='$id_user_post' and id_oferta='$id_offer' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {

$sql="INSERT INTO favoritos_ofertas(id_usuario,id_oferta,fecha) VALUES('$id_user_post','$id_offer','$fecha')";
                   echo mysqli_query($db,$sql);



} else{

$sql="DELETE FROM favoritos_ofertas WHERE id_usuario='$id_user_post' and id_oferta='$id_offer' ";
                   echo mysqli_query($db,$sql);
}


}
else{
  header('location:index ');
    }               

?>