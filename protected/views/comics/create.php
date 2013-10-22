<div id="container" class="logoComic">

  <section id="panelTitulo">
    <div id="memeGeneratorLogo"><span>Memeespecial</span><span>Generator</span></div>
    <h1 class="tituloCrear">Crea Tu Meme</h1>
  </section>

  <section id="panelComic">
    <div id="insertText">
      <a href="#" id="js-createText" class="btn"><i class="icon-font"></i><div>Agregar texto</div></a>
      <input type="text" id="textinput" class="inputClose"><a href="#" class="btn globo" data="1"><span class="globo1"></span>
        <div class="tooltipGlobo globo-normal"></div></a><a href="#" class="btn globo" data="2"><span class="globo2"></span>
        <div class="tooltipGlobo globo-exclamacion"></div></a><a href="#" class="btn globo" data="3"><span class="globo3"></span>
        <div class="tooltipGlobo globo-pensamiento"></div></a>
    </div>

    <div id="comicCanvas"></div>

    <div id="actions">
      <a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i><div>Rotar a la izquierda</div></a>
      <a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i><div>Rotar a la derecha</div></a>
      <a href="#" id="js-resizeDown" class="btn"><i class="icon-resize-small"></i><div>Reducir tamaño</div></a>
      <a href="#" id="js-resizeUp" class="btn"><i class="icon-resize-full"></i><div>Aumentar tamaño</div></a>
      <a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i><div>Mandar enfrente</div></a>
      <a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i><div>Mandar atrás</div></a>
      <a href="#" id="js-resetRotation" class="btn"><i class="icon-refresh"></i><div>Reestablecer</div></a>
      <a href="#" id="js-mirror" class="btn"><i class="icon-reply"></i><div>Espejo</div></a>
      <a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i><div>Eliminar</div></a>
      <div class="saveBtn"><a href="<?php echo CController::CreateUrl('App/profile',array('id'=>Yii::app()->session['id_facebook'])); ?>" class="btn"><i class="icon-chevron-left"></i> Regresar</a><a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar </a></div>
    </div>
  </section>


  <section id="panelContentComic">
    <div class="js-tabEngine itemSelector">
      <ul class="comicItemSelector">
        <li><a href="#tab1">Fondos</a></li>
        <li><a href="#tab2">Objetos</a></li>
        <li><a href="#tab3">Amigos</a></li>
      </ul>
      <div id="tab1" class="comicThumbs">
       <? 
        $bandera=false;
        $count=count($fondos);
          if(is_array($fondos)){
            if($count>6) echo '<div class="js-slides-comic"><div class="slides_container">';
            foreach ($fondos as $key => $value) {  
              if($key%6==0 && $count>6) {
                if($bandera) echo '</div>'; else $bandera=true;
                echo '<div class="slide">';
              }
              echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/backgrounds/".$value['url'],"backgrounds",array('id'=>$value['id_background'])).'</div>'; 
            }
            if($count>6) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
          }
      ?>
      </div>
      <div id="tab2" class="comicThumbs">
        <? 
          $bandera=false;
          $count=count($objetos);
            if(is_array($objetos)){
              if($count>6) echo '<div class="js-slides-comic"><div class="slides_container">';
              foreach ($objetos as $key => $value) {  
                if($key%6==0 && $count>6) {
                  if($bandera) echo '</div>'; else $bandera=true;
                  echo '<div class="slide">';
                }
                echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/objetos/".$value['url'],"objetos",array('id'=>$value['id'])).'</div>'; 
              }
              if($count>6) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
            }
        ?>
      </div>
      <div id="tab3" class="comicThumbs" data="<? print_r(count($amigos_avatars)); ?>">
        <? 
          $bandera=false; $b=false;
          $count=count($amigos_avatars);
          $id_miavatar = uniqid();
            if(is_array($amigos_avatars)){
              if($count>5) echo '<div class="js-slides-comic"><div class="slides_container">';
              
              foreach ($amigos_avatars as $key => $value) {  
                if($key%5==0 && $count>5) {
                  if($bandera) { echo '</div>'; $b=true; }else $bandera=true;
                  echo '<div class="slide itemThumbs">';
                  if(!$b) echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/Avatar/".$avatar['avatar_img'],"amigos_avatars",array('id'=>$id_miavatar)).'<div></div></div>'; 
                }
                echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/Avatar/".$value['avatar_img'],"amigos_avatars",array('id'=>$value['usuario_id'])).'<div><a href="#">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a></div></div>'; 
              }

              if($count>5) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';
            }
        ?>
      </div>
    </div>
  </section>

  
