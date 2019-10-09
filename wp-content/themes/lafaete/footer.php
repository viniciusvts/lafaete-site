<!-- Footer-->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">     
    <a href="index.php" class="d-block d-lg-none d-md-none"><img src="<?php bloginfo('template_url');?>/inc/img/logo-lafaete.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavFooter" aria-controls="navbarNavFooter" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavFooter">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="index.php" class="d-none d-sm-block"><img src="<?php bloginfo('template_url');?>/inc/img/logo-lafaete.png"></a>
                        <p>A Lafaete é uma empresa do segmento de locação de equipamentos para construção civil, infraestrutura e mineração, destacando-se no mercado de Contêineres e Tendas Piramidais com design e fabricação própria. Atuante no setor de locação de máquinas pesadas e leves, caçambas, caminhões, geradores, torres de iluminação e veículos leves.</p>
                        <div class="social">
                            <a href="https://www.facebook.com/lafaetelocacao" target="_blank"><img src="<?php bloginfo('template_url')?>/inc/svg/facebook-logo-button.svg" width="30px"></a>
                            <a href="https://www.instagram.com/lafaetelocacao/" target="_blank"><img src="<?php bloginfo('template_url')?>/inc/svg/instagram-logo.svg" width="30px"></a>
                            <a href="https://www.linkedin.com/company/lafaetelocacao/" target="_blank"><img src="<?php bloginfo('template_url')?>/inc/svg/linkedin-button.svg" width="30px"></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h3>Produtos</h3>
                        <ul>
                            <?php
                               $produtos = get_terms( array(
                                    'taxonomy' => 'produtos',
                                    'hide_empty' => true,
                                    'parent' => 0
                                ) );
                                foreach($produtos as $produto):                                    
                            ?>
                            <a href=" <?php bloginfo('url'); ?>/produtos/<?php echo $produto->slug; ?>">
                                <li><?php echo $produto->name; ?></li>
                            </a>
                            <?php
                                endforeach;
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Serviços</h3>
                        <ul>
                            <?php
                               $servicos = new WP_Query(array('post_type'=>'servicos'));
                                while($servicos->have_posts()): $servicos->the_post();                               
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <li><?php the_title(); ?></li>
                            </a>
                            <?php
                                endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Unidades</h3>
                        <ul>
                            <?php
                               $unidades = new WP_Query(array('post_type'=>'unidades'));
                                while($unidades->have_posts()): $unidades->the_post();                               
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <li><?php the_title(); ?></li>
                            </a>
                            <?php
                                endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Atendimento</h3>
                        <ul>
                            <a href="<?php bloginfo('url');?>/atendimento/fale-conosco"><li>Fale Conosco</li></a>
                            <a href="<?php bloginfo('url');?>/atendimento/orcamento"><li>Orçamento</li></a>
                            <a href="<?php bloginfo('url');?>/atendimento/trabalhe-conosco"><li>Trabalhe conosco</li></a>
                            <a href="<?php bloginfo('url');?>/atendimento/abertura-de-chamado"><li>Abertura de chamado</li></a>
                        </ul>
                    </div>
                </div>  
            </div>
            <div class="container rodape">
                <p>Copyright 2019 | Todos os direitos reservados a <span>Lafaete Locações</span></p>
            </div>
        </div>
    </div>
</nav>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php bloginfo('template_url');?>/node_modules/jquery/dist/jquery.js" defer></script>
<script src="<?php bloginfo('template_url');?>/node_modules/popper.js/dist/popper.min.js" defer></script>
<script src="<?php bloginfo('template_url');?>/node_modules/bootstrap/dist/js/bootstrap.min.js" defer></script>
<script src="<?php bloginfo('template_url');?>/js/main.js" defer></script>
<script src="<?php bloginfo('template_url');?>/js/slider.js" defer></script>
<?php wp_footer(); ?>