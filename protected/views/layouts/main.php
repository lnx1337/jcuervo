<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.css">
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles-ie8.css"><![endif]-->
    <? $idFb = explode('/', $_SERVER['PATH_INFO']); if(count($idFb)==4){ if($idFb[2]=='Profile'){ Yii::app()->session['nidFb']=$idFb[3]; } } 
        $protocol="http://"; if(isset($_SERVER['HTTPS'])){ $protocol="https://"; }else{ $protocol="http://"; }
        Yii::app()->session['protocol']=$protocol;
    ?>
    <script>  window.protocol="<? echo $protocol; ?>"; </script> 
  </head>
  <body>
    <?php echo $content; ?>
    <?php
       $baseUrl = Yii::app()->baseUrl; 
       $cs = Yii::app()->getClientScript();
       $cs->registerCoreScript('jquery');
       $cs->registerCoreScript('jquery.min');
    ?>
    <div id="wrapper-ie8">
      <div id="overlay-ie8">
        <div id="popup-ie8"><i class="icon-exclamation-sign icon-3x"></i>
          <p>Tu navegador no soporta la funcionalidad de esta app.</p><br>Por favor intenta en otro navegador o actualiza a una versión más reciente.
        </div>
      </div>
    </div>
    <footer class="tos"><a href="#">Términos y Condiciones</a></footer>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kinetic-v4.3.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.lazyload.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easytabs.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hashchange.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/slides.min.jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
  </body>
</html>
