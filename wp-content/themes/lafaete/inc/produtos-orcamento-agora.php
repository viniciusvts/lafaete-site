<div id="produtos">
  <div class="container produto-floater">
    <div class="row">
      <div class="col-xl-8 texto">
        <div class='scroll-rtl'>
          <?php if(have_posts()): the_post(); the_content(); endif; ?>
          <button class="btn">
            <a href="#faca-um-orcamento">Faça um orçamento agora</a>
          </button>
          
        </div>
      </div>
      <div class="col-xl-4 pagamento">
        <h4>Condições de Pagamento</h4>
        <img src="<?php bloginfo('template_url');?>/inc/img/pagseguro.png">
      </div>
    </div>
  </div>
</div>