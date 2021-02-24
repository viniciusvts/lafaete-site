<?php
function custom_venda() {
	$labels = array(
		'name'                  => _x( 'Seminovos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Seminovos', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Seminovos', 'text_domain' ),
		'name_admin_bar'        => __( 'Seminovos', 'text_domain' ),
		'archives'              => __( 'Seminovos Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os Seminovos', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar Seminovo', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo Seminovos', 'text_domain' ),
		'edit_item'             => __( 'Editar Seminovos', 'text_domain' ),
		'update_item'           => __( 'Atualizar Seminovos', 'text_domain' ),
		'view_item'             => __( 'Ver Seminovos', 'text_domain' ),
		'search_items'          => __( 'Buscar Seminovos', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem em destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem Seminovos', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem Seminovos', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem Seminovos', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no Seminovos', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para Seminovos', 'text_domain' ),
		'items_list'            => __( 'Lista de Seminovos', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos Seminovos', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar Seminovos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Seminovos', 'text_domain' ),
		'description'           => __( 'Cadastrar Seminovos', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( 'categoria_Seminovos' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-store',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'show_in_rest'          => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'venda', $args );
}
add_action( 'init', 'custom_venda', 0 );


// Register Custom Post Type
function categoria_venda_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Categorias Seminovos', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Categoria Seminovos', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Categorias', 'dna' ),
		'all_items'                  => __( 'Todas as categorias', 'dna' ),
		'parent_item'                => __( 'Categoria Mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Nova Categoria de Seminovos', 'dna' ),
		'add_new_item'               => __( 'Adicionar Categoria de Seminovos', 'dna' ),
		'edit_item'                  => __( 'Editar Categoria de Seminovos', 'dna' ),
		'update_item'                => __( 'Atualizar Categoria de Seminovos', 'dna' ),
		'view_item'                  => __( 'Ver Categoria de Seminovos', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de Seminovos', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria de Seminovos', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria de Seminovos', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de Seminovos', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'vendas',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'vendas', array( 'venda' ), $args );
}
add_action( 'init', 'categoria_venda_taxonomy', 0 );
?>