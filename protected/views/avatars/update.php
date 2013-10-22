<div id="container">
    <div id="caraweb"></div>

      <section id="panelPersonaje">
        <div id="memeGeneratorLogo"><span>Memespecial</span><span>Generator</span></div>
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div id="personajeCanvas"></div>

        <div id="camAction">
          <?
        /* <!-- <a data-fancybox-type="iframe" href="<?php echo Yii::app()->session['protocol']; ?>apps.t2omedia.com.mx/php2/jcuervo/index.php/CaraWeb/create/" class="btn js-lightbox">
            <i class="icon-camera"></i> Tómate una Foto
          </a>
        -->
        */?>
        </div>
        
        <div id="actions">
          


<a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i><div>Rotar a la izquierda</div></a>
<a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i><div>Rotar a la derecha</div></a>
<a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i><div>Mandar enfrente</div></a>
<a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i><div>Mandar atrás</div></a>
<a href="#" id="js-resetRotation" class="btn"><i class="icon-refresh"></i><div>Reestablecer</div></a>
<a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i><div>Eliminar</div></a>
<div class="saveBtn"><a href="/php2/jcuervo/index.php" class="btn"><i class="icon-chevron-left"></i> Regresar</a>
<a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar</a></div>
       
        </div>
       </section>
       
      <section id="panelContent">
        <div>
        <div class="js-tabEngine itemSelector">
         <ul class="menuPersonaje">
            <li><a href="#tab1"><span></span>Cabeza</a></li>
            <li><a href="#tab2"><span></span>Cuerpo</a></li>
            <li><a href="#tab3"><span></span>Ojos</a></li>
            <li><a href="#tab4"><span></span>Boca</a></li>
            <li><a href="#tab5"><span></span>Accesorios</a></li>
          </ul>
          <div id="tab1" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['caras']);
                if(is_array($json['catalogos']['caras'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['caras'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/cabezas/".$value['url'],"caras",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab2" class="memeThumbs noSlide">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['cuerpos']);
                if(is_array($json['catalogos']['cuerpos'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['cuerpos'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/cuerpos/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab3" class="memeThumbs noSlide">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['ojos']);
                if(is_array($json['catalogos']['ojos'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['ojos'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme rounded">'.CHtml::image(Yii::app()->request->baseUrl."/images/ojos/".$value['url'],"ojos",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab4" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['bocas']);
                if(is_array($json['catalogos']['bocas'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['bocas'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme rounded">'.CHtml::image(Yii::app()->request->baseUrl."/images/bocas/".$value['url'],"bocas",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab5" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['accesorios']);
                if(is_array($json['catalogos']['accesorios'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['accesorios'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/accesorios/".$value['url'],"accesorios",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
        </div>
      </div>
      </section>
    </div>




    <div id="wrapper">
    <div style="display: none;" id="overlay"></div>
    <div style="display: none;" id="popup">
        <i class="icon-save icon-2x"></i><p>Guardando...</p>
    </div>
    </div>


<?php

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/slides.min.jquery.js'); 

//echo json_encode($json);
//Yii::app()->request->baseUrl
Yii::app()->getClientScript()->registerScript('registrar', '
  var avatar = '.CJSON::encode($json['avatar']).';
  var BaseUrl = "/php2/jcuervo"; 
  var accesorios=[]; var piezas=[];
  var angle, cara,tmp, cara_web, cuerpo, ojos, boca, currentLayer, currentSelected, layerPersonaje, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stagePersonaje, removeImage, scale, startScale, trans,imageLogo;
  caraWebInsert=true; currentSelected = null; scale = 1; scaleUpFactor= 1.05; trans = null;
  var isFirst=true;
  
  stagePersonaje = new Kinetic.Stage({container: "personajeCanvas",width: 250,height: 444});
  layerPersonaje = new Kinetic.Layer();
  stagePersonaje.getContainer().addEventListener("click", function(evt) { 
    if(currentSelected){
      currentSelected.setStroke(null);
      currentSelected.setStrokeWidth(0);
      currentSelected=null;
      layerPersonaje.draw(); 
    }
  });
  var rect = stagePersonaje.getContainer().getBoundingClientRect();
  halfx = stagePersonaje.getWidth() / 2;
  halfy = stagePersonaje.getHeight() / 2;
  scale = 1;
  confCaraWeb = { x: halfx,y: halfy - 170,height: 100,width: 100,draggable: true,offset: [50, 50],startScale: scale,tipo: 2};
  confCara = { x: halfx,y: halfy - 170,height: 120,width: 120,draggable: true,offset: [60, 60],startScale: scale,tipo: 3};
  confCuerpo = {x: halfx,y: halfy + 50,height: 320,width: 200,draggable: true,offset: [100, 160],startScale: scale, tipo: 4};
  confOjos = {x: halfx,y: halfy - 160,height: 22,width: 95,draggable: true,offset: [47, 11],startScale: scale, tipo: 5};
  confBoca = {x: halfx,y: halfy - 140,height: 22,width: 95,draggable: true,offset: [47, 11],startScale: scale, tipo: 6};
  confAccesorio = {x: halfx,y: halfy - 100,height: 160,width: 160,draggable: true,offset: [80, 80],startScale: scale,tipo: 1};

  for(var k=0; k < avatar.avatarPiezas.length; k++){
    if(avatar.avatarPiezas[k].descripcion==="cara"){ 
      insertarPieza("cara",avatar.avatarPiezas[k].AvatarImg,{ x: parseInt(avatar.avatarPiezas[k].posx), y: parseInt(avatar.avatarPiezas[k].posy), rotation: parseFloat(avatar.avatarPiezas[k].rotation), id: avatar.avatarPiezas[k].piezaid, tipo: avatar.avatarPiezas[k].tipo_pieza_id, height: 120,width: 120,draggable: true,offset: [60, 60],startScale: scale });
      caraWebInsert=false;
    }
    if(avatar.avatarPiezas[k].descripcion==="cuerpo")
    { 
      insertarPieza("cuerpo",avatar.avatarPiezas[k].AvatarImg,{ x: parseInt(avatar.avatarPiezas[k].posx), y: parseInt(avatar.avatarPiezas[k].posy), rotation: parseFloat(avatar.avatarPiezas[k].rotation), id: avatar.avatarPiezas[k].piezaid, tipo: avatar.avatarPiezas[k].tipo_pieza_id, height: 320,width: 200,draggable: true,offset: [100, 160],startScale: scale });
    }
    if(avatar.avatarPiezas[k].descripcion=="ojos")
    { 
      insertarPieza("ojos",avatar.avatarPiezas[k].AvatarImg,{ x: parseInt(avatar.avatarPiezas[k].posx), y: parseInt(avatar.avatarPiezas[k].posy), rotation: parseFloat(avatar.avatarPiezas[k].rotation), id: avatar.avatarPiezas[k].piezaid, tipo: avatar.avatarPiezas[k].tipo_pieza_id, height: 22,width: 95,draggable: true,offset: [47, 11],startScale: scale });
    }
    if(avatar.avatarPiezas[k].descripcion=="boca")
    { 
      insertarPieza("boca",avatar.avatarPiezas[k].AvatarImg,{ x: parseInt(avatar.avatarPiezas[k].posx), y: parseInt(avatar.avatarPiezas[k].posy), rotation: parseFloat(avatar.avatarPiezas[k].rotation), id: avatar.avatarPiezas[k].piezaid, tipo: avatar.avatarPiezas[k].tipo_pieza_id, height: 22,width: 95,draggable: true,offset: [47, 11],startScale: scale });
    }
  }
  if(avatar.cara_web.url && caraWebInsert){
    confCaraWeb.id=avatar.cara_web.url;
    tmp="";
    insertarPieza("cara_web",avatar.cara_web.url, { x: parseInt(avatar.cara_web.posx),y: parseInt(avatar.cara_web.posy),height: 100,width: 100,draggable: true,offset: [50, 50],startScale: scale,tipo: 2});
  }
  for(var a in avatar.accesorios){
    insertarAccesorio(avatar.accesorios[a].accesorioImg, { x: parseInt(avatar.accesorios[a].posx), y: parseInt(avatar.accesorios[a].posy), rotation: parseFloat(avatar.accesorios[a].rotation), id: parseInt(avatar.accesorios[a].accesorios_id), tipo: 1,height: 160,width: 160,draggable: true,offset: [80, 80],startScale: scale});
  }
  
  stagePersonaje.add(layerPersonaje);

  $("#tab1 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); confCara.id = pieza[0]; insertarPieza("cara",$(this).find("img").attr("src"),confCara); });
  $("#tab2 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); confCuerpo.id = pieza[0]; insertarPieza("cuerpo",$(this).find("img").attr("src"),confCuerpo); });
  $("#tab5 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); confAccesorio.id = pieza[0]; insertarAccesorio($(this).find("img").attr("src"),confAccesorio); });
  $("#tab4 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); confBoca.id = pieza[0]; insertarPieza("boca",$(this).find("img").attr("src"),confBoca); });
  $("#tab3 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-");  confOjos.id = pieza[0]; insertarPieza("ojos",$(this).find("img").attr("src"),confOjos); });

  function insertarPieza(obj,img,conf) {
    var aux;
    img=img.replace(/^.*\/(?=[^\/]*$)/, "");
    if(obj==="cara"){ aux=obj; obj=cara; if(cara_web) { cara_web.remove(); removeCaraWeb(); } } 
    if(obj==="cara_web"){ aux=obj; obj=cara_web; conf.id=img; if(cara) cara.remove(); } 
    if(obj==="cuerpo"){ aux=obj; obj=cuerpo; }
    if(obj==="ojos"){ aux=obj; obj=ojos; }
    if(obj==="boca"){ aux=obj; obj=boca; }

    if(obj) {
      conf.x=obj.attrs.x;
      conf.y=obj.attrs.y;
      obj.remove();
    }
    var image = new Image();
    conf.image = image;
    image.onload = function(){
      conf.width=this.width;
      conf.height=this.height;
      conf.offset = { x: this.width/2, y:this.height/2 };
      obj = new Kinetic.Image(conf);
      layerPersonaje.add(obj);

      if(aux==="cara"){ cara=obj; cara.moveToBottom(); } 
      if(aux==="cuerpo"){ cuerpo=obj; cuerpo.moveToBottom(); } 
      if(aux==="ojos"){ ojos=obj; } 
      if(aux==="boca"){ boca=obj; } 
      if(aux==="cara_web"){ cara_web=obj; cara_web.moveToBottom(); }
        
      obj.on("mouseover", function() {
        if(!currentSelected){
          this.setStroke("#980d2e");
          this.setStrokeWidth(1);
          return layerPersonaje.draw();
        }
      });

      obj.on("mouseout", function() {
        if(!currentSelected){
          this.setStroke(null);
          this.setStrokeWidth(0);
        }
        return layerPersonaje.draw();
      });

      obj.on("click", function() {
        if(currentSelected){
          currentSelected.setStroke(null);
          currentSelected.setStrokeWidth(0);
        }
        currentSelected = this;
        currentSelected.setStroke("#980d2e");
        currentSelected.setStrokeWidth(1);
        if(currentSelected.attrs.tipo==2 || currentSelected.attrs.tipo==3 || currentSelected.attrs.tipo==4){
          currentSelected.moveToBottom();
        }
        layerPersonaje.draw();
      });
      
      obj.on("dragstart", function() {
        if(currentSelected){
          currentSelected.setStroke(null);
          currentSelected.setStrokeWidth(0);
        }
        currentSelected = this;
        currentSelected.setStroke("#980d2e");
        currentSelected.setStrokeWidth(1);
        layerPersonaje.draw();
        if (trans) {
          trans.stop();
        }
        return this.setAttrs({
          scale: {
            x: this.attrs.startScale * scaleUpFactor,
            y: this.attrs.startScale * scaleUpFactor
          }
        });
      });

      obj.on("dragend", function(e) {
        if(currentSelected.attrs.tipo==2 || currentSelected.attrs.tipo==3 || currentSelected.attrs.tipo==4){
          currentSelected.moveToBottom();
        }
        trans = this.transitionTo({
          duration: 0.5,
          easing: "elastic-ease-out",
          scale: {
            x: this.attrs.startScale,
            y: this.attrs.startScale
          }
        });

        if( (e.clientX-rect.left) < 0 || (e.clientX-rect.left) > stagePersonaje.getWidth() || (e.clientY-rect.top) < 0 || (e.clientY-rect.top) > stagePersonaje.getHeight() )
          removeImage();
        layerPersonaje.draw();
      });
      obj.fire("click");
      layerPersonaje.draw();
    };
    if(aux==="cara"){ image.src=BaseUrl+"/images/cabezas/"+img; } 
    if(aux==="cuerpo"){ image.src=BaseUrl+"/images/cuerpos/"+img; } 
    if(aux==="ojos"){ image.src=BaseUrl+"/images/ojos/"+img; } 
    if(aux==="boca"){ image.src=BaseUrl+"/images/bocas/"+img; } 
    if(aux==="cara_web"){ image.src=BaseUrl+"/AvatarCaras/"+ tmp + img; }
 
    
  };

  function insertarAccesorio(img,conf) {
    var insertar=true;
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == conf.id) insertar=false;
    }
    if(insertar){
      imageAccesorio = new Image();
      conf.image = imageAccesorio;
      imageAccesorio.onload = function(){
        conf.width=this.width;
        conf.height=this.height;
        conf.offset = { x: this.width/2, y:this.height/2 };
        accesorio = new Kinetic.Image(conf);
        
        accesorio.on("mouseover", function() {
          if(!currentSelected){
            this.setStroke("#980d2e");
            this.setStrokeWidth(1);
            return layerPersonaje.draw();
          }
        });

        accesorio.on("mouseout", function() {
          if(!currentSelected){
            this.setStroke(null);
            this.setStrokeWidth(0);
          }
          return layerPersonaje.draw();
        });

        accesorio.on("click", function() {
          if(currentSelected){
            currentSelected.setStroke(null);
            currentSelected.setStrokeWidth(0);
          }
          currentSelected = this;
          currentSelected.setStroke("#980d2e");
          currentSelected.setStrokeWidth(1);
          layerPersonaje.draw();
        });
        
        accesorio.on("dragstart", function() {
          if(currentSelected){
            currentSelected.setStroke(null);
            currentSelected.setStrokeWidth(0);
          }
          currentSelected = this;
          currentSelected.setStroke("#980d2e");
          currentSelected.setStrokeWidth(1);
          layerPersonaje.draw();
          if (trans) {
            trans.stop();
          }
          return this.setAttrs({
            scale: {
              x: this.attrs.startScale * scaleUpFactor,
              y: this.attrs.startScale * scaleUpFactor
            }
          });
        });

        accesorio.on("dragend", function(e) {
          trans = this.transitionTo({
            duration: 0.5,
            easing: "elastic-ease-out",
            scale: {
              x: this.attrs.startScale,
              y: this.attrs.startScale
            }
          });
          if( (e.clientX-rect.left) < 0 || (e.clientX-rect.left) > stagePersonaje.getWidth() || (e.clientY-rect.top) < 0 || (e.clientY-rect.top) > stagePersonaje.getHeight() )
            removeImage();
          layerPersonaje.draw();
        });

        layerPersonaje.add(accesorio);
        accesorios.push(accesorio);
        accesorio.fire("click");

        layerPersonaje.draw();
      }
      img=img.replace(/^.*\/(?=[^\/]*$)/, "");
      imageAccesorio.src=BaseUrl+"/images/accesorios/"+img;

      return true;
    }
    
    return false;
  };

  saveFacebook = function() {
    var layerfondo = new Kinetic.Layer()
    imageFondo = new Image();
    imageFondo.onload = function(){
      imageLogo = new Image();
      var fondo = new Kinetic.Image({ x: 0,y: 0,height: 446,width: 250, image:imageFondo })
      layerfondo.add(fondo);
      layerfondo.draw();
      
      
      imageLogo.onload = function(){
        //y:10
        var logo = new Kinetic.Image({ x: 164,y: 357,height: this.height,width: this.width, image:imageLogo })
        layerPersonaje.add(logo);
        logo.moveToTop();
        layerPersonaje.moveToTop();
        layerPersonaje.draw();

        stagePersonaje.toDataURL({
          mimeType: "image/png",
          quality: 0.8,
          callback: function(dataUrl) {
            var avatarJson = { img: dataUrl };
            $.ajax({
              type: "POST",
              url: BaseUrl+"/index.php/avatars/UpdateImg",
              data: avatarJson,
              success: function(url){
                window.location=url;
                $("#overlay").css("display","none"); 
                $("#popup").css("display","none"); 
              },
              error: function(data) { 
                $("#overlay").css("display","none"); 
                $("#popup").css("display","none"); 
              }
            });
          }
        });
      }
      imageLogo.src=BaseUrl+"/images/backgrounds/logo.jpg"

      
    }
    imageFondo.src=BaseUrl+"/images/backgrounds/fondo_avatar_solo.jpg";
    stagePersonaje.add(layerfondo);
  }

  saveToImage = function() {
    var json = JSON.parse(layerPersonaje.toJSON()); 
    if(currentSelected){ currentSelected.setStroke(null); currentSelected.setStrokeWidth(0); currentSelected=null; layerPersonaje.draw(); }
    $("#overlay").css("display","block"); $("#popup").css("display","block"); $("#popup").fadeIn("slow");
    stagePersonaje.toDataURL({
      mimeType: "image/png",
      quality: 0.8,
      callback: function(dataUrl) {
        var avatarJson = { avatar: json.children, img: dataUrl };

        $.ajax({
          type: "POST",
          url: BaseUrl+"/index.php/avatars/UpdatePieza",
          data: avatarJson,
          success: function(url){
            saveFacebook();
          },
          error: function(data) { 
          }
        });
      }
    });
    
    
    return false;
  };

  angle = 0.34906585;

  newangle = null;

  removeCaraWeb = function(){
    $.ajax({
      type: "POST",
      url: BaseUrl+"index.php/CaraWeb/delete",
      success: function(data){ },
      error: function(data) { 
      }
    });
  }

  removeImage = function(){
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == currentSelected.attrs.id){
        o = accesorios.indexOf(currentSelected)
        delete accesorios[o];
        accesorios.splice(o,o+1);
      }
    }
    if(currentSelected.attrs.tipo == 2){
      removeCaraWeb();
    }
    if(currentSelected.attrs.tipo != 3 && currentSelected.attrs.tipo != 4){
      currentSelected.remove();
      layerPersonaje.draw();
    }
    return false;
  }

  rotateLeft = function() {
    newangle = currentSelected.getRotation() - angle;
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.2,
      easing: "ease-out"
    });
    layerPersonaje.draw();
    return false;
  };

  rotateRight = function() {
    newangle = currentSelected.getRotation() + angle;
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.2,
      easing: "ease-out"
    });
    layerPersonaje.draw();
    return false;
  };

  sendFront = function() {
    currentSelected.moveUp();
    layerPersonaje.draw();
    return false;
  };

  sendBack = function() {
    currentSelected.moveDown();
    layerPersonaje.draw();
    return false;
  };

  resetRotation = function() {
    currentSelected.transitionTo({
      rotation: 0,
      duration: 0.3
    });
    layerPersonaje.draw();
    return false;
  };

  $("#js-listenerStat").on("click", saveToImage); 
  $("#js-rotateLeft").on("click", rotateLeft);
  $("#js-rotateRight").on("click", rotateRight);
  $("#js-sendFront").on("click", sendFront);
  $("#js-removeElement").on("click", removeImage);
  $("#js-resetRotation").on("click", resetRotation);
  $("#js-sendBack").on("click", sendBack);

  $(document).ready(function() {
    $(".js-tabEngine").easytabs({animate:!0,animationSpeed:150,tabActiveClass:"selected",updateHash:!1});
    $(".js-slides").slides({preload:!1,slideSpeed:450,generatePagination:!1,generateNextPrev:!1});
  });
  
',CClientScript::POS_END);

?>