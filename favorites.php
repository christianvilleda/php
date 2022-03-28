<?php
session_start();
include("conexion.php"); include("conexion_2.php");
if(isset($_COOKIE['arwenpw'])&&$_COOKIE['arwenml']){
$asid = $_COOKIE['arwenpw'];
$asml = $_COOKIE['arwenml'];

$sqluser ="SELECT * FROM users WHERE password='$asid' && correo='$asml'";
$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
       { 
          $id_user= $found['id'];   $correo= $found['correo'];
              $nombre = $found['nombre'];
              $apellidos= $found['apellidos'];$pais= $found['pais'];
        } 

if ($asml == '' ) {
  header('location: /logout');
      }
}
 else {
  header('location: /login');
}
?>

<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tu Lista - Biitte</title>
    <meta name="viewport" content="user-scalable=no,initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height">
    <link rel="shortcut icon" href="https://www.biitte.com/img/ass/logo.png"/>
    
<link rel="manifest" href="manifest.json">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="Biitte">
<meta name="apple-mobile-web-app-title" content="Biitte">
<meta name="theme-color" content="#009FC7">
<meta name="msapplication-navbutton-color" content="#009FC7">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="msapplication-starturl" content="index">

<link rel="icon" type="image/png" sizes="48x48" href="img/ass/48x48.png">
<link rel="apple-touch-icon" type="image/png" sizes="48x48" href="img/ass/48x48.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/ass/96x96.png">
<link rel="apple-touch-icon" type="image/png" sizes="96x96" href="img/ass/96x96.png">
<link rel="icon" type="image/png" sizes="192x192" href="img/ass/192x192.png">
<link rel="apple-touch-icon" type="image/png" sizes="192x192" href="img/ass/192x192.png">

<meta property="og:type" content="website" />
<meta property="og:title" content="Tu Lista - Biitte" />
<meta property="og:description" content="Ve tu lista de deseos guardada en Biitte!" />
<meta property="og:url" content="https://biitte.com/favorites" />
<meta property="og:site_name" content="Biitte" />
<meta property="og:image" content="https://biitte.com/img/og.png" />
<meta property="og:image:secure_url" content="https://biitte.com/img/og.png" />
<meta property="og:image:width" content="500" />
<meta property="og:image:height" content="499" />

  <link rel="canonical" href="https://www.biitte.com/" />

    <meta property="og:title" content="Tus Favoritos - Biitte" />
    <meta name="description" content="Ve tu lista de deseos guardada en Biitte!">
    <meta name="author" content="Biitte" />
    <meta name="keywords" content="biitte,bite,compras en internet,cupones,ofertas,productos,biitte arwen systems,biitte.com">
    <meta name="generator" content="Biitte" />


        <link href="fontawesome/css/all.css" rel="stylesheet">
        <link rel="stylesheet"  href="css/bootstrap.min.css"> 
        <script src="js/jquery.js"></script><script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/simple-mobile-menu.js"></script>
      <link rel="stylesheet" href="css/simple-mobile-menu.css">
      <link rel="stylesheet" href="css/simple-mobile-menu-responsive.css">
      <link rel="stylesheet" href="css/productCard.css">

  </head>
<body style="background: #f5f5f5;">













<?php include ('navbar.php'); ?>
<main></main>



<center><h4><strong>Mi Lista de deseos:</strong></h4></center>




<?php
 $sql="SELECT * FROM favoritos_ofertas  WHERE id_usuario='$id_user'";
                   $resultn=mysqli_query($db,$sql);                    
                         if($rowcount=mysqli_num_rows($resultn)==0)
                         { ?>
          <div class="jumbotron jumbotron-fluid" style="padding-top:150px;background:#ffffff !important;">
  <div class="container">
    <h4 class="display-4" style="color:black;">Ups... 
      <img src="https://www.biitte.com/img/events/favorites.png" style="width: 100px;height: auto;"> 
    </h4>
    <p class="lead">Parece que aún no has guardado nada en tu lista. </p>
  </div>
</div><br>                  

<?php }  ?>






<?php 
$consul = "SELECT id,id_oferta,fecha FROM favoritos_ofertas WHERE id_usuario='$id_user' order by id desc"; ?>

    <div class="outer-wrap">
      <div class="content">

        <main class="main-area">
          <section class="cards">
            <div class="ofertas-contenedor"  style="min-width: 95%;">
<?php
if ($result = $db->query($consul)) {

    /* obtener el array de objetos */
    while ($fil = $result->fetch_row()) { ?>



<?php 
$consulta = "SELECT id,id_empresa,nombre,fecha,condiciones,descripcion,precio,descuento,precio_final,hasta,url FROM ofertas  WHERE id='$fil[1]'  "; ?>


<?php 
if ($resultado = $db2->query($consulta)) {

    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()) { ?>


            <article class="card">
           <?php echo "<a href='https://biitte.com/producto/".$fila[0]."/".$fila[10]." ' style='text-decoration: none !important;color: black;'> "; ?>
                      <picture class="thumbnail-card">
                        <div class="box-img-card">
 <?php   
                    $sql2 ="SELECT * FROM ofertas_fotos WHERE id_empresa='$fila[1]' and id_oferta='$fila[0]' ORDER by id asc";
               $rget = mysqli_query($db2,$sql2);$prod=mysqli_num_rows($rget);if($prod!=0){
                                  while($found = mysqli_fetch_array($rget)) {            
                                      $img_name= $found['nombre'];}          
                       echo"<img src='https://www.biitte.com/media/ofertas/$img_name' class='oferta-img' class='oferta-img' alt='Oferta Biitte'>";  

                           } 
                          else{ echo"<img src='https://www.biitte.com/media/none_img.png' class='oferta-img' class='oferta-img' alt='Oferta Biitte'>"; }  //else si no hay foto de oferta final ?>
                         </div>
                    </picture>



                       <!-- <div class="card-content">-->



<div class="product-description">
  <h5 class="title-product"><strong><?php echo $fila[2];?></strong></h5>

<!--
  <p class="descrip-product"><?php/* echo $fila[5];*/?></p><br>-->
<div class="space--l-3">
  <span class="overflow--wrap-off">
    <span style="color:#28B463;font-size:17px;"><strong><?php echo $fila[8]; ?></strong></span>
  </span>
  <span class="space--ml-2" style="margin-left: .57143em!important;">
    <span><strike style="color:#B03A2E;"><?php echo $fila[6]; ?></strike></span>
    <span><strong> <?php if ($fila[7] != ''){ echo "-".$fila[7]."%"; } ?></strong></span>
  </span>
</div>





</div>

                      <!--  </div> .card-content -->
                    </a>
                </article><!-- .card -->


            



<?php
    }  /* liberar el conjunto de resultados */  $resultado->close();
}  ?>






<?php
    }  /* liberar el conjunto de resultados */  $result->close();
}  ?>


                </div> <!-- .container -->
            </section><!-- .cards -->
        </main>
      </div><!-- .content -->
    </div><!-- .outer-wrap -->


<div style="padding-bottom: 150px;"></div>

<!-- footer-->
<?php include ("footer.php"); ?>
</body>


</html>
