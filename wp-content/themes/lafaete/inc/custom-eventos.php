<?php
function custom_eventos() {
	$labels = array(
		'name'                  => _x( 'Nossos Eventos', 'Post Type General Name', 'Eventos Lafaete' ),
		'singular_name'         => _x( 'Nossos Eventos', 'Post Type Singular Name', 'Eventos Lafaete' ),
		'menu_name'             => __( 'Eventos', 'Eventos Lafaete' ),
		'name_admin_bar'        => __( 'Nossos Eventos', 'Eventos Lafaete' ),
		'archives'              => __( 'Item Archives', 'Eventos Lafaete' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Eventos Lafaete' ),
		'all_items'             => __( 'Ver todos', 'Eventos Lafaete' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Eventos Lafaete' ),
		'add_new'               => __( 'Adicionar novo', 'Eventos Lafaete' ),
		'new_item'              => __( 'Novo item', 'Eventos Lafaete' ),
		'edit_item'             => __( 'Editar item', 'Eventos Lafaete' ),
		'update_item'           => __( 'Atualizar item', 'Eventos Lafaete' ),
		'view_item'             => __( 'Ver item', 'Eventos Lafaete' ),
		'search_items'          => __( 'Procurar item', 'Eventos Lafaete' ),
		'not_found'             => __( 'Não encontrado', 'Eventos Lafaete' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Eventos Lafaete' ),
		'featured_image'        => __( 'Imagem destacada', 'Eventos Lafaete' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Eventos Lafaete' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Eventos Lafaete' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Eventos Lafaete' ),
		'insert_into_item'      => __( 'Inserir no item', 'Eventos Lafaete' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Eventos Lafaete' ),
		'items_list'            => __( 'Lista de Itens', 'Eventos Lafaete' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Eventos Lafaete' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Eventos Lafaete' ),
	);
	$args = array(
		'label'                 => __( 'eventos', 'Eventos Lafaete' ),
		'description'           => __( 'Eventos Lafaete', 'Eventos Lafaete' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'taxonomies'            => array( 'premios'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-camera',
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
	register_post_type( 'eventos', $args );
}
add_action( 'init', 'custom_eventos', 0 );
?>