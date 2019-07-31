jQuery(document).ready(function ($) {	 

  $(document).on('click','.nc_taxonomy_img_upload',function(e) {
    e.preventDefault();

    var _this=$(this),
    _wrapper=$(this).parent(),
    _field=_wrapper.find('.nc_taxonomy_img_upload').data('name');
    _ajax_url=$('.nc-taxonomy-meta-image-field').data('ajax-url'),
    _frame_args = {
      multiple: false,
      title: 'Select Media',
    };

    var NCTAX_Frame = wp.media( _frame_args );

    NCTAX_Frame.on('select',function() {

      var selection = NCTAX_Frame.state().get('selection'),
      _data = selection.first(),
      _file_holder = _wrapper.find( '.image_placeholder_wrap' );

      $(_wrapper).find( '.nc_taxonomy_meta_media_upload' ).val( _data.id );

      _this.hide(); 

      NCTAX_Frame.close();

      _file_holder.siblings('.remove').show();

      var _type = _wrapper.closest( '.field-data' ).attr( 'data-type' ),
      _ajax_data={id:_data.attributes.id,action:'nc_taxonomy_meta_image'};

      if('media'===_type)
      {
        $.ajax({
          url: _ajax_url,
          method: 'POST',
          data: _ajax_data,
          dataType: 'html',
          success: function(src){

            $( '<img />', { src: src } ).prependTo( _file_holder );
            _wrapper.find('.nc_taxonomy_img_id').val(_data.attributes.id);
            _wrapper.find('.nc_taxonomy_img_url').val(src);

          },
          error:function(){

            $( '<img />', { src: data.attributes.icon } ).prependTo( _file_holder );

          }

        })
      }
    });

    NCTAX_Frame.open();
  });

  $(document).on('click','.remove',function(){

    var remove_id=$(this).data('id');
    if(remove_id){

      var _wrapper=$(this).parent();

      _wrapper.find('.image_placeholder_wrap').html('');
      _wrapper.find('.nc_taxonomy_img_upload').show();
      _wrapper.find('.remove').hide();
      _wrapper.find('.nc_taxonomy_img_id').val('');
      _wrapper.find('.nc_taxonomy_img_url').val('');

    }

  });

});

