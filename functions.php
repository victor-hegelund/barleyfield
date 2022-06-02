<?php

 // enable gutenberg for woocommerce
function activate_gutenberg_product( $can_edit, $post_type ) {
 if ( $post_type == 'product' ) {
        $can_edit = true;
    }
    return $can_edit;
}
add_filter( 'use_block_editor_for_post_type', 'activate_gutenberg_product', 10, 2 );

// enable taxonomy fields for woocommerce with gutenberg on
function enable_taxonomy_rest( $args ) {
    $args['show_in_rest'] = true;
    return $args;
}
add_filter( 'woocommerce_taxonomy_args_product_cat', 'enable_taxonomy_rest' );
add_filter( 'woocommerce_taxonomy_args_product_tag', 'enable_taxonomy_rest' );

// ------
// ------

add_action( 'wp_footer', 'converts_product_attributes_from_select_options_to_div' );
function converts_product_attributes_from_select_options_to_div() {

    ?>
        <script type="text/javascript">

            jQuery(function($){

                // clones select options for each product attribute
                var clone = $(".single-product div.product table.variations select").clone(true,true);

                // adds a "data-parent-id" attribute to each select option
                $(".single-product div.product table.variations select option").each(function(){
                    $(this).attr('data-parent-id',$(this).parent().attr('id'));
                });

                // converts select options to div
                $(".single-product div.product table.variations select option").unwrap().each(function(){
                    if ( $(this).val() == '' ) {
                        $(this).remove();
                        return true;
                    }
                    var option = $('<div class="custom_option is-visible" data-parent-id="'+$(this).data('parent-id')+'" data-value="'+$(this).val()+'">'+$(this).text()+'</div>');
                    $(this).replaceWith(option);
                });
                
                // reinsert the clone of the select options of the attributes in the page that were removed by "unwrap()"
                $(clone).insertBefore('.single-product div.product table.variations .reset_variations').hide();

                // when a user clicks on a div it adds the "selected" attribute to the respective select option
                $(document).on('click', '.custom_option', function(){
                    var parentID = $(this).data('parent-id');
                    if ( $(this).hasClass('on') ) {
                        $(this).removeClass('on');
                        $(".single-product div.product table.variations select#"+parentID).val('').trigger("change");
                    } else {
                        $('.custom_option[data-parent-id='+parentID+']').removeClass('on');
                        $(this).addClass('on');
                        $(".single-product div.product table.variations select#"+parentID).val($(this).data("value")).trigger("change");
                    }
                    
                });

                // if a select option is already selected, it adds the "on" attribute to the respective div
                $(".single-product div.product table.variations select").each(function(){
                    if ( $(this).find("option:selected").val() ) {
                        var id = $(this).attr('id');
                        $('.custom_option[data-parent-id='+id+']').removeClass('on');
                        var value = $(this).find("option:selected").val();
                        $('.custom_option[data-parent-id='+id+'][data-value='+value+']').addClass('on');
                    }
                });

                // when the select options change based on the ones selected, it shows or hides the respective divs
                $('body').on('check_variations', function(){
                    $('div.custom_option').removeClass('is-visible');
                    $('.single-product div.product table.variations select').each(function(){
                        var attrID = $(this).attr("id");
                        $(this).find('option').each(function(){
                            if ( $(this).val() == '' ) {
                                return;
                            }
                            $('div[data-parent-id="'+attrID+'"][data-value="'+$(this).val()+'"]').addClass('is-visible');
                        });
                    });
                });

            });

        </script>
    <?php

}