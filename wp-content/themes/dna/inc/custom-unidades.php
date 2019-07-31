<?php
function custom_unidades() {
	$labels = array(
		'name'                  => _x( 'Unidades', 'Post Type General Name', 'Unidades Lafaete' ),
		'singular_name'         => _x( 'Unidades', 'Post Type Singular Name', 'Unidades Lafaete' ),
		'menu_name'             => __( 'Unidades', 'Unidades Lafaete' ),
		'name_admin_bar'        => __( 'Unidades', 'Unidades Lafaete' ),
		'archives'              => __( 'Item Archives', 'Unidades Lafaete' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Unidades Lafaete' ),
		'all_items'             => __( 'Ver todos', 'Unidades Lafaete' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Unidades Lafaete' ),
		'add_new'               => __( 'Adicionar novo', 'Unidades Lafaete' ),
		'new_item'              => __( 'Novo item', 'Unidades Lafaete' ),
		'edit_item'             => __( 'Editar item', 'Unidades Lafaete' ),
		'update_item'           => __( 'Atualizar item', 'Unidades Lafaete' ),
		'view_item'             => __( 'Ver item', 'Unidades Lafaete' ),
		'search_items'          => __( 'Procurar item', 'Unidades Lafaete' ),
		'not_found'             => __( 'Não encontrado', 'Unidades Lafaete' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Unidades Lafaete' ),
		'featured_image'        => __( 'Imagem destacada', 'Unidades Lafaete' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Unidades Lafaete' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Unidades Lafaete' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Unidades Lafaete' ),
		'insert_into_item'      => __( 'Inserir no item', 'Unidades Lafaete' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Unidades Lafaete' ),
		'items_list'            => __( 'Lista de Itens', 'Unidades Lafaete' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Unidades Lafaete' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Unidades Lafaete' ),
	);
	$args = array(
		'label'                 => __( 'unidades', 'Unidades Lafaete' ),
		'description'           => __( 'Unidades Lafaete', 'Unidades Lafaete' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'taxonomies'            => array( 'unidades'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-location-alt',
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
	register_post_type( 'unidades', $args );
}
add_action( 'init', 'custom_unidades', 0 );
?>