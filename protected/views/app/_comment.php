<? 
           if(is_array($json['comic']['comic']['comments'])){
                foreach ($json['comic']['comic']['comments'] as $key => $value) {
        ?>        
         <article id="comentario<? echo $value['id']; ?>">
          <h3><?echo $value['nombre']; ?></h3>
          <p><? echo $value['comment'] ?></p>
          <? if($value['delete']){ ?>
             <a href="#" class="btn delcom" id="<? echo $value['id']; ?>"><i class="icon-trash"></i></a>
          <? } ?>
        </article>
              <?        
                }
              }
?>