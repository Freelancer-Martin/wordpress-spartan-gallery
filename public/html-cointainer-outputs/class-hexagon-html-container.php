<?php
if ( ! defined( 'WPINC' ) ) {

    die;

}


Class Spartan_Gallery_Hexagon {


  static function hexagon_html_container( $attachments ) {



    echo '<div class="spartan-gallery-wrapper" style="position: relative;width: 100%;" >';
      echo '<div class="masonary" >';
        echo '<ul >';
          foreach ( $attachments as $attachments_id => $attachments_val ) {
                $img_size = array( '120', '160', '180', '240', '280', '320'   );
                $image_options = get_post_meta( $attachments_val->post_parent , 'spartan-gallery-meta', true ); // array
                $image_attributes = wp_get_attachment_image_src( $attachments_val->ID , $size = $image_options['thumbnail_size']  );
                echo  '<li class="hex">';
                  echo    '<a class="js-img-viwer hexIn" data-caption="Title" data-id="'.$attachments_id.'" href="'.$attachments_val->guid.'">';
                          if ( $image_options['display_original'] == 'on' and $image_options['thumbnail_options'] == 'off' ) {

                            echo '<img style="height:100%;  width:100%;" src="'.$attachments_val->guid.'"  />';

                          } elseif ( $image_options['thumbnail_options'] == 'on' and $image_options['display_original'] == 'off' ) {

                            echo '<img style="height:100%;  width:100%;" src="'.$image_attributes[0].'"  />';

                          } else
                          {
                            $text =  '<p>Image Options => "Display Original Size Image" or "Display Thumnail Size" settings are turned on or off same time</p>';
                            print $text;
                            return;
                          }
                          if( ! empty( implode(get_post_meta( get_the_ID(),"imgtitle" . $attachments_val->ID))) ) {
                            echo '<h1 >'.esc_html(implode(get_post_meta( get_the_ID(),"imgtitle" . $attachments_val->ID) ) ).'</h1>';
                          }

                          if( ! empty( implode(get_post_meta( get_the_ID(),"imgdescription" . $attachments_val->ID))))  {
                            echo '<p >'.esc_html(implode(get_post_meta( get_the_ID(),"imgdescription" . $attachments_val->ID) ) ).'</p>';
                          }

                          if( ! empty( implode(get_post_meta( get_the_ID(),"button_url_buttonurl" . $attachments_val->ID))) ) {
                            echo('<td colspan="3" style="background-color:#005673; text-align:right; padding: 4px 0px;">
                              <button class="spartan-gallery-img-button text" onclick="parent.open(\'' . esc_url(implode(get_post_meta( get_the_ID(),"button_url_buttonurl" . $attachments_val->ID))) . '\')" >'.esc_html(implode(get_post_meta( get_the_ID(),"button_url_buttontitle" . $attachments_val->ID) ) ).'</button></td>');
                          }

                      echo '</a>';
                  echo '</li>';
            }
          echo '</ul>';
        echo '</div>';
      echo '</div>';



    }
}
