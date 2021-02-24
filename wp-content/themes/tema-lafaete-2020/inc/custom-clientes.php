<?php
function custom_clientes() {
	$labels = array(
		'name'                  => _x( 'Clientes', 'Post Type General Name', 'Clientes Lafaete' ),
		'singular_name'         => _x( 'Clientes', 'Post Type Singular Name', 'Clientes Lafaete' ),
		'menu_name'             => __( 'Clientes', 'Clientes Lafaete' ),
		'name_admin_bar'        => __( 'Clientes', 'Clientes Lafaete' ),
		'archives'              => __( 'Item Archives', 'Clientes Lafaete' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Clientes Lafaete' ),
		'all_items'             => __( 'Ver todos', 'Clientes Lafaete' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Clientes Lafaete' ),
		'add_new'               => __( 'Adicionar novo', 'Clientes Lafaete' ),
		'new_item'              => __( 'Novo item', 'Clientes Lafaete' ),
		'edit_item'             => __( 'Editar item', 'Clientes Lafaete' ),
		'update_item'           => __( 'Atualizar item', 'Clientes Lafaete' ),
		'view_item'             => __( 'Ver item', 'Clientes Lafaete' ),
		'search_items'          => __( 'Procurar item', 'Clientes Lafaete' ),
		'not_found'             => __( 'Não encontrado', 'Clientes Lafaete' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Clientes Lafaete' ),
		'featured_image'        => __( 'Imagem destacada', 'Clientes Lafaete' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Clientes Lafaete' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Clientes Lafaete' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Clientes Lafaete' ),
		'insert_into_item'      => __( 'Inserir no item', 'Clientes Lafaete' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Clientes Lafaete' ),
		'items_list'            => __( 'Lista de Itens', 'Clientes Lafaete' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Clientes Lafaete' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Clientes Lafaete' ),
	);
	$args = array(
		'label'                 => __( 'clientes', 'Clientes Lafaete' ),
		'description'           => __( 'Clientes Lafaete', 'Clientes Lafaete' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'taxonomies'            => array( 'clientes'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-groups',
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
	register_post_type( 'clientes', $args );
}
add_action( 'init', 'custom_clientes', 0 );
?>