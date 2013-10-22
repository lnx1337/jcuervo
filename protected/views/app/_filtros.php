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

<div class="js-slides">
<div class="slides_container">

<?
$cantidad_resultados=count($resultado);
$count=1;

for($i=0;$i<$cantidad_resultados;$i++){

if($count==1){ 
        echo   '<div class="slide itemThumbs">';
}


if($count<10){

	
  if($resultado[$i]->Usuario->id_facebook==Yii::app()->session['id_facebook'])
   { 
    echo'<div class="itemThumbnail"><div><a data-fancybox-type="iframe" href="'.Yii::app()->session['protocol'].'apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$resultado[$i]->Comic->id.'" class="js-lightbox">
        '.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$resultado[$i]->Comic->imagen).'</a>
                <div><a href="'.Yii::app()->session['protocol'].'apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$resultado[$i]->Usuario->id_facebook.'">'.CHtml::image('https://graph.facebook.com/'.$resultado[$i]->Usuario->id_facebook.'/picture').'</a></div>
              </div></div>';

    }else{

      echo'<div class="itemThumbnail"><div><a data-fancybox-type="iframe" href="'.Yii::app()->session['protocol'].'apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$resultado[$i]->Comic->id.'"  id="'.$resultado[$i]->Comic->id.'"   class="js-lightbox cdetail">
        '.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$resultado[$i]->Comic->imagen).'</a>
                <div><a href="'.Yii::app()->session['protocol'].'apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$resultado[$i]->Usuario->id_facebook.'">'.CHtml::image('https://graph.facebook.com/'.$resultado[$i]->Usuario->id_facebook.'/picture').'</a></div>
              </div></div>';

    }

             
}
      

      if($count==9){           
      	  echo '</div>';           
          $count=0; 
      } 
               
     $count++;       

}
?>

</div>
<? echo '<a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a>'; ?> 
</div>

