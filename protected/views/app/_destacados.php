<h2>Destacados</h2>
        <div class="tabs"><a id="mismemes" href="#" class="mismemesmenu" >Mis Memes</a><a  id="misamigos"  class="menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
         <div class="memeThumbs"> 
         <? 
            $cantidad_resultados=count($resultado);


            for($i=0;$i<$cantidad_resultados;$i++){
            if($value['idFb']==Yii::app()->session['id_facebook']){
                 echo '<div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["idFb"].'"  class="js-lightbox ">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$value['idFb'].'">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a></div>
                 </div>';
             }else{
                echo '<div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["idFb"].'"  class="js-lightbox cdetail">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$value['idFb'].'">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a></div>
                 </div>';
             }
            }  
        ?>
         </div>