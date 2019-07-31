<?php
function custom_servico() {
	$labels = array(
		'name'                  => _x( 'Servicos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Serviço', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Servicos', 'text_domain' ),
		'name_admin_bar'        => __( 'Serviço', 'text_domain' ),
		'archives'              => __( 'Serviços Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os serviços', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo serviço', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo serviço', 'text_domain' ),
		'edit_item'             => __( 'Editar serviço', 'text_domain' ),
		'update_item'           => __( 'Atualizar serviço', 'text_domain' ),
		'view_item'             => __( 'Ver serviço', 'text_domain' ),
		'search_items'          => __( 'Buscar serviço', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem serviço', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem serviço', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem serviço', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem serviço', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no serviço', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para serviço', 'text_domain' ),
		'items_list'            => __( 'Lista de serviços', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos serviços', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar serviços', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'servico', 'text_domain' ),
		'description'           => __( 'Cadastrar serviços', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail','editor', ),
		'taxonomies'            => array( 'categoria_servico' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-admin-multisite',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'servicos', $args );
}
add_action( 'init', 'custom_servico', 0 );


// Register Custom Post Type
function categoria_servico_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Categorias serviço', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Categoria serviço', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Categorias', 'dna' ),
		'all_items'                  => __( 'Todas as categorias', 'dna' ),
		'parent_item'                => __( 'Categoria Mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Nova Categoria de serviço', 'dna' ),
		'add_new_item'               => __( 'Adicionar Categoria de serviço', 'dna' ),
		'edit_item'                  => __( 'Editar Categoria de serviço', 'dna' ),
		'update_item'                => __( 'Atualizar Categoria de serviço', 'dna' ),
		'view_item'                  => __( 'Ver Categoria de serviço', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de serviço', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria de serviço', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria de serviço', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de serviço', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'servicos',
		'with_front'                 => false,
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
	register_taxonomy( 'servicos', array( 'servicos' ), $args );
}
add_action( 'init', 'categoria_servico_taxonomy', 0 );
?>