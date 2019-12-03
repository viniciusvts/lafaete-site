<?php
  define('urlBase', get_home_url());

  // Imagens dos posts
  add_theme_support( 'post-thumbnails' );

  /* PAGINAÇÃO WORDPRESS */
  function wordpress_pagination() {
      global $wp_query;
  
      $big = 999999999;
  
      echo paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $wp_query->max_num_pages
      ) );
  }

  function instagram_widgets_init() {
      register_sidebar( array(
          'name'          => __( 'Instagram Feed', 'dna' ),
          'id'            => 'instagram',
          'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
          'after_widget'  => '</aside>',
          'before_title'  => '<p class="blog-widget-subtitle">',
          'after_title'   => '</p>',
      ) );
    }
  add_action( 'widgets_init', 'instagram_widgets_init' );

  function wp_custom_breadcrumbs() {

    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    
    global $post;
    $homeLink = get_bloginfo('url');
    
    if (is_home() || is_front_page()) {
    
      if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
    
    } else {
    
      echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    
      if ( is_category() ) {
        $thisCat = get_category(get_query_var('cat'), false);
        if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
        echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;
    
      } elseif ( is_search() ) {
        echo $before . 'Pesquisa: "' . get_search_query() . '"' . $after;
    
      } elseif ( is_day() ) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    
      } elseif ( is_month() ) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    
      } elseif ( is_year() ) {
        echo $before . get_the_time('Y') . $after;
    
      } elseif ( is_single() && !is_attachment() ) {
        if ( get_post_type() != 'post' ) {
          $post_type = get_post_type_object(get_post_type());
          $slug = $post_type->rewrite;
          echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
          if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } else {
          $cat = get_the_category(); $cat = $cat[0];
          $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
          echo $cats;
          if ($showCurrent == 1) echo $before . get_the_title() . $after;
        }
    
      } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    
      } elseif ( is_attachment() ) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    
      } elseif ( is_page() && !$post->post_parent ) {
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
    
      } elseif ( is_page() && $post->post_parent ) {
        $parent_id  = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
        }
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    
      } elseif ( is_tag() ) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    
      } elseif ( is_author() ) {
          global $author;
        $userdata = get_userdata($author);
        echo $before . 'Artigo postado by ' . $userdata->display_name . $after;
    
      } elseif ( is_404() ) {
        echo $before . 'Erro 404' . $after;
      }
    
      if ( get_query_var('paged') ) {
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
        echo __('Page') . ' ' . get_query_var('paged');
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
      }
    
      echo '</div>';
    
    }
  } // end wp_custom_breadcrumbs() 
      

  register_nav_menus( array(
    'primary' => __( 'Menu', 'dna' ),
  ));

  /* Reescrita blog */
  function add_rewrite_rules( $wp_rewrite ){
    $new_rules = array(
        'artigos/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
  }
  add_action('generate_rewrite_rules', 'add_rewrite_rules'); 

  function change_blog_links($post_link, $id=0){
    $post = get_post($id);
    if( is_object($post) && $post->post_type == 'post'){
        return home_url('/artigos/'. $post->post_name.'/');
    }
    return $post_link;
  }
  add_filter('post_link', 'change_blog_links', 1, 3);
  /* End Reescrita blog */
  //custom wp-login css
  function custom_login_css() {
      $sources = '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/css/wp-admin.css"/>';
      $sources .= '<script defer src="'.get_stylesheet_directory_uri().'/js/wp-admin.js"/></script>';
      echo $sources;
  }
  add_action('login_head', 'custom_login_css');
  //end custom wp-login css

  // INICIO AREA DE INCLUDES CUSTOM POST TYPE:  
  include_once 'inc/wp_bootstrap_navwalker.php';
  include_once 'inc/custom-premios.php';
  include_once 'inc/custom-depoimentos.php';
  include_once 'inc/custom-slider-home.php';
  include_once 'inc/custom-servicos.php';
  include_once 'inc/custom-produto.php';
  include_once 'inc/custom-clientes.php';
  include_once 'inc/custom-unidades.php';
  include_once 'inc/custom-eventos.php';
  include_once 'inc/custom-grandes-obras.php';
  include_once 'inc/custom-vendas.php';
  include_once 'inc/custom-projetos-sociais.php';
  include_once 'inc/paginate.php';
  include_once 'inc/loadSources.php';
?>