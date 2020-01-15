<div class="submenu-categorias esconder">
    <ul>
    <?php
        $categorias = get_categories( array(
        'orderby' => 'name',
        'taxonomy' => 'vendas',
        'parent'  => 0,
        'hide_empty' => true,
        ));
        $names = wp_get_object_terms($post->ID, 'vendas');
        var_dump($names);
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