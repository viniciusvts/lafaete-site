<?php
if (!defined('ABSPATH')){
    exit; // Exit if accessed directly
  }
  ?>
  <div class="wrap nosubsub">
    <h1><?php _e('NC Taxonomy Meta',self::$textdomain); ?></h1>
    <br class="clear" />
    <div id="col-container">
      <div id="col-right">
        <div class="col-wrap">
          <table class="wp-list-table widefat fixed striped tags">
            <thead>
             <tr>
              <td   class='manage-column column-cb check-column'></td>
              <th scope="col"  class='manage-column column-name column-primary sortable desc'><a><span><?php _e('Name',self::$textdomain); ?></span></a></th>
              <th scope="col"  class='manage-column column-description sortable desc'><a ><span><?php _e('Meta Type',self::$textdomain); ?></span></a></th>
              <th scope="col"  class='manage-column column-description sortable desc'><a ><span><?php _e('Meta ID',self::$textdomain); ?></span></a></th>
              <th scope="col"  class='manage-column column-slug sortable desc' colspan="2"><a><span><?php _e('Taxonomy',self::$textdomain); ?></span></a></th>
            </tr>
          </thead>
          <tbody id="the-list" data-wp-lists='list:tag'>
            <?php
            $data=$this->nc_taxonomy_meta_display_meta(); 
            if($data){
             foreach($data as $data_new)
             {
              ?>
              <tr id="tag-1">
                <th scope="row" class="check-column">&nbsp;</th>
                <td class='name column-name has-row-actions column-primary' data-colname="name"><strong><a><?php echo $data_new->meta_name; ?></a></strong><div class="row-actions"><span class='inline hide-if-no-js'><a href="<?php echo admin_url('options-general.php?page=nc_taxonomy_meta'); ?>&delete_meta=<?php echo $data_new->id; ?>" class="editinline">Delete</a> </span></div><br />

                </td>
                <td class='description column-description' data-colname="type"><?php echo $data_new->meta_type; ?></td>
                <td class='description column-description' data-colname="type"><?php echo $data_new->meta_id; ?></td>
                <td class='slug column-slug' data-colname="taxonomy" colspan="2" >
                  <?php echo $this->nc_taxonomy_meta_display_taxonomy($data_new->id); ?></td>

                </tr>
                <?php
              }
            }
            else{

              echo ' <tr id="tag-1"><td colspan="6">'.__('No items found::',self::$textdomain).'</td></tr>'  ;
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td   class='manage-column column-cb check-column'></td>
              <th scope="col"  class='manage-column column-name column-primary sortable desc'><a><span><?php _e('Name',self::$textdomain); ?></span></a></th>
              <th scope="col"  class='manage-column column-description sortable desc'><a ><span><?php _e('Meta Type',self::$textdomain); ?></span></a></th>
              <th scope="col"  class='manage-column column-description sortable desc'><a ><span><?php _e('Meta ID',self::$textdomain); ?></span></a></th>
              <th scope="col"  class='manage-column column-slug sortable desc' colspan="2"><a><span><?php _e('Taxonomy',self::$textdomain); ?></span></a></th>
            </tr>
          </tfoot>
        </table>
        <br class="clear" />
        <p class="description"><?php printf(__(' use  %s to display meta fields.',self::$textdomain),'nc_tax_meta($term_id,"field_id")'); ?></p>
      </div>
    </div>
    <!-- /col-right -->
    <div id="col-left">
      <div class="col-wrap">
        <div class="form-wrap">
          <h3><?php _e('Add New',self::$textdomain); ?></h3>
          <form id="posts-filter" method="post" action="<?php admin_url( 'options-general.php?page=nc_taxonomy_meta' ); ?>">
            <div class="form-field form-required meta_name">
              <label for="meta-name"><?php _e('Meta Name',self::$textdomain); ?></label>
              <input name="meta_name" id="meta-name" type="text" value="" size="40" aria-required="true" required="required" />
              <p><?php _e('The name of the meta.',self::$textdomain); ?></p>
            </div>

            <div class="form-field form-required meta_id">
              <label for="meta-name"><?php _e('Meta ID',self::$textdomain); ?></label>
              <input name="meta_id" id="meta-id" type="text" value="" size="40" aria-required="true"  />
              <p><?php _e('The id of the meta.',self::$textdomain); ?></p>
            </div>

            <div class="form-field form-required meta_name">
              <label for="meta-name"><?php _e('Meta Field Description',self::$textdomain); ?></label>
              <input name="meta_field_description" id="meta-field-description" type="text" value="" size="40" aria-required="true" />
              <p><?php _e('The meta field description.',self::$textdomain); ?></p>
            </div>
            <div class="form-field meta_type">
              <label for="meta type"><?php _e('Meta Type',self::$textdomain); ?></label>

              <?php echo $this->nc_taxonomy_meta_types(); ?>

              <p><?php _e('Select Meta Type',self::$textdomain); ?></p>
            </div>
            <div class="form-field meta_box_multiple_fields">
            <label for="select items"><?php _e('Items',self::$textdomain); ?></label>
              <textarea id="nc_taxonomy_meta_select_repeat" cols="40" rows="5" name="nc_taxonomy_meta_multiple_item"></textarea>
              <p><?php _e('Please enter ietms repeating with comma (,) seperated.',self::$textdomain); ?></p>
            </div>
            <div class="form-field meta_taxonomy">
              <label for="parent"><?php _e('Taxonomy',self::$textdomain); ?></label>
              <select name='meta_taxonomy[]' id='meta_taxonomy' class='meta_taxonomy'  style="width:95%" multiple="multiple" required="required" >
                <?php echo $this->nc_taxonomy_meta_taxonomy_list(); ?> </select>
                <p><?php _e('Select multiple items',self::$textdomain); ?></p>
              </div>
               <div class="form-field meta_is_required">
              <input type="checkbox" name="meta_field_is_required" value="1">
              <?php _e('Tick if this field is required.',self::$textdomain); ?>
              </div>
              <p class="submit">
              <input type="hidden" name="nc_taxonomy_nonce" value="<?php echo wp_create_nonce( 'nc_taxonomy_nonce' ); ?>">
                <input type="submit" name="nc_taxonomy_meta_submit" id="submit" class="button button-primary" value="<?php _e('Add Meta Field',self::$textdomain) ?>"  />
              </p>
            </form>
          </div>
        </div>
      </div>
      <!-- /col-left -->

