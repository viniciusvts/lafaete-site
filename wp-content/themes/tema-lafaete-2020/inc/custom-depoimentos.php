<?php
function custom_depoimentos() {
	$labels = array(
		'name'                  => _x( 'Depoimentos', 'Post Type General Name', 'Depoimentos de clientes' ),
		'singular_name'         => _x( 'Depoimentos', 'Post Type Singular Name', 'Depoimentos de clientes' ),
		'menu_name'             => __( 'Depoimentos', 'Depoimentos de clientes' ),
		'name_admin_bar'        => __( 'Depoimentos', 'Depoimentos de clientes' ),
		'archives'              => __( 'Item Archives', 'Depoimentos de clientes' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Depoimentos de clientes' ),
		'all_items'             => __( 'Ver todos', 'Depoimentos de clientes' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Depoimentos de clientes' ),
		'add_new'               => __( 'Adicionar novo', 'Depoimentos de clientes' ),
		'new_item'              => __( 'Novo item', 'Depoimentos de clientes' ),
		'edit_item'             => __( 'Editar item', 'Depoimentos de clientes' ),
		'update_item'           => __( 'Atualizar item', 'Depoimentos de clientes' ),
		'view_item'             => __( 'Ver item', 'Depoimentos de clientes' ),
		'search_items'          => __( 'Procurar item', 'Depoimentos de clientes' ),
		'not_found'             => __( 'Não encontrado', 'Depoimentos de clientes' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Depoimentos de clientes' ),
		'featured_image'        => __( 'Imagem destacada', 'Depoimentos de clientes' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Depoimentos de clientes' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Depoimentos de clientes' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Depoimentos de clientes' ),
		'insert_into_item'      => __( 'Inserir no item', 'Depoimentos de clientes' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Depoimentos de clientes' ),
		'items_list'            => __( 'Lista de Itens', 'Depoimentos de clientes' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Depoimentos de clientes' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Depoimentos de clientes' ),
	);
	$args = array(
		'label'                 => __( 'depoimentos', 'Depoimentos de clientes' ),
		'description'           => __( 'Depoimentos de clientes', 'Depoimentos de clientes' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'taxonomies'            => array( 'depoimentos'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-format-chat',
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
	register_post_type( 'depoimentos', $args );
}
add_action( 'init', 'custom_depoimentos', 0 );
?>