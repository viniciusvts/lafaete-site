<?php
$categorias = isset( $catTax ) ? $catTax : get_the_terms( $post->ID, 'produtos' );
$lastIndexOfCat = count($categorias) - 1;
$hrefLink = isset( $hrefLink ) ? $hrefLink : get_the_permalink();
?>
<!-- inc/card-produto -->
<div class="default-service-column col-md-4 imagemGaleria <?php
                                                                foreach($categorias as $categoria){
                                                                    if(get_queried_object()->term_id !== $categoria->term_id){
                                                                        echo $categoria->slug;
                                                                    }
                                                                }
                                                            ?>">
    <a href="<?php echo($hrefLink); ?>" class="card-text">
        <div class="inner-box">
            <div class="inner-most">
                <figure class="image-box">
                    <?php the_post_thumbnail('medium'); ?>
                </figure>
                <div class="lower-part">
                    <div class="left-curve">                      
                    </div>
                    <div class="right-curve">                      
                    </div>                    
                    <div class="content">
                        <h3><?php the_title(); ?></h3>
                        <!-- <p><?php 
                                foreach($categorias as $key => $categoria){
                                    if(get_queried_object()->term_id !== $categoria->term_id){
                                        echo $categoria->name;
                                        if($key != $lastIndexOfCat){
                                            echo ", ";
                                        }else{
                                            echo ".";
                                        }
                                    }
                                }
                            ?></p>
                        <div class="more-link">
                            <a href="<?php echo($hrefLink); ?>" class="read-more">Clique aqui</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </a>
</div> 