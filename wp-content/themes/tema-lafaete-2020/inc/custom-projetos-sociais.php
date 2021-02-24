<?php
function custom_projetos_sociais() {
	$labels = array(
		'name'                  => _x( 'Projetos Sociais', 'Post Type General Name', 'Projetos Lafaete' ),
		'singular_name'         => _x( 'Projetos Sociais', 'Post Type Singular Name', 'Projetos Lafaete' ),
		'menu_name'             => __( 'Projetos Sociais', 'Projetos Lafaete' ),
		'name_admin_bar'        => __( 'Projetos Sociais', 'Projetos Lafaete' ),
		'archives'              => __( 'Item Archives', 'Projetos Lafaete' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Projetos Lafaete' ),
		'all_items'             => __( 'Ver todos', 'Projetos Lafaete' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Projetos Lafaete' ),
		'add_new'               => __( 'Adicionar novo', 'Projetos Lafaete' ),
		'new_item'              => __( 'Novo item', 'Projetos Lafaete' ),
		'edit_item'             => __( 'Editar item', 'Projetos Lafaete' ),
		'update_item'           => __( 'Atualizar item', 'Projetos Lafaete' ),
		'view_item'             => __( 'Ver item', 'Projetos Lafaete' ),
		'search_items'          => __( 'Procurar item', 'Projetos Lafaete' ),
		'not_found'             => __( 'Não encontrado', 'Projetos Lafaete' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Projetos Lafaete' ),
		'featured_image'        => __( 'Imagem destacada', 'Projetos Lafaete' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Projetos Lafaete' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Projetos Lafaete' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Projetos Lafaete' ),
		'insert_into_item'      => __( 'Inserir no item', 'Projetos Lafaete' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Projetos Lafaete' ),
		'items_list'            => __( 'Lista de Itens', 'Projetos Lafaete' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Projetos Lafaete' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Projetos Lafaete' ),
	);
	$args = array(
		'label'                 => __( 'projetos_sociais', 'Projetos Lafaete' ),
		'description'           => __( 'Projetos Lafaete', 'Projetos Lafaete' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'taxonomies'            => array( 'projetos-sociais'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-universal-access',
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
	register_post_type( 'projetos-sociais', $args );
}
add_action( 'init', 'custom_projetos_sociais', 0 );
?>