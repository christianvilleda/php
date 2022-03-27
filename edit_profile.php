<?php if (isset($_SERVER['HTTPS'])) {echo ""; } else {
$red_enlace_actual = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; header("Location: $red_enlace_actual"); exit; } ?>
<?php
session_start();
include("conexion.php");
if(isset($_COOKIE['arwenpw'])&&$_COOKIE['arwenml']){
$asid = $_COOKIE['arwenpw'];
$asml = $_COOKIE['arwenml'];

$sqluser ="SELECT * FROM users WHERE password='$asid' && correo='$asml'";
$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
       { 
              $correo= $found['correo'];$id_user= $found['id'];
              $nombre = $found['nombre'];
              $apellidos= $found['apellidos'];$pais= $found['pais'];
        } 

if ($asml == '' ) {
  header('location:  https://www.biitte.com/logout');
      }
}
 else {
  header('location: https://www.biitte.com/login');
}
?>

<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tu perfil Biitte</title>
    <meta name="viewport" content="user-scalable=no,initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height">
    <link rel="shortcut icon" href="https://www.biitte.com/img/ass/logo.png"/>
    
<link rel="manifest" href="https://www.biitte.com/manifest.json">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="Biitte">
<meta name="apple-mobile-web-app-title" content="Biitte">
<meta name="theme-color" content="#020126">
<meta name="msapplication-navbutton-color" content="#020126">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="msapplication-starturl" content="index">

<link rel="icon" type="image/png" sizes="48x48" href="https://www.biitte.com/img/ass/48x48.png">
<link rel="apple-touch-icon" type="image/png" sizes="48x48" href="https://www.biitte.com/img/ass/48x48.png">
<link rel="icon" type="image/png" sizes="96x96" href="https://www.biitte.com/img/ass/96x96.png">
<link rel="apple-touch-icon" type="image/png" sizes="96x96" href="https://www.biitte.com/img/ass/96x96.png">
<link rel="icon" type="image/png" sizes="192x192" href="https://www.biitte.com/img/ass/192x192.png">
<link rel="apple-touch-icon" type="image/png" sizes="192x192" href="https://www.biitte.com/img/ass/192x192.png">

<meta property="og:type" content="website" />
<meta property="og:title" content="Biitte" />
<meta property="og:description" content="La nueva forma de descubrir ofertas, productos y cupones en el lúgar donde estés!" />
<meta property="og:url" content="https://www.biitte.com/" />
<meta property="og:site_name" content="Biitte" />
<meta property="og:image" content="https://www.biitte.com/img/og.png" />
<meta property="og:image:secure_url" content="https://www.biitte.com/img/og.png" />
<meta property="og:image:width" content="500" />
<meta property="og:image:height" content="499" />

  <link rel="canonical" href="https://www.biitte.com/" />


    <meta name="description" content="La nueva forma de descubrir ofertas, productos y cupones en el lúgar donde estés!">
    <meta name="author" content="Biitte" />
    <meta name="keywords" content="biitte,bite,compras en internet,cupones,ofertas,productos,biitte arwen systems,biitte.com">
    <meta name="generator" content="Biitte" />


        <link href="https://www.biitte.com/fontawesome/css/all.css" rel="stylesheet">
        <link rel="stylesheet"  href="https://www.biitte.com/css/bootstrap.min.css"> 
        <script src="https://www.biitte.com/js/jquery.js"></script>
        <script src="https://www.biitte.com/js/bootstrap.min.js"></script>
      <script src="https://www.biitte.com/js/jquery.min.js"></script>
      <script src="https://www.biitte.com/js/simple-mobile-menu.js"></script>
      <link rel="stylesheet" href="https://www.biitte.com/css/simple-mobile-menu.css">
      <link rel="stylesheet" href="https://www.biitte.com/css/simple-mobile-menu-responsive.css">

  </head>
<body>

<?php include ("navbar.php"); ?>
<main></main>


<div class="jumbotron jumbotron-fluid">
  <div class="container">
 <form  id="form1" method="post" name="form1">
    <h3><strong><center>Editar Datos:</center></strong></h3>
  
  <div class="form-row">
    <div class="col">
       <label>Nombre:</label>
           <input type="text" class="form-control" id="name" name="name" value='<?php echo  $nombre;  ?>'>                       
    </div>

    <div class="col">
      <label>Apellidos:</label>
     <input type="text" class="form-control" id="apellidos" name="apellidos" value='<?php echo  $apellidos;  ?>'>  
    </div>
  </div>

    <div class="form-group">
    <label>Correo:</label>
    <input type="email" class="form-control" readonly="readonly" value='<?php echo $correo; ?>'>
  </div>


<!--
    <div class="form-group">
      <label for="inputCity">País</label>
      <input type="text" class="form-control" style="border:1px solid #00ABD1;" readonly="readonly" value='<?php //echo $pais;?>'>
      <p style="color:#1ABC9C;">No puedes cambiar tu país</p>
    </div>
 -->   



<center>
<button type="submit" class='btn btn-primary  btn-lg'  id="enviar" name="enviar">Guardar</button><div id="enviandoo"></div>
</center>

</form>
</div>
</div>


<script src="https://www.biitte.com/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://www.biitte.com/js/jquery.form.js" type="text/javascript"></script>
<script src="https://www.biitte.com/js/validate.min.js" type="text/javascript"></script> 

<script type="text/javascript">
$(document).ready(function(){
    $("#form1").validate({
        event: "blur",
              rules:{
          name:{
            required:true
          },
          apellidos:{
            required:true
          }
        },
        messages:{
          name: 'Ingresa tu nombre',
          apellidos: 'Ingresa tus apellidos',
        },

        debug: true,errorElement: "div",
        submitHandler: function(form){
            $("#enviandoo").show();
            document.getElementById('enviar').style.display = 'none';
            $("#enviandoo").html("<button class='btn btn-success  btn-lg' readonly='readonly' disabled >Enviando...</button>");

            setTimeout("location.href= 'https://www.biitte.com/' ",3);//magia :)

            $.ajax({
                type: "POST",
                url:"https://www.biitte.com/send_edit_profile.php",
                data: "name="+($('#name').val())+"&apellidos="+($('#apellidos').val()),
                success: function(msg){
                    $("#respuesta").html(msg);
                    setTimeout(function() {
                        $('#respuesta').fadeOut('slow');
                    }, 50000);

                }
            });
        }
    });
});
</script>
<style type="text/css">
form div.error, div.error {color: red;font-style: italic}</style>

<?php
include ("footer.php");
?>

</body>
</html>