<div class="submenu-categorias esconder">
    <ul>
    <?php
    $pageVendas = isset($pageVendas) ? $pageVendas : false;
    if($pageVendas){
        $args = array(
            'orderby' => 'name',
            'taxonomy' => 'vendas',
            'parent'  => 0,
            'hide_empty' => true
        );
    }else{
        if(is_single() == true) {
            $args = array(
                'orderby' => 'name',
                'taxonomy' => 'vendas',
                'parent'  => 0,
                'hide_empty' => true
            );
        } else {
            $args = array(
                'orderby' => 'name',
                'taxonomy' => 'produtos',
                'parent'  => 0,
                'hide_empty' => true
            );
        }
    }
        $categorias = get_categories( $args );
        foreach($categorias as $categoria) : 
    ?>
    <li>
        <a href="<?php bloginfo('url') ?>/<?php echo $categoria->taxonomy; ?>/<?php echo $categoria->slug; ?>">
        <?php echo $categoria->name; ?>
        </a>
    </li>
    <?php endforeach; ?>
    </ul>
</div>