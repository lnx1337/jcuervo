<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
?>

<html>
<head>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">

<script>
function referrerIsFacebookApp() {
  var isInIFrame = (window.location != window.parent.location) ? true : false;
  
  if (document.URL) {
    if (isInIFrame) {
      return document.URL.indexOf("apps.facebook.com") != -1;
    } else {
      return document.URL.indexOf("apps.t2omedia.com") != -1;

    }
  }
  return false;
}

if (referrerIsFacebookApp()) {
    top.location = 'https://www.facebook.com/JCEspecial/app_342733185828640';

  }
</script>
</head>
<body>
<div id="splash">
      <h1>Memespecial<br><span>Generator</span></h1><a id="login"  class="btn">Genera tu meme</a>
      <div>
         <?php 

            if(count($comics)>3){
                    //print_r($comics);

              foreach ($comics as $key => $value) { ?>
                <div class="itemThumbnail"><div><a href="#"><img src="<?php echo Yii::app()->request->baseUrl."/Comics/".$value['imagen']; ?>"></a></div></div>
            <?php
              }
            }
        ?>
      </div>
    </div>

<script>

  var oauth_url = 'https://www.facebook.com/dialog/oauth/';
  oauth_url += '?client_id=342733185828640';
  oauth_url += '&redirect_uri=' + encodeURIComponent('https://www.facebook.com/JCEspecial?sk=app_342733185828640');
  oauth_url += '&scope=email,read_stream,user_likes,publish_actions,publish_stream,offline_access,user_photos'


  
document.getElementById("login").onclick = function() {
      //window.top.location = "<?echo $loginUrl; ?>";
      window.top.location=oauth_url;
  return false;
  }
</script>
</body>
</html>




