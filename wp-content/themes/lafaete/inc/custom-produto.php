<?php
function custom_produto() {
	$labels = array(
		'name'                  => _x( 'Produtos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Produto', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Produtos', 'text_domain' ),
		'name_admin_bar'        => __( 'Produto', 'text_domain' ),
		'archives'              => __( 'Produtos Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os produtos', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo produto', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo produto', 'text_domain' ),
		'edit_item'             => __( 'Editar produto', 'text_domain' ),
		'update_item'           => __( 'Atualizar produto', 'text_domain' ),
		'view_item'             => __( 'Ver produto', 'text_domain' ),
		'search_items'          => __( 'Buscar produto', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem em destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem produto', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem produto', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem produto', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no produto', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para produto', 'text_domain' ),
		'items_list'            => __( 'Lista de produtos', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos produtos', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar produtos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Produto', 'text_domain' ),
		'description'           => __( 'Cadastrar produtos', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail','editor', ),
		'taxonomies'            => array( 'categoria_produto' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-cart',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'show_in_rest'          => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'produto', $args );
}
add_action( 'init', 'custom_produto', 0 );


// Register Custom Post Type
function categoria_produto_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Categorias Produto', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Categoria Produto', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Categorias', 'dna' ),
		'all_items'                  => __( 'Todas as categorias', 'dna' ),
		'parent_item'                => __( 'Categoria M??e', 'dna' ),
		'parent_item_colon'          => __( 'Categoria m??e:', 'dna' ),
		'new_item_name'              => __( 'Nova Categoria de produto', 'dna' ),
		'add_new_item'               => __( 'Adicionar Categoria de produto', 'dna' ),
		'edit_item'                  => __( 'Editar Categoria de produto', 'dna' ),
		'update_item'                => __( 'Atualizar Categoria de produto', 'dna' ),
		'view_item'                  => __( 'Ver Categoria de produto', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por v??rgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria de produto', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria de produto', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria de produto', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria de produto', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'produtos',
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
	register_taxonomy( 'produtos', array( 'produto', 'servicos' ), $args );
}
add_action( 'init', 'categoria_produto_taxonomy', 0 );

// Register taxonomy
function estado_produto_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Estados Produto', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Estado Produto', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Estados', 'dna' ),
		'all_items'                  => __( 'Todas as Estados', 'dna' ),
		'parent_item'                => __( 'Estado M??e', 'dna' ),
		'parent_item_colon'          => __( 'Estado m??e:', 'dna' ),
		'new_item_name'              => __( 'Nova Estado', 'dna' ),
		'add_new_item'               => __( 'Adicionar Estado', 'dna' ),
		'edit_item'                  => __( 'Editar Estado', 'dna' ),
		'update_item'                => __( 'Atualizar Estado', 'dna' ),
		'view_item'                  => __( 'Ver Estado', 'dna' ),
		'separate_items_with_commas' => __( 'Separar Estados por v??rgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Estado', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar Estados mais usadas', 'dna' ),
		'popular_items'              => __( 'Estados populares', 'dna' ),
		'search_items'               => __( 'Buscar Estado', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Estado', 'dna' ),
		'items_list'                 => __( 'Lista de Estados', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Estado', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'estado',
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
		'query_var'                  => true,
		'rewrite'                    => $rewrite,
		'has_archive'                => true,
	);
	register_taxonomy( 'estado', array( 'produto', 'servicos' ), $args );
}
add_action( 'init', 'estado_produto_taxonomy', 0 );
?>