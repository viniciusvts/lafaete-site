<section class="depoimentos">
  <div class="container my-container">
    <div class="cabecalho">
      <h2>O que falam da Lafaete</h2>
      <span></span> 
      <p>Lorem ipsum dolor sit amet, sed platonem erroribus ut. Vix homero partem ut, quem doming philosophia eam no. Vis perpetua partiendo an, vim te natum intellegam. Viderer commune gloriatur mel ea, no decore corrumpit mel. Ex fastidii disputationi mel.</p>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="blogCarousel" class="carousel slide" data-ride="carousel">
          <!-- Carousel items -->
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <div class="row">
                    <?php
                      $material = new WP_Query( array(
                          'post_type' => 'depoimentos',
                          'posts_per_page' => 3
                      )); 

                      if( $material->have_posts() ):
                        while( $material->have_posts() ) : $material->the_post();                         
                    ?>
                    <div class="col-md-4 balao-col">
                      <div class="balao">
                        <svg class="iconeHover" enable-background="new 0 0 577.667 577.667" version="1.1" viewBox="0 0 577.667 577.667" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                          <path d="m577.12 138.94c1.224 4.488 0.408 8.772-2.448 12.852-2.854 4.08-6.732 6.528-11.628 7.344-69.768 9.792-105.06 42.432-105.88 97.92h63.036c4.487 0 8.364 1.632 11.628 4.896s4.896 7.14 4.896 11.628v236.23c0 4.896-1.632 8.979-4.896 12.24-3.264 3.266-7.141 4.896-11.628 4.896h-197.68c-4.488 0-8.469-1.633-11.937-4.896s-5.202-7.344-5.202-12.24v-204.4c0-80.784 19.788-142.4 59.364-184.82 39.576-42.432 99.146-65.688 178.7-69.768 4.08-0.408 7.752 0.612 11.016 3.06 3.267 2.448 5.307 5.712 6.12 9.792l16.527 75.275zm-305.39 0c1.224 4.488 0.408 8.772-2.448 12.852-3.264 4.488-7.14 6.936-11.628 7.344-69.768 9.792-105.06 42.432-105.88 97.92h63.036c4.488 0 8.364 1.632 11.628 4.896s4.896 7.14 4.896 11.628v236.23c0 4.896-1.632 8.979-4.896 12.24-3.264 3.266-7.14 4.896-11.628 4.896h-197.68c-4.488 0-8.466-1.633-11.934-4.896-3.468-3.264-5.202-7.344-5.202-12.24v-204.4c0-80.784 19.788-142.4 59.364-184.82 39.576-42.432 99.144-65.688 178.7-69.768 4.08-0.408 7.752 0.612 11.016 3.06s5.304 5.712 6.12 9.792l16.524 75.275z"/>
                        </svg>

                        <p><?php the_field('descricao'); ?></p>
                      </div>
                      <div class="avatar">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'd-block w-100 img-fluid rounded-circle')); ?> 
                      </div>
                      <p class="nome"><?php the_title(); ?></p>
                      <p class="empresa"><?php the_field('empresa'); ?></p>
                    </div>
                    <?php                            
                        endwhile;
                      endif;
                    ?>
                  </div>
                  <!--.row-->
              </div>
              <!--.item-->
          </div>
          <!--.carousel-inner-->
        </div>
        <!--.Carousel-->          
      </div>   
    </div>
  </div>
</section>