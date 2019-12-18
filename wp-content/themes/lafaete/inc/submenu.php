<div class="submenu-categorias esconder">
    <ul>
    <?php
        $categorias = get_categories( array(
        'orderby' => 'name',
        'taxonomy' => 'vendas',
        'parent'  => 0
        ));
        foreach($categorias as $categoria) : 
    ?>
    <li>
        <a href="<?php bloginfo('url') ?>/vendas/<?php echo $categoria->slug; ?>">
        <?php echo $categoria->name; ?>
        </a>
    </li>
    <?php endforeach; ?>
    </ul>
</div>