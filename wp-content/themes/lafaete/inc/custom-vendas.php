<?php
function custom_vendas() {

	$labels = array(
		'name'                  => _x( 'Seminovos', 'Post Type General Name', 'Vendas Lafaete' ),
		'singular_name'         => _x( 'Seminovo', 'Post Type Singular Name', 'Vendas Lafaete' ),
		'menu_name'             => __( 'Seminovos', 'Vendas Lafaete' ),
		'name_admin_bar'        => __( 'Seminovos', 'Vendas Lafaete' ),
		'archives'              => __( 'Item Archives', 'Vendas Lafaete' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Vendas Lafaete' ),
		'all_items'             => __( 'Todos os itens', 'Vendas Lafaete' ),
		'add_new_item'          => __( 'Adicionar novo item', 'Vendas Lafaete' ),
		'add_new'               => __( 'Adicionar novo', 'Vendas Lafaete' ),
		'new_item'              => __( 'Novo item', 'Vendas Lafaete' ),
		'edit_item'             => __( 'Editar item', 'Vendas Lafaete' ),
		'update_item'           => __( 'Atualizar item', 'Vendas Lafaete' ),
		'view_item'             => __( 'Ver item', 'Vendas Lafaete' ),
		'search_items'          => __( 'Procurar item', 'Vendas Lafaete' ),
		'not_found'             => __( 'Não encontrado', 'Vendas Lafaete' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'Vendas Lafaete' ),
		'featured_image'        => __( 'Imagem destacada', 'Vendas Lafaete' ),
		'set_featured_image'    => __( 'Definir imagem destacada', 'Vendas Lafaete' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'Vendas Lafaete' ),
		'use_featured_image'    => __( 'Usar a imagem destacada', 'Vendas Lafaete' ),
		'insert_into_item'      => __( 'Inserir no item', 'Vendas Lafaete' ),
		'uploaded_to_this_item' => __( 'Carregado para este item', 'Vendas Lafaete' ),
		'items_list'            => __( 'Lista de Itens', 'Vendas Lafaete' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'Vendas Lafaete' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'Vendas Lafaete' ),
	);
	$args = array(
		'label'                 => __( 'Venda', 'Vendas Lafaete' ),
		'description'           => __( 'Vendas de maquinário lafaete', 'Vendas Lafaete' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( 'categoria_produtos',),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-store',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite' => array( 'slug' => 'vendas/%vendas_category%', 'with_front' => false, 'hierarchical' => true ),

	);
	register_post_type( 'vendas', $args );
}
add_action( 'init', 'custom_vendas', 0 );


add_action( 'init', 'create_taxonomy_vendas_category' );
function create_taxonomy_vendas_category() {
    register_taxonomy( 'vendas_category', array( 'vendas' ), array(
        'hierarchical' => true,
        'label' => __( 'Categorias vendas' ),
		'labels' => array(
		    'name' => _x( 'Categorias Vendas', 'taxonomy general name' ),
		    'singular_name' => _x( 'Categoria Venda', 'taxonomy singular name' ),
		    'search_items' =>  __( 'Pesquisar Categorias' ),
		    'all_items' => __( 'Todas as categorias' ),
		    'parent_item' => __( 'Categoria pai' ),
		    'parent_item_colon' => __( 'Categoria pai:' ),
		    'edit_item' => __( 'Editar categoria' ),
		    'update_item' => __( 'Atualizar categoria' ),
		    'add_new_item' => __( 'Adicionar nova categoria' ),
		    'new_item_name' => __( 'Adicionar nome da categoria' ),
		    'menu_name' => __( 'Categoria Seminovos' ),
		    'rewrite' => array('slug' => _x('vendas', 'URL Slug', urlBase), 'with_front' => false, 'page' => false),
			'capability_type' => 'page',
		  ),        
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        #'rewrite' => true,
        'rewrite' => array( 'slug' => 'vendas', 'with_front' => false ),
        )
    );
}
function wpa_show_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'vendas' ){
        $terms = wp_get_object_terms( $post->ID, 'vendas_category' );
        if( $terms ){
            return str_replace( '%vendas_category%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );


// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Tipo do produto', 'text_domain' ),
		'all_items'                  => __( 'Todos', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Adicionar novo tipo', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tipo', array( 'vendas' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

?>