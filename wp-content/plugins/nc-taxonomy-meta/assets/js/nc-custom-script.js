
jQuery(document).ready(function ($) {	 
  $(".meta_box_multiple_fields").hide();
  
  $("#meta_type").on('change',function(){
    var item_id=this.value;

    if(item_id=='radio' || item_id=='selectbox' || item_id=='checkbox')
    {
      $(".meta_box_multiple_fields").show(500); 
    }
    else{
      $(".meta_box_multiple_fields").hide(500);
    }

    if(item_id =='text' || item_id=='selectbox' || item_id=='textarea' )
    {

      $(".meta_is_required").show();
    }
    else
    {
      $(".meta_is_required").hide();
    }
    
  });


$('#submit').mousedown( function() {
    tinyMCE.triggerSave();
  }); 

  /* clear form after submit*/
  $( document ).ajaxComplete(function( event, xhr, settings ) {
    try{
      $response = $.parseXML(xhr.responseText);

      //exit on error
      if ($($response).find('wp_error').length) return;
      
      $($response).find('response').each(function(i,e){

        if ($(e).attr('action').indexOf("add-tag") > -1){

          var term_id = $(e).find('term_id');
          if (term_id){
            nc_taxonomy_clear_form("form#addtag");
          }
        }
      });
    }catch(err) {}
  });

});

/*clear form function*/
function nc_taxonomy_clear_form(form_name){

  var $=jQuery.noConflict();

  $(form_name+' input[type="text"]').val('');
  $(form_name+' textarea').val('');

    //image upload
    $(form_name+' .image_placeholder_wrap').html('');
    $(form_name+' .remove').hide('');
    $(form_name+' .nc_taxonomy_img_id').val('');
    $(form_name+' .nc_taxonomy_img_url').val('');
    $(form_name+' .nc_taxonomy_img_upload').show();

    //selectbox
    $(form_name+' select').val('');

    //checkboxes
    $( form_name+" input[type='checkbox']").prop('checked',false);

    //radio
    $( form_name+" input[type='radio']").prop('checked',false);

    //reset editor
    $(form_name+"  textarea.nc_taxonomy_textarea").each(function() {
     var textarea_id=$(this).attr('id');
     tinymce.get(textarea_id).setContent('');
   });
  }