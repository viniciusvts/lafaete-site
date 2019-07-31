<?php
function custom_premios() {
	$labels = array(
		'name'                  => _x( 'Nossos Prêmios', 'Post Type General Name', 'Prêmios Lafaete' ),
		'singular_name'         => _x( 'Nossos Prêmios', 'Post Type Singular Name', 'Prêmios Lafaete' ),
		'menu_name'             => __( 'Nossos Prêmios', 'Prêmios Lafaete' ),
		'name_admin_bar'        => __( 'Nossos Prêmios', 'Prêmios Lafaete' ),
		'archives'              => __( 'Item Archives', 'Prêmios Lafaete' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Prêmios Lafaete' ),
		'all_items'             => __( 'Ver todos', 'Prêmios Lafaete' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Prêmios Lafaete' ),
		'add_new'               => __( 'Adicionar novo', 'Prêmios Lafaete' ),
		'new_item'              => __( 'Novo item', 'Prêmios Lafaete' ),
		'edit_item'             => __( 'Editar item', 'Prêmios Lafaete' ),
		'update_item'           => __( 'Atualizar item', 'Prêmios Lafaete' ),
		'view_item'             => __( 'Ver item', 'Prêmios Lafaete' ),
		'search_items'          => __( 'Procurar item', 'Prêmios Lafaete' ),
		'not_found'             => __( 'Não encontrado', 'Prêmios Lafaete' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Prêmios Lafaete' ),
		'featured_image'        => __( 'Imagem destacada', 'Prêmios Lafaete' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Prêmios Lafaete' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Prêmios Lafaete' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Prêmios Lafaete' ),
		'insert_into_item'      => __( 'Inserir no item', 'Prêmios Lafaete' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Prêmios Lafaete' ),
		'items_list'            => __( 'Lista de Itens', 'Prêmios Lafaete' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Prêmios Lafaete' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Prêmios Lafaete' ),
	);
	$args = array(
		'label'                 => __( 'premios', 'Prêmios Lafaete' ),
		'description'           => __( 'Prêmios Lafaete', 'Prêmios Lafaete' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'taxonomies'            => array( 'premios'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite' => array('with_front' => false, 'hierarchical' => true ),

	);
	register_post_type( 'premios', $args );
}
add_action( 'init', 'custom_premios', 0 );
?>