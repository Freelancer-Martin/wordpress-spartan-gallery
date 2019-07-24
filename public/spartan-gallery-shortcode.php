<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


function spartan_gallery_shortcode($atts = [], $content = null, $tag = '')
{


      // normalize attribute keys, lowercase
     $atts = array_change_key_case((array)$atts, CASE_LOWER);

     // override default attributes with user attributes
     $wporg_atts = shortcode_atts([
                                      'page_id' => '1',
                                  ], $atts, $tag);

     // start output
     $shortcode_container = '';
     $page_id = $wporg_atts['page_id'];
     // start box

     $shortcode_container .= '<div class="spartan-gallery-box">';
     //$page_id = $wporg_atts['page_id'];
     $args = array( 'post_type' => 'spartan_gallery_type', 'posts_per_page' => -1, 'page_id' => $page_id );
       $loop = new WP_Query( $args );
       if ( $loop->have_posts() ) : $loop->the_post();

      $args = array(
        'post_type'   => 'attachment',
        'numberposts' => -1,
        'post_parent' => $page_id,
        'post_status' => null,
        'meta_query'  => array(
          array(
            'key'     => 'spartan_gallery',
            'compare' => '=',
          )
        )

      );

      $attachments = get_posts( $args );


      $my_meta_options = get_post_meta( $attachments[0]->post_parent , 'spartan-gallery-meta', true ); // array
      //$my_options = get_option( 'spartan-gallery-meta' );
      //print_r( $my_meta_options );

      //$o .= Generated_CSS_Output::output_php_Css( $attachments  );


      switch ( $my_meta_options['image_layout_select'] ) {
        case 'value-1':
          $shortcode_container .= Freewall_Chaotic_Container::display_chaotic_html_container( $attachments  );
        break;
        case 'value-2':
          $shortcode_container .= Freewall_Random_Container::display_random_container( $attachments  );
        break;
        case 'value-3':
          $shortcode_container .= Freewall_Fixed_Img_Container::display_fixed_img_container( $attachments  );
        break;
        case 'value-4':
          $shortcode_container .= Freewall_Pinterest_Container::display_pinterest_container( $attachments  );
        break;
        case 'value-5':
          $shortcode_container .= Spartan_Gallery_Hexagon::hexagon_html_container( $attachments );
        break;
        case 'value-6':
          $shortcode_container .= ThreeD_Image_Slider::ThreeDImageSlidet_Html_container( $attachments );
        break;
      }



       endif;



     // end box
     $shortcode_container .= '</div>';

     // return output
     return $shortcode_container;
}

function spartan_gallery_shortcodes_init()
{
    add_shortcode('spartan_gallery', 'spartan_gallery_shortcode');
}

add_action('init', 'spartan_gallery_shortcodes_init');
