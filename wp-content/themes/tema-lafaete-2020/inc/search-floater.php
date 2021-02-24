<div class="blog-floater">
        <div class="container">
          <div class="row">
            <div class="col-md-5 d-flex align-items-center">
              <?php wp_custom_breadcrumbs(); ?>
            </div>

            <div class="col-md-7">
              <div class="row">
                <div class="col-md-8 formulario d-flex align-items-center">
                  <?php get_search_form();?> 
                </div>
                <div class="col-md-4 d-flex align-items-center">
                  <div class="blog-categorias">
                    <a id="nolink" href="#" class="togglecats">
                      <p data-toggle="modal" data-target="#exampleModalLong">Ver Categorias</p> 
                    </a> 
                    <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> 
                      <path d="M24,3c0-0.6-0.4-1-1-1H1C0.4,2,0,2.4,0,3v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V3z"></path> <path d="M24,11c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V11z"></path> 
                      <path d="M24,19c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1h22c0.6,0,1-0.4,1-1V19z"></path> 
                    </svg>
                  </div> 
                  <div class="submenu-categorias esconder">
                    <ul>
                    <?php $args=array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'post_type' => 'post'
                        );
                        $categories=get_categories($args);
                        foreach($categories as $category) {
                                $linkcat = get_category_link( $category->term_id );
                                $name = $category->name;
                                $catid = get_cat_ID($name);
                                $slug = $category->slug;
                                ?>
                                <li>
                                    <a href="<?php echo bloginfo("url"); ?>/category/<?php echo $slug ?>">
                                        <?php echo $name; ?>
                                    </a>
                                </li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


