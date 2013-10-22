<!DOCTYPE html>
<html lang="es">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>

    <style type="text/css"> .espacio_camara{ background-color: orange; height: auto; }</style>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
    
    <script src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
    <script src="/php2/jcuervo/js/jquery.Jcrop.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/webcam.js"></script>
    
    <link rel="stylesheet" href="/php2/jcuervo/css/jquery.Jcrop.css" type="text/css" />
    <?  $idFb = split('/', $_SERVER['PATH_INFO']); if(count($idFb)==4){ if($idFb[2]=='Profile'){ Yii::app()->session['nidFb']=$idFb[3]; } } 
        $protocol="http://"; if(isset($_SERVER['HTTPS'])){ $protocol="https://"; }else{ $protocol="http://"; }
    ?>
    <script>  window.protocol="<? echo $protocol; ?>"; </script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
  </head>


  <body class="lb">
    <a href="#" onclick="parent.$.fancybox.close();return false;" class="btn"><i class="icon-remove"></i> Cerrar</a>
    <div id="cam">
      <div id="upload_results"></div>
      <div id="camaradiv">
        <h2>Tomar  Fotografía</h2>
        <div class="espacio_camara"></div>
          <div id="camControls">
            <div>
              <button type="button" onClick="webcam.freeze()" class="btn"><i class="icon-camera"></i> Tomar Foto</button>
              <button type="button" onClick="do_upload()" class="btn"><i class="icon-save"></i> Guardar</button>
            </div>
            <button type="button" onClick="webcam.reset()" class="btn"><i class="icon-refresh"></i> Tomar de Nuevo</button>
            <div><a src="#" onClick="webcam.configure();return false"><i class="icon-cogs"></i> Configurar</a></div>
          </div>
       </div>
    </div>


    <script>
      var do_upload, my_completion_handler, visible;

      do_upload = function() {
        $('#upload_results').html('<p>Guardando foto...</p>');
        return webcam.upload();
      };

      my_completion_handler = function(msg) {
        var image_url;
        if (msg.match(/(http\:\/\/\S+)/)) {
          image_url = RegExp.$1;
          if (image_url != null) {
            $('#camaradiv').css("display", "none");
            $('#upload_results').html('<p>Haz click y arrastra el recuadro para recortar tu rostro</p><img src="' + image_url + '" id="cropbox">' + '<button type="button" onClick="do_upload()" id="spic" class="btn"><i class="icon-save"></i> Guardar</button>');
            $('#cropbox').click();
            return false;
          }
        } else {
          return alert('error');
        }
      };

      visible = 0;

      $(".espacio_camara").before(webcam.get_html(320, 240));

      webcam.set_hook("onComplete", "my_completion_handler");
    </script>
 
 
  </body>
</html>