</div>
<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/slides.min.jquery.js'); 
?>


<div id="wrapper">
<div style="display: none;" id="overlay"></div>
<div style="display: none;" id="popup">
    <i class="icon-save icon-2x"></i><p>Guardando...</p>
</div>
</div>


<script>
 $(function() {
    return $('.js-slides-comic').slides({
      preload: false,
      slideSpeed: 450,
      generatePagination: false,
      generateNextPrev: false
    });
  });
</script> 

<?php //echo $this->renderPartial("_form', array('model'=>$model)); 

Yii::app()->getClientScript()->registerScript('registrar', '
  var url_miavatar = "'.$avatar['avatar_img'].'";
  var BaseUrl = "/php2/jcuervo";
  var angle,rotation,imageBackground,conf,halfx,halfy, currentSelected, layerComic, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stageComic,removeImage;
  currentSelected = null;
  currentText = null;
  var amigos=[];
  var scaleUpFactor= 1.05, scaleDownFactor=0.95;
  var trans = null;
  stageComic = new Kinetic.Stage({
    container: "comicCanvas",
    width: 510,
    height: 383,
  });
  var rect = stageComic.getContainer().getBoundingClientRect();
  stageComic.getContainer().addEventListener("click", function(evt) { 
    if(currentSelected){
      currentSelected.setStroke(null);
      currentSelected.setStrokeWidth(0);
      currentSelected=null;
      layerComic.draw(); 
    }
    if(currentText){
      currentText.setStroke(null);
      currentText.setStrokeWidth(0);
      currentText=null;
      layerComic.draw(); 
    }
    $("#textinput").attr("class", "inputClose");
  });
  var stageWidth = stageComic.getWidth();
  var stageHeight = stageComic.getHeight();
  halfx = stageComic.getWidth() / 2;
  halfy = stageComic.getHeight() / 2;

  dragfun = function(pos) { 
    X=pos.x; Y=pos.y; 
    dy = ((stageHeight-53)-((this.attrs.height*Math.abs(this.getScale().x))/2)); 
    dy2 = ((this.attrs.height*Math.abs(this.getScale().x))/2)+12; 
    dx = ((this.attrs.width*Math.abs(this.getScale().x))/2)+12; 
    dx2 = ((stageWidth-12)-((this.attrs.width*Math.abs(this.getScale().x))/2)); 
    if(X<dx){X=dx} if(X>dx2){X=dx2;} 
    if(Y<dy2){Y=dy2;} 
    if(Y>dy){Y=dy;} 
    return({x:X, y:Y}); 
  };

  confAvatar = { x: halfx,y: halfy,height: 230,width: 128,draggable: true,offset: [64, 115],startScale: [1,1],name: "amigo",tipo: "amigo", mirror:1};
  confObjeto = {x: halfx,y: halfy,height: 100,width: 100,draggable: true,offset: [50, 50],startScale: [1,1],name: "objeto",tipo: "objeto", mirror:1, id:2};
  confBackground = {x: 190,y: 139,rotation: 0,height: 383,width: 510,image: imageBackground,offset: [190, 140],startScale: [1,1],name: "fondo",id: 1};
  confMiAvatar = { x: halfx,y: halfy,height: 230,width: 128,draggable: true,offset: [64,115],startScale: [1,1],name: "MiAvatar",tipo: "amigo", mirror:1, id:"'.$id_miavatar.'"};
  layerFondo = new Kinetic.Layer();
  layerComic = new Kinetic.Layer();
  stageComic.add(layerFondo);
  stageComic.add(layerComic);
  var background = new Kinetic.Rect({
    x: 0,
    y: 0,
    width: 510,
    height: 383,
    stroke: "#980d2e",
    strokeWidth: 20,
  });
  layerComic.add(background);
  layerComic.draw();
  
  imageBackground = new Image();
  confBackground.image = imageBackground;
  imageBackground.onload = function(){
    fondo = new Kinetic.Image(confBackground);
    layerFondo.add(fondo);
    layerFondo.draw();
    layerComic.moveToTop();
  }
  imageBackground.src=BaseUrl+"/images/backgrounds/default.jpg";
  
  
  imageMarco = new Image();
  imageMarco.onload = function(){
    marco = new Kinetic.Image({x: 188,y: 462,rotation: 0,height: 60,width: 510,image: imageMarco,offset: [190, 140],startScale: [1,1],name: "marco",id: 1});
    layerComic.add(marco);
    marco.moveToBottom();
    layerComic.draw();
  };
  imageMarco.src = BaseUrl+"/images/backgrounds/footer.jpg";
  
  layerComic.getContext().globalCompositeOperation = "destination-over";
  $("#tab1 .itemMeme").on("click", function(e){ $("#textinput").attr("class", "inputClose"); var id = $(this).find("img").attr("id"); insertarFondo($(this).find("img").attr("src")); });
  $("#tab2 .itemMeme").on("click", function(e){ $("#textinput").attr("class", "inputClose"); insertar("objeto",$(this).find("img").attr("src"),confObjeto); });
  $("#tab3 .itemMeme").on("click", function(e){ $("#textinput").attr("class", "inputClose"); confAvatar.id = $(this).find("img").attr("id"); insertar("amigo",$(this).find("img").attr("src"),confAvatar); });

  document.onclick=function(){
    $("#textinput").attr("class", "inputClose");
  }

  saveToImage = function() {
    if(currentSelected){
      currentSelected.setStroke(null);
      currentSelected.setStrokeWidth(0);
    }
    if(currentText){
      currentText.setStroke(null);
      currentText.setStrokeWidth(0);
    }
    layerComic.draw();
    $("#overlay").css("display","block"); 
    $("#popup").css("display","block"); 
    $("#popup").fadeIn("slow");
    stageComic.toDataURL({
      mimeType: "image/png",
      callback: function(dataUrl) {
        var data = { img: dataUrl };
        $.ajax({
         type: "POST",
          url: BaseUrl+"/index.php/comics/create",
          data:data,
          success:function(url){
            window.location=url;
          },
          error: function(data) { 
            $("#overlay").css("display","none"); 
            $("#popup").css("display","none"); 
          },
        });
      }
    });    
  };

  angle = 0.174532925;
  newangle = null;

  removeImage = function(){
    if(currentSelected) { 
      if(currentSelected.attrs.tipo === "amigo"){
        for(i=0;i<amigos.length;i++){
          if(amigos[i].attrs.id == currentSelected.attrs.id){
            o = amigos.indexOf(currentSelected)
            delete amigos[o];
            amigos.splice(o,o+1);
          }
        }
      }
      currentSelected.remove();
    }
    if(currentText) currentText.remove();
    $("#textinput").attr("class", "inputClose");
    layerComic.draw();
    return false;
  }

  rotateLeft = function() {
    newangle = currentSelected.getRotation() - angle;
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.2,
      easing: "ease-out",
      callback: function() {
      }
    });
    layerComic.draw();
    return false;
  };

  rotateRight = function() {
    newangle = currentSelected.getRotation() + angle;
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.2,
      easing: "ease-out",
      callback: function() {
      }
    });
    layerComic.draw();
    return false;
  };

  sendFront = function() {
    currentSelected.moveToTop();
    layerComic.draw();
    return false;
  };

  sendBack = function() {
    this.setZIndex(stage.getChildren().length - 1);
    layerComic.draw();
    return false;
  };

  function insertarFondo(img) {
    img=img.replace(/^.*\/(?=[^\/]*$)/, "");
    imageBackground.src=BaseUrl+"/images/backgrounds/"+img;
    layerComic.moveToTop();
    layerFondo.draw();
  };

  function insertar(obj,img,conf) {
    var aux, insertar=true,url_img;
    aux=obj;
    if(typeof conf.id==="undefined") { insertar=false; } 
    if(obj==="amigo"){ 
      for(i=0;i<amigos.length;i++){
        if(amigos[i].attrs.id == conf.id) insertar=false;
      }
    }
    if(insertar){
      imageObj = new Image();
      conf.image = imageObj;
      imageObj.onload = function(){ 
        if(obj==="objeto" || obj==="globo"){
          conf.width=this.width;
          conf.height=this.height;
          conf.offset = { x: this.width/2, y:this.height/2 };
        }
        obj = new Kinetic.Image(conf);
        
        obj.on("mouseover", function() {
          if(!currentSelected && !currentText){
            this.setStroke("#980d2e");
            this.setStrokeWidth(1);
            return layerComic.draw();
          }
        });

        obj.on("mouseout", function() {
          if(!currentSelected && !currentText){
            this.setStroke(null);
            this.setStrokeWidth(0);
          }
          return layerComic.draw();
        });

        obj.on("click", function() {
          $("#textinput").attr("class", "inputClose");
          if(currentSelected){
            currentSelected.setStroke(null);
            currentSelected.setStrokeWidth(0);
          }
          if(currentText){
            currentText.setStroke(null);
            currentText.setStrokeWidth(0);
          }
          currentSelected = this;
          currentText = null;
          currentSelected.setStroke("#980d2e");
          currentSelected.setStrokeWidth(1);
          if(this.attrs.tipo==="globo"){
            this.setZIndex(2);
          }
          layerComic.draw();
        });
        
        obj.on("dragstart", function() {
          $("#textinput").attr("class", "inputClose");
          if(currentSelected){
            currentSelected.setStroke(null);
            currentSelected.setStrokeWidth(0);
          }
          currentSelected = this;
          currentText = null;
          currentSelected.setStroke("#980d2e");
          currentSelected.setStrokeWidth(1);
          layerComic.draw();
          if (trans) {
            trans.stop();
          }
          this.attrs.startScale.x = this.attrs.scale.x;
          this.attrs.startScale.y = this.attrs.scale.y;
          return this.setAttrs({
            scale: {
              x: this.attrs.scale.x * scaleUpFactor,
              y: this.attrs.scale.y * scaleUpFactor
            }
          });
        });

        obj.on("dragend", function(e) {
          
          trans = this.transitionTo({
            duration: 0.5,
            easing: "elastic-ease-out",
            scale: {
              x: this.attrs.startScale.x,
              y: this.attrs.startScale.y
            }
          });
          if(this.attrs.tipo==="globo"){
            this.setZIndex(2);
          }
          if( (e.clientX-rect.left) < 0 || (e.clientX-rect.left) > stageComic.getWidth() || (e.clientY-rect.top) < 0 || (e.clientY-rect.top) > stageComic.getHeight() )
            removeImage();
        });
        layerComic.add(obj);
        if(aux==="amigo"){ 
          amigos.push(obj);
        }
        layerComic.draw();
      }
      img=img.replace(/^.*\/(?=[^\/]*$)/, "");
      if(aux==="objeto" || aux==="globo"){ 
        url_img="/images/objetos/";
      }
      if(aux==="amigo"){ 
        url_img="/Avatar/";
      }
      imageObj.src=BaseUrl+url_img+img;

      return true;
    }
    
    return false;
  };

    initialText = "INSERTA TEXTO";

  createText = function() {
    var texto = new Kinetic.Text({
      x: 20,
      y: 20,
      text: initialText,
      fontSize: 18,
      fontFamily: "aldosemibold",
      fill: "#000000",
      draggable: true
    });

    layerComic.add(texto);

    $("#textinput").attr("class", "inputOpen");
    $("#textinput").focus();
    $("#textinput").val(initialText);
    $("#textinput").select();
    currentText = texto;

    if(currentSelected){  
      currentSelected.setStroke(null);
      currentSelected.setStrokeWidth(0);
      currentSelected = null;
    }
    layerComic.draw();

    texto.on("mouseover", function() {
      if(!currentSelected && !currentText){
        this.setStroke("#980d2e");
        this.setStrokeWidth(1);
        return layerComic.draw();
      }
    });

    texto.on("mouseout", function() {
      if(!currentSelected && !currentText){
        this.setStroke(null);
        this.setStrokeWidth(0);
        return layerComic.draw();
      }
    });

    texto.on("click", function() {
      $("#textinput").attr("class", "inputOpen");
      $("#textinput").focus();
      if(currentSelected){  
        currentSelected.setStroke(null);
        currentSelected.setStrokeWidth(0);
        currentSelected = null;
      }

      if(currentText){
        currentText.setStroke(null);
        currentText.setStrokeWidth(0);
        currentText = null;
      }

      this.setStroke("#980d2e");
      this.setStrokeWidth(1);
      currentText = this;
      layerComic.draw();
      return $("#textinput").val(this.getText());
    });

    texto.on("dragend", function(e) {
      currentText = this;
      if( (e.clientX-rect.left) < 0 || (e.clientX-rect.left) > stageComic.getWidth() || (e.clientY-rect.top) < 0 || (e.clientY-rect.top) > stageComic.getHeight() )
        removeImage();
    });

    return false;
  };

  insertText = function() {
    currentText.setText($("#textinput").val());
    $("#textinput").val("");
    $("#textinput").attr("class", "inputClose");
    layerComic.draw();
    return false;
  };
  
  resetRotation = function() {
    currentSelected.transitionTo({
      rotation: 0,
      duration: 0.3,
      easing: "elastic-ease-out",
      scale: {
        x: 1,
        y: 1
      }
    });
    return false;
  };

  resizeDown = function(){
    if(currentSelected){
      trans = currentSelected.transitionTo({
        duration: 0.5,
        easing: "elastic-ease-out",
        scale: {
          x: currentSelected.attrs.scale.x * scaleDownFactor,
          y: currentSelected.attrs.scale.y * scaleDownFactor
        }
      });
      
    }
    if(currentText){
      trans = currentText.transitionTo({
        duration: 0.5,
        easing: "elastic-ease-out",
        scale: {
          x: currentText.attrs.scale.x * scaleDownFactor,
          y: currentText.attrs.scale.y * scaleDownFactor
        }
      });
    }
    return false;
  }

  resizeUp = function(){
    if(currentSelected){
      trans = currentSelected.transitionTo({
        duration: 0.5,
        easing: "elastic-ease-out",
        scale: {
          x: currentSelected.attrs.scale.x * scaleUpFactor,
          y: currentSelected.attrs.scale.y * scaleUpFactor
        }
      });
    }
    if(currentText){
      trans = currentText.transitionTo({
        duration: 0.5,
        easing: "elastic-ease-out",
        scale: {
          x: currentText.attrs.scale.x * scaleUpFactor,
          y: currentText.attrs.scale.y * scaleUpFactor
        }
      });
    }
    return false;
  }

  mirror = function(){
    trans = currentSelected.transitionTo({
      duration: 0.5,
      easing: "elastic-ease-out",
      scale: {
        x: -1*currentSelected.attrs.scale.x,
        y: currentSelected.attrs.scale.y
      }
    });
    layerComic.draw();
    return false;
  }

  insertGlobo = function(){
    $("#textinput").attr("class", "inputClose");
    tipo = $(this).attr("data");
    var conf=confObjeto;
    conf.tipo="globo";
    if(tipo==="1"){
      insertar("globo","globo_normal.jpg",conf);
    }
    if(tipo==="2"){
      insertar("globo","globo_exclamacion.jpg",conf);
    }
    if(tipo==="3"){
      insertar("globo","globo_pensamiento.jpg",conf);
    }
    return false;
  }

  $(".btn").on("click",function(){ $("#textinput").attr("class", "inputClose"); });
  $("#js-listenerStat").on("click", saveToImage);
  $("#js-rotateLeft").on("click", rotateLeft);
  $("#js-rotateRight").on("click", rotateRight);
  $("#js-sendFront").on("click", sendFront);
  $("#js-removeElement").on("click", removeImage);
  $("#js-sendBack").on("click", sendBack);
  $("#js-resetRotation").on("click", resetRotation);
  $("#js-insertText").on("click", insertText);
  $("#js-createText").on("click", createText);
  $("#js-resizeDown").on("click", resizeDown);
  $("#js-resizeUp").on("click", resizeUp);
  $("#js-mirror").on("click", mirror);
  $(".globo").on("click", insertGlobo);
  $("#textinput").keyup(function(e){
    this.value = this.value.toUpperCase();
    currentText.setText(this.value);
    layerComic.draw();
    return false;
  });
 
 insertar("amigo",url_miavatar,confMiAvatar);

    
',CClientScript::POS_END);

?>