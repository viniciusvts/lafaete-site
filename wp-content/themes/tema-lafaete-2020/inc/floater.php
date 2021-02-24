<div class="footer-floater produto-floater">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <a href="#faca-um-orcamento"><button class="btn btn-fo">Faça um orçamento agora</button></a>
            </div>
            <div class="col-md-3">
                <p>Condições de Pagamento:</p>
            </div>
            <div class="col-md-5">
                <?php
                    $queriedObject = get_queried_object();
                    // #11175 - Exibir bandeira BNDS em certas páginas
                    // em outras só exibir a do pagseguro
                    $showBNDS = false;
                    // página da taxonomia
                    if($queriedObject->slug == 'modulos-habitacionais' || $queriedObject->slug == 'estruturas-metalicas'){
                        $showBNDS = true;
                    }
                    // página de produto
                    $taxs = get_the_terms($queriedObject->ID, 'produtos');
                    foreach ($taxs as $tax) {
                        if($tax->slug == 'modulos-habitacionais' || $tax->slug == 'estruturas-metalicas'){
                            $showBNDS = true;
                        }
                    }
                    if($showBNDS) {
                        echo "<img src='";
                        bloginfo('template_url');
                        echo "/inc/img/metodos-pagamento-horizontal.png'>";
                    } else {
                        echo "<img src='";
                        bloginfo('template_url');
                        echo "/inc/img/metodos-pagamento-horizontal-pagseguro.png'>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>