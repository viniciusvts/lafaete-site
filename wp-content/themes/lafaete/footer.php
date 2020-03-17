<!-- Footer-->
<footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="index.php" class="d-none d-sm-block">
                            <img src="<?php echo( get_theme_mod( 'dnaTheme_setting_logo') ); ?>" width="200px">
                        </a>
                        <p id="text-footer">A Lafaete é uma empresa do segmento de locação de equipamentos para construção civil, infraestrutura, eventos e mineração. Destaca-se no mercado com locação de containers, máquinas, caminhões e caçambas. Além disso, atua no setor com a fabricação de estruturas metálicas e prestação de serviços como gestão ambiental e terraplanagem.</p>
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
                    <div class="col-md-3">
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
                            <li><a href="<?php bloginfo('url');?>/atendimento/fale-conosco">Fale Conosco</a></li>
                            <li><a href="<?php bloginfo('url');?>/atendimento/orcamento">Orçamento</a></li>
                            <li><a href="<?php bloginfo('url');?>/atendimento/trabalhe-conosco">Trabalhe conosco</a></li>
                            <li><a href="<?php bloginfo('url');?>/atendimento/abertura-de-chamado">Abertura de chamado</a></li>
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