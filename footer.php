
<!-- Footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="index.php"><img src="inc/logo-lafaete.png"></a>
                <p>A Lafaete é uma empresa do segmento de locação de equipamentos para construção civil, infraestrutura e mineração, destacando-se no mercado de Contêineres e Tendas Piramidais com design e fabricação própria. Atuante no setor de locação de máquinas pesadas e leves, caçambas, caminhões, geradores, torres de iluminação e veículos leves.</p>
                <div class="social">
                    <a href=""><img src="inc/facebook-logo-button.svg" width="30px"></a>
                    <a href=""><img src="inc/instagram-logo.svg" width="30px"></a>
                    <a href=""><img src="inc/linkedin-button.svg" width="30px"></a>
                </div>
            </div>
            <div class="col-md-2">
                <h3>Produtos</h3>
                <ul>
                    <a href=""><li>Caçambas</li></a>
                    <a href=""><li>Caminhões</li></a>
                    <a href=""><li>Estruturas Metálicas</li></a>
                    <a href=""><li>Eventos</li></a>
                    <a href=""><li>Geradores</li></a>
                    <a href=""><li>Máquinas</li></a>
                    <a href=""><li>Módulos Habitacionais</li></a>
                    <a href=""><li>Sombreadores</li></a>
                    <a href=""><li>Torres de Iluminação</li></a>
                    <a href=""><li>Veículos</li></a>
                </ul>
            </div>
            <div class="col-md-2">
                <h3>Serviços</h3>
                <ul>
                    <a href=""><li>Área de Transbordo e Triagem – ATT</li></a>
                    <a href=""><li>Programa de Gestão de Resíduos para Construção Civil – PGRCC</li></a>
                    <a href=""><li>Terraplanagem</li></a>
                    <a href=""><li>Gestão Ambiental</li></a>
                </ul>
            </div>
            <div class="col-md-2">
                <h3>Unidades</h3>
                <ul>
                <a href=""><li>Porto Velho - RO</li></a>
                <a href=""><li>São João da Barra - RJ</li></a>
                <a href=""><li>São Luís - MA</li></a>
                <a href=""><li>Mirassol - SP</li></a>
                <a href=""><li>Parauapebas - PA</li></a>
                <a href=""><li>Jaboatão do Guararapes - PE</li></a>
                <a href=""><li>Imperatriz - MA</li></a>
                <a href=""><li>Duque de Caxias - RJ</li></a>
                <a href=""><li>São Paulo - SP</li></a>
                <a href=""><li>Belo Horizonte - MG</li></a>
                </ul>
            </div>
            <div class="col-md-2">
                <h3>Atendimento</h3>
                <ul>
                    <a href=""><li>Fale Conosco</li>
                    <a href=""><li>Orçamento</li>
                    <a href=""><li>Trabalhe conosco</li>
                    <a href=""><li>Abertura de chamado</li>
                    <a href=""><li>Vendas</li>
                </ul>
            </div>
        </div>  
    </div>

    <div class="container rodape">
        <p>Copyright 2018 | Todos os direitos reservados a <span>Lafaete Locações</span></p>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?php //bloginfo('template_url');?>node_modules/jquery/dist/jquery.js"></script>
<script src="<?php //bloginfo('template_url');?>node_modules/popper.js/dist/popper.min.js"></script>
<script src="<?php //bloginfo('template_url');?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $(function(){   
        var nav = $('#menu-principal'); 
        var navTop = $('#menu-topo');  
        $(window).scroll(function () { 
        if ($(this).scrollTop() > 90) { 
            //nav.removeClass("fixed-top");
            nav.css('visibility','hidden');
            navTop.css('visibility','hidden'); 
            //navTop.addClass("invisible");
        } else { 
            //nav.addClass("fixed-top");
            nav.css('visibility','visible');
            navTop.css('visibility','visible'); 
            //navTop.removeClass("invisible");
        } 
        });  
    });
</script>
<?php wp_footer(); ?>