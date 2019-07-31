<?php
function custom_obras() {
	$labels = array(
		'name'                  => _x( 'Grandes Obras', 'Post Type General Name', 'Obras Lafaete' ),
		'singular_name'         => _x( 'Grandes Obras', 'Post Type Singular Name', 'Obras Lafaete' ),
		'menu_name'             => __( 'Grandes Obras', 'Obras Lafaete' ),
		'name_admin_bar'        => __( 'Grandes Obras', 'Obras Lafaete' ),
		'archives'              => __( 'Item Archives', 'Obras Lafaete' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Obras Lafaete' ),
		'all_items'             => __( 'Ver todos', 'Obras Lafaete' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Obras Lafaete' ),
		'add_new'               => __( 'Adicionar novo', 'Obras Lafaete' ),
		'new_item'              => __( 'Novo item', 'Obras Lafaete' ),
		'edit_item'             => __( 'Editar item', 'Obras Lafaete' ),
		'update_item'           => __( 'Atualizar item', 'Obras Lafaete' ),
		'view_item'             => __( 'Ver item', 'Obras Lafaete' ),
		'search_items'          => __( 'Procurar item', 'Obras Lafaete' ),
		'not_found'             => __( 'Não encontrado', 'Obras Lafaete' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Obras Lafaete' ),
		'featured_image'        => __( 'Imagem destacada', 'Obras Lafaete' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Obras Lafaete' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Obras Lafaete' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Obras Lafaete' ),
		'insert_into_item'      => __( 'Inserir no item', 'Obras Lafaete' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Obras Lafaete' ),
		'items_list'            => __( 'Lista de Itens', 'Obras Lafaete' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Obras Lafaete' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Obras Lafaete' ),
	);
	$args = array(
		'label'                 => __( 'obras', 'Obras Lafaete' ),
		'description'           => __( 'Obras Lafaete', 'Obras Lafaete' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'taxonomies'            => array( 'obras'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-hammer',
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
	register_post_type( 'obras', $args );
}
add_action( 'init', 'custom_obras', 0 );
?>