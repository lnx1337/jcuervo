
(function() {

function getInternetExplorerVersion()
// Returns the version of Internet Explorer or a -1
// (indicating the use of another browser).
{
  var rv = -1; // Return value assumes failure.
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}

function checkVersion()
{
  var ver = getInternetExplorerVersion();

  if ( ver > -1 )
  {
    if ( ver >= 8.0 ) {
      msg = "Necesitas actualizar tu explorador";
      alert( msg );
      }

    else{
      msg = "You should upgrade your copy of Internet Explorer.";
      }
  }
}


checkVersion();

 $(document).bind('selectstart dragstart', function(evt)
  { evt.preventDefault(); return false; });
    
//navigation menu
  $(".menu").live("click",function(){
      var url=$(this).attr("id");
      
      $.ajax({
          type: "GET",
          url: window.protocol+"168.62.38.168/jcuervo/index.php/App/"+url,
          success: function(data){
            $("#container").html(data);
          }
        });
      return false;
  });


  $('.mismemesmenu').live("click",function(){   
   $.ajax({
          type: "GET",
          url: window.protocol+"168.62.38.168/jcuervo/index.php/App/mismemes",
          success: function(data){
            $("#container").html(data);
          }
        });
   
      return false;
    
  });

  //submenu categorias
  $(".subcat").live("click",function(){
      var url=$(this).attr("id");
      $.ajax({
            type: "GET",
            url: window.protocol+"168.62.38.168/jcuervo/index.php/App/"+url,
            success: function(data){
               $(".subcat").removeClass('selectedTab');
               $(".response").html(data);
               $("#"+url).addClass('itemAction subcat selectedTab'); 
            }
          });
        return false;
  });

  $(".cdetail").live('click',function(){
     var comicid=$(this).attr('id');
        $.ajax({
            type: "POST",
            data:"UsuariosHasTblComics[tbl_comics_id]="+comicid,
            url: window.protocol+"168.62.38.168/jcuervo/index.php/UsuariosHasTblComics/UpdateViews",
            success: function(data){
            
            }
          });
  });


  $(".com").live('click',function(){
         
         var comicid= $(this).attr('id');  
         var comentario= $("#com").val();
            
        if(comentario.length != 0 && comentario != false){
          $.ajax({
            type: "POST",
            data:"UsuariosComicsComentarios[tbl_comics_id]="+comicid+"&UsuariosComicsComentarios[comment]="+comentario,
            url: window.protocol+"168.62.38.168/jcuervo/index.php/UsuariosComicsComentarios/create",
            success: function(data){
               $("#comics").html(data);
               $('#com').val('');
            
            }
          });
        }

  });

  $(".delc").live('click',function(){
    if (confirm('Realmete deseas eliminar este Meme')) {
          
          var comicid=$(this).attr('id');
          $.ajax({
            type: "POST",
            url: window.protocol+"168.62.38.168/jcuervo/index.php/Comics/delete/"+comicid,
            success: function(data){
               $("#panelContent",window.parent.document).html(data);
               parent.$.fancybox.close();
            }
          });

     }

  });

  $(".delcom").live('click',function(){
    if (confirm('Realmete deseas eliminar este comentario')) {
          var comenid=$(this).attr('id');
          $.ajax({
            type: "POST",
            url: window.protocol+"168.62.38.168/jcuervo/index.php/UsuariosComicsComentarios/delete/"+comenid,
            success: function(data){
                 $('#comentario'+comenid).remove();
            }
         });
     }

  });

$(".share").live('click',function(){
    var comicid= $(this).attr('id');
    var img = $("#pic").find("img").attr("src");
    $.ajax({
      type: "POST",
      data:"id="+comicid,
      url: window.protocol+"168.62.38.168/jcuervo/index.php/comics/share/"+comicid,
      success: function(data){
        $('#NoCompartido').html(data);
      }
    });
    var obj = {
      method: 'feed',
      redirect_uri: window.protocol+"168.62.38.168/jcuervo/index.php",
      link: window.protocol+"168.62.38.168/jcuervo/index.php",
      picture: window.protocol+"apps.t2omedia.com.mx/"+img,
      name: 'Especial Meme Generator',
      caption: 'Crea tu meme',
      description: 'Me gusta este Meme, puedes verlo aquí'
    };

    function callback(response) {
      //document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
      
    }

    FB.ui(obj, callback);
});

}).call(this);




 $('#cropbox').live('click',function(){
        $(this).Jcrop({
        aspectRatio: 1,
         onSelect: updateCoords
        });
    });
  var x,y,w,h;
  
  function updateCoords(c)
  {
     x=c.x;
     y=c.y;
     w=c.w;
     h=c.h;
    return false;
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

$('#spic').live('click',function(){
  if(parseInt(w)){
      $.ajax({
            type: "POST",
            data:"x="+parseInt(x)+"&y="+parseInt(y)+"&w="+parseInt(w)+"&h="+parseInt(h),
            url: window.protocol+"168.62.38.168/jcuervo/index.php/CaraWeb/Edit",
            success: function(data){
              parent.tmp="/tmp/";
              parent.insertarPieza('cara_web',data,parent.confCaraWeb);
              parent.$.fancybox.close();
            }
          });
      }
  });


 $(".js-tabEngine").easytabs({
      animate: true,
      animationSpeed: 150,
      tabActiveClass: 'selected',
      updateHash: false
    });
 
  $(".js-lightbox").fancybox({
    padding: 0,
    margin: 0,
    closeBtn: false,
    fitToView: false,
    autoSize: false,
    closeClick: false,
    openEffect: "none",
    closeEffect: "none",
    scrolling: 'no',
    width: 790
  });


  
window.fbAsyncInit = function() {
	FB.init({ appId:'342733185828640',cookie:true,status:true,xfbml:true});
};
(function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/es_LA/all" + (debug ? "/debug" : "") + ".js";
     ref.parentNode.insertBefore(js, ref);
}(document, /*debug*/ false));

  function FacebookInviteFriends()
  { 
      FB.ui({method: 'apprequests', message: 'Te invito a hacer tus Memes en el Especial Meme Generator'});
      return false;
  }







