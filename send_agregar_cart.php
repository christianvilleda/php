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

if(isset($_POST['id_producto'])) {

  $id_producto=$_POST['id_producto'];
  $cantidad=1;
  $fecha = date("j/ n/ Y");  


 $sql="SELECT * FROM carrito  WHERE id_usuario='$id_user_post' and id_producto='$id_producto' ";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {

$sql="INSERT INTO carrito(id_usuario,id_producto,cantidad,fecha) VALUES('$id_user_post','$id_producto','$cantidad','$fecha')";
                   echo mysqli_query($db,$sql);



} //if no esta agregado
else{

  $sqlprod ="SELECT * FROM carrito WHERE id_usuario='$id_user_post' and id_producto='$id_producto' ";
$retrievedp = mysqli_query($db,$sqlprod);
    while($foundp = mysqli_fetch_array($retrievedp))
       { $cantidad_post= $foundp['cantidad']; } 
     
$catidad_nueva = $cantidad_post + 1;


$sql="UPDATE carrito SET  cantidad='$catidad_nueva' WHERE  id_usuario='$id_user_post' and id_producto='$id_producto' ";
                   echo mysqli_query($db,$sql);
}//else ya esta agregado


}//if post
else{
  header('location:index ');
    }               

?>