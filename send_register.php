<?php 
error_reporting(0);
session_start();
include("conexion.php");

if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip = $_SERVER['HTTP_CLIENT_IP']; } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; } else { $ip = $_SERVER['REMOTE_ADDR']; } 
$info= $_SERVER['HTTP_USER_AGENT'];
?>

<?php

 /*------------------------ pin ---------------*/   
$alpha = "123456789789";
$user_1 = "";
$longitud=4;
for($i=0;$i<$longitud;$i++){
    $user_1 .= $alpha[rand(0, strlen($alpha)-1)];
}
$pin=$user_1;
 /*------------------------ pin ---------------*/

//si se han enviado datos
if (isset($_POST['a_name']) and isset($_POST['a_apell']) and  isset($_POST['a_correo']) and  isset($_POST['a_password'])){
    $a_name = mysqli_real_escape_string($db, $_POST["a_name"] );
    $a_apell = mysqli_real_escape_string($db, $_POST["a_apell"] );
    $a_correo = mysqli_real_escape_string($db, $_POST["a_correo"] );
    $a_password = mysqli_real_escape_string($db, md5($_POST["a_password"]) );
    $a_pais = mysqli_real_escape_string($db, $_POST["a_pais"] );
    $fecha = $_POST["fecha"];
    $fftt = $_POST["fftt"];
    $h007744 = $_POST["h007744"];

        $patron='as.1.2.s8a52d1';
        $patron2='9e6fc45xd';
        $b=$patron.sha1(md5($a_password)).$patron2;

 $sql="SELECT * FROM users  WHERE correo='$a_correo'";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {


  $enter="INSERT INTO users (nombre,apellidos,correo,password,pais,fecha_reg,pin) VALUES ('$a_name','$a_apell','$a_correo','$b','$a_pais','$fftt','$pin')";
                                  $db->query($enter);


$sqluser ="SELECT * FROM users WHERE password='$b' && correo='$a_correo'"; $retrieved = mysqli_query($db,$sqluser);while($found = mysqli_fetch_array($retrieved)) { $id_user = $found['id']; }  



               $log="INSERT INTO login (id_user,fecha,ip,info,hora,f_t) VALUES('$id_user','$fftt','$ip','$info','$h007744','$fecha')";
                                  $db->query($log);                                



//----------------------------------------crear carpeta------------------------------------------------------------//


//nombre      
$nombre=strtolower($a_name);
$nombre = substr($nombre, 0, 15);
$nombre = preg_replace('([^A-Za-z0-9])', '', $nombre);
$real1 = str_replace(" ", "", $nombre);

//apellidos
$apellidos=strtolower($a_apell);
$apellidos = substr($apellidos, 0, 12);
$apellidos = preg_replace('([^A-Za-z0-9])', '', $apellidos);
$real2 = str_replace(" ", "", $apellidos);

//id
$id_user_c=strtolower($id_user);
$id_user_c = preg_replace('([^A-Za-z0-9])', '', $id_user_c);
$real3 = str_replace(" ", "", $id_user_c);


$real_nombre_0=$real1."-".$real2."-".$real3;

$real_n=$real_nombre_0;



$sql="SELECT * FROM users  WHERE usuario='$real_n'";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         {
$real_nombre=$real_nombre_0;

/*$nombre_carpeta = "profile/".$real_nombre.""; 
if(!is_dir($nombre_carpeta)) {
  if(!mkdir($nombre_carpeta, 0755, true)) {
    die('Fallo al crear usuario code A-6');
  }

}
*/


$queryz2 = "UPDATE users SET usuario='$real_nombre' WHERE id='$id_user' ";
                                  $db->query($queryz2) or die('se produjo un error en el servidor'); 


/*$destino = $nombre_carpeta."/index.php"; 
$srcfile='profile/AAAgeneral/index.php';
$dstfile=$destino; 
copy($srcfile, $dstfile);*/


                         }//if verificar carpeta
//----------------------------------------------------else si carpeta ya existe-----------------------
                else{
$alpha = "12345678978912345345678978912345345678978912345345678978912345345678978912345345678978912345";
$user_1 = "";$longitud=5;for($i=0;$i<$longitud;$i++){ $user_1 .= $alpha[rand(0, strlen($alpha)-1)];}
$pin2=$user_1;

$real_nombre=$real_nombre_0."_".$pin2.$id_user."";

/*$nombre_carpeta = "profile/".$real_nombre.""; 

if(!is_dir($nombre_carpeta)) {
  if(!mkdir($nombre_carpeta, 0755, true)) {
    die('Fallo al crear usuario code A-6');
  }
}*/

         
$queryz2 = "UPDATE users SET usuario='$real_nombre' WHERE id='$id_user' ";
                                  $db->query($queryz2) or die('se produjo un error en el servidor'); 

/*
$destino = $nombre_carpeta."/index.php"; 
$srcfile='profile/AAAgeneral/index.php';
$dstfile=$destino; 
copy($srcfile, $dstfile);
*/

                         }


//----------------------------------------crear carpeta------------------------------------------------------------//




    setcookie("arwenpw",$b,time()+(60*60*24*365));
    setcookie("arwenml",$a_correo,time()+(60*60*24*365));
?>   

<html> </body> <script type="text/javascript">
function redireccionar(){ window.location="https://www.biitte.com/"; } 
//function redireccionar(){ window.location="/3150545db631ebce40b10d4384eefc98"; } 
setTimeout ("redireccionar()", 30); //tiempo expresado en milisegundos
</script> </head> </body>   
 <?php 






//-------------------------------- enviar email ----------------//
/*
include "phpmailer/class.phpmailer.php";
include "phpmailer/class.smtp.php";

$email_user = "verify@biitte.com";
$email_password = "Arwennsys2018";
$the_subject = utf8_decode($pin." Es el código de confirmación de tu cuenta de Biitte");
$address_to = utf8_decode($a_correo);
$from_name = "Verify Account Biitte";
$phpmailer = new PHPMailer();
*/
// ---------- datos de la cuenta de mail -------------------------------
/*
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
*/
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
/*
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "mail.biitte.com"; // Mail
$phpmailer->Port = 290;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email

$phpmailer->Subject = $the_subject; 
$phpmailer->Body .=utf8_decode('<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Biitte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="icon.png"/>
   <title>Bienvenido!</title> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet"  href="https://biitte.com/css/bootstrap.min.css"> 
        <script src="https://biitte.com/js/jquery.js"></script><script src="https://biitte.com/js/bootstrap.min.js"></script>
</head> 
<body> 

<center><img src="https://biitte.com/img/especiales/biitte.png" alt="Logo Biitte" height="50" width="100"></center><br><br>

<center><h3><strong>Confirma tu dirección de correo electrónico</strong></h3></center><br>

<p>Debes completar este paso  para poder usar tu cuenta de Biitte. Vamos a asegurarnos de que esta sea tu dirección de correo electrónica correcta.</p>
 
<p>Por favor introduce este código de verificación :</p>
 
<center><h3><strong>'. $pin.'</strong></h3></center><br><br>
 

<p>Gracias.</p>
<p>Todo el equipo de Biitte te da la bienvenda</p>
<hr />
<p><span style="color: #808080; font-size: 9pt;"><a style="color: #808080;" href="https://biitte.com">Biitte.com </a>Encuentra las mejores ofertas, productos y cupones en tu ciudad!&nbsp;&nbsp;</span><span style="color: #808080; font-size: 9pt;"><a href="https://biitte.com/support">&iquest;Necesitas ayuda?</a>&nbsp; &nbsp;||&nbsp; &nbsp;<a href="https://biitte.com/contact">&iquest;Tienes sugerencias?</a></span></p>
<p style="text-align: center;"><span style="color: #707B7C; font-size: 9pt;"><span>&copy; Biitte an Arwen Systems Company&nbsp;</span></span></p>


  </body>
</html>
 ');
$phpmailer->IsHTML(true);

$phpmailer->Send();
*/
/*----------------------------------- fin enviar email ---------------------------------------*/
?>   
  
 <?php 
}
else{ // si el correo ya existe 
  
  echo "
  <div class='alert alert-danger' role='alert'>
  El correo ingresado ya está registrado
</div>  

<script>
             $('#enviandoo').hide();
            document.getElementById('enviar').style.display = 'block';
</script>

";

}

} else{ // si no hay post 
  header('location:register');
}
?>