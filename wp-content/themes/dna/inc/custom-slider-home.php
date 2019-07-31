<?php
function custom_slider() {
	$labels = array(
		'name'                  => _x( 'Slider Home', 'Post Type General Name', 'Slider Home' ),
		'singular_name'         => _x( 'Slider Home', 'Post Type Singular Name', 'Slider Home' ),
		'menu_name'             => __( 'Slider Home', 'Slider Home' ),
		'name_admin_bar'        => __( 'Slider Home', 'Slider Home' ),
		'archives'              => __( 'Item Archives', 'Slider Home' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Slider Home' ),
		'all_items'             => __( 'Ver todos', 'Slider Home' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Slider Home' ),
		'add_new'               => __( 'Adicionar novo', 'Slider Home' ),
		'new_item'              => __( 'Novo item', 'Slider Home' ),
		'edit_item'             => __( 'Editar item', 'Slider Home' ),
		'update_item'           => __( 'Atualizar item', 'Slider Home' ),
		'view_item'             => __( 'Ver item', 'Slider Home' ),
		'search_items'          => __( 'Procurar item', 'Slider Home' ),
		'not_found'             => __( 'Não encontrado', 'Slider Home' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Slider Home' ),
		'featured_image'        => __( 'Imagem destacada', 'Slider Home' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Slider Home' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Slider Home' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Slider Home' ),
		'insert_into_item'      => __( 'Inserir no item', 'Slider Home' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Slider Home' ),
		'items_list'            => __( 'Lista de Itens', 'Slider Home' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Slider Home' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Slider Home' ),
	);
	$args = array(
		'label'                 => __( 'slider', 'Slider Home' ),
		'description'           => __( 'Slider Home', 'Slider Home' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'taxonomies'            => array( 'slider'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-images-alt2',
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
	register_post_type( 'slider', $args );
}
add_action( 'init', 'custom_slider', 0 );
?>