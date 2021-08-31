<!-- Footer-->
<footer>
        <div class="footer" style="background-image:url(<?php echo $imgs; ?>footer.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a href="index.php" class="d-none d-sm-block">
                            <!-- <img src="<?php echo( get_theme_mod( 'dnaTheme_setting_logo') ); ?>" width="200px"> -->
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/img/update/logo-fff.png" alt="">
                        </a>
                        <p id="text-footer">A Lafaete é uma empresa do segmento de locação de equipamentos para construção civil, infraestrutura, eventos e mineração. Destaca-se no mercado com locação de containers, máquinas, caminhões e caçambas. Além disso, atua no setor com a fabricação de estruturas metálicas e prestação de serviços como gestão ambiental e terraplanagem.</p>
                        <div class="social">
                            <a href="https://www.facebook.com/lafaetelocacao" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/lafaetelocacao/" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/lafaetelocacao/" target="_blank"><i class="fa fa-linkedin"></i></a>
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
                            <li>
                                <a href=" <?php bloginfo('url'); ?>/produtos/<?php echo $produto->slug; ?>">
                                    <?php echo $produto->name; ?>
                                </a>
                            </li>
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
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                            <?php
                                endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Unidades</h3>
                        <ul>
                            <?php
                               $unidades = new WP_Query(array('post_type'=>'unidades'));
                                while($unidades->have_posts()): $unidades->the_post();                               
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                            <?php
                                endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Atendimento</h3>
                        <ul>
                            <li><a href="<?php bloginfo('url');?>/atendimento/fale-conosco/">Fale Conosco</a></li>
                            <li><a href="<?php bloginfo('url');?>/atendimento/orcamento/">Orçamento</a></li>
                            <li><a href="http://lafaete.solides.jobs/" target="_blank">Trabalhe conosco</a></li>
                            <li><a href="<?php bloginfo('url');?>/atendimento/abertura-de-chamado/">Abertura de chamado</a></li>
                        </ul>
                    </div>
                </div>  
            </div>
            <div class="container rodape">
                <p>Copyright <?php echo date('Y') ?> | Todos os direitos reservados a <span>Lafaete Locações</span></p>
            </div>
        </div>
</footer>
<?php wp_footer(); ?>


<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lity.js"></script>