<?php
function custom_materiais() {
	$labels = array(
		'name'                  => _x( 'Materiais', 'Post Type General Name', 'Lafaete' ),
		'singular_name'         => _x( 'Material', 'Post Type Singular Name', 'Lafaete' ),
		'menu_name'             => __( 'Materiais', 'Lafaete' ),
		'name_admin_bar'        => __( 'Materiais', 'Lafaete' ),
		'archives'              => __( 'Arquivo', 'Lafaete' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Lafaete' ),
		'all_items'             => __( 'Ver todos', 'Lafaete' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Lafaete' ),
		'add_new'               => __( 'Adicionar novo', 'Lafaete' ),
		'new_item'              => __( 'Novo item', 'Lafaete' ),
		'edit_item'             => __( 'Editar item', 'Lafaete' ),
		'update_item'           => __( 'Atualizar item', 'Lafaete' ),
		'view_item'             => __( 'Ver item', 'Lafaete' ),
		'search_items'          => __( 'Procurar item', 'Lafaete' ),
		'not_found'             => __( 'Não encontrado', 'Lafaete' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Lafaete' ),
		'featured_image'        => __( 'Imagem destacada', 'Lafaete' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Lafaete' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Lafaete' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Lafaete' ),
		'insert_into_item'      => __( 'Inserir no item', 'Lafaete' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Lafaete' ),
		'items_list'            => __( 'Lista de Itens', 'Lafaete' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Lafaete' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Lafaete' ),
	);
	$args = array(
		'label'                 => __( 'Materiais', 'Lafaete' ),
		'description'           => __( 'Lafaete', 'Lafaete' ),
		'labels'                => $labels,
		'supports'              => array( 'title','thumbnail'),
		'taxonomies'            => array( 'material'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-media-interactive',
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
	register_post_type( 'materiais', $args );
}
add_action( 'init', 'custom_materiais', 0 );
