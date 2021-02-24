<?php
function custom_projetos_especiais() {
	$labels = array(
		'name'                  => _x( 'Projetos Especiais', 'Post Type General Name', 'dna' ),
		'singular_name'         => _x( 'Projeto Especial', 'Post Type Singular Name', 'dna' ),
		'menu_name'             => __( 'Projetos Especiais', 'dna' ),
		'name_admin_bar'        => __( 'Projetos Especiais', 'dna' ),
		'archives'              => __( 'Arquivos', 'dna' ),
		'parent_item_colon'     => __( 'Item pai:', 'dna' ),
		'all_items'             => __( 'Ver todos', 'dna' ),
		'add_new_item'          => __( 'Adicionar novo item', 'dna' ),
		'add_new'               => __( 'Adicionar novo', 'dna' ),
		'new_item'              => __( 'Novo item', 'dna' ),
		'edit_item'             => __( 'Editar item', 'dna' ),
		'update_item'           => __( 'Atualizar item', 'dna' ),
		'view_item'             => __( 'Ver item', 'dna' ),
		'search_items'          => __( 'Procurar item', 'dna' ),
		'not_found'             => __( 'Não encontrado', 'dna' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'dna' ),
		'featured_image'        => __( 'Imagem destacada', 'dna' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'dna' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'dna' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'dna' ),
		'insert_into_item'      => __( 'Inserir no item', 'dna' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'dna' ),
		'items_list'            => __( 'Lista de Itens', 'dna' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'dna' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'dna' ),
	);
	$args = array(
		'label'                 => __( 'projetos-especiais', 'dna' ),
		'description'           => __( 'Projetos Especiais da Lafaete Locação', 'dna' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'editor', '	author'),
		'taxonomies'            => array( 'projetos-especiais'),
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
	register_post_type( 'projetos-especiais', $args );
}
add_action( 'init', 'custom_projetos_especiais', 0 );
?>