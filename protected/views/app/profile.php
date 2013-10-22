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
<script>
 $(function() {
    return $('.js-slides, .js-slides-comic').slides({
      preload: false,
      slideSpeed: 450,
      generatePagination: false,
      generateNextPrev: false
    });
  });
</script> 
<div id="container">

<section id="panelPersonaje">
        <div id="memeGeneratorLogo"><span>Memespecial</span><span>Generator</span></div>
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div><? echo "<img src='https://168.62.38.168/jcuervo/Avatar/".$json['usuario']['avatar_img']."' />"; ?></div>
        <? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
        <div id="actions"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/avatars/update/<?echo Yii::app()->session['usuario_id']; ?>" class="btn"><i class="icon-edit"></i> Editar</a></div>
        <? }?>
</section>

<section id="panelContent">
<div>     
 <a href="<?php echo CController::CreateUrl('Comics/create'); ?>">Crea un meme nuevo</a>
         
<div class="tabs">
  <? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
  <a  href="<? echo Yii::app()->session['protocol']; ?>168.62.38.168/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>"  class="mismemesmenu selectedTab">Mis Memes</a>
      <? } else {?>
  <a  href="<? echo Yii::app()->session['protocol']; ?>168.62.38.168/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>" class="mismemesmenu">Mis Memes</a>
  <? } ?>
  <a  id="misamigos"  class="menu" href="#">De mis amigos</a><a id="categoria" class="menu" href="#">Por categoría</a></div>
<? if(Yii::app()->session['id_facebook']!=$json['usuario']['id_facebook']){ ?>
              <h2>Memes de <? echo $json['usuario']['nombre'] ?></h2>
     <? }?>


<div class="js-slides">
    <div class="slides_container">        
       
  <?
              $count=1;
           if(count($comics)!=0){
             foreach ($comics as $key => $value) {    
               ?>    
                  <? if($count==1){ ?>
                    <div class="slide itemThumbs">
                  <?  }  ?>
                  
                  <? 
                 echo '<div class="itemThumbnail"><div><a data-fancybox-type="iframe" href="'.Yii::app()->session['protocol'].'168.62.38.168/jcuervo/index.php/App/detalle/'.$value["id"].'" class="js-lightbox">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a></div></div>';        
                  ?>
                <? if($count==9){  ?>
                  </div>
                 <? $count=0; }  ?>
                <?
                  $count++;       
              }
            } else{
?>

              <article id="noMemes">
                <h3>:(</h3>
                <p>Aún no creas ningún meme</p><a href="<?php echo CController::CreateUrl('Comics/create'); ?>" class="btn"><i class="icon-plus"></i> Crea un meme nuevo</a>
              </article>
              

<?
            }    
          ?>




      </div>
</div>
    <?  if(count($comics)!=0){ echo '<a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a>'; } ?> 
</div>
</section>
</div>
