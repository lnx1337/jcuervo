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
     

        <div class="tabs"><a   href="http://168.62.38.168/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>" class="mismemesmenu" >Mis Memes</a> <a  id="misamigos"  class="menu" href="">De mis amigos</a><a id="categoria" class="selectedTab menu" href="">Por categoría</a></div>
        <div class="memeThumbs noSlide">
          <div class="itemMeme"><a href="#" id="catmasvist" class="itemAction subcat selectedTab"><i class="icon-eye-open"></i>Los + Vistos</a></div>
          <div class="itemMeme"><a href="#" id="catmascomp" class="itemAction subcat"><i class="icon-plus-sign"></i>Los + Votados</a></div>
          <div class="itemMeme"><a href="#" id="catmascome" class="itemAction subcat"><i class="icon-share-alt"></i>Los + Comentados</a></div>
          <div class="itemMeme"><a href="#" id="catjoscuer" class="itemAction subcat"><i class="icon-star"></i>Seleccion Especial Jose Cuervo</a></div>
        </div>

           <div class="response">

              <?  $this->renderPartial('//app/_filtros',array('resultado'=>$resultado)); ?>

           </div>
</div>
</section>
