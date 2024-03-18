<?php

use Carbon_Fields\Widget;
use Carbon_Fields\Field;


class AuctionWidgetButton extends Widget {

    function __construct() {
        $pages = get_pages();

        $pags[0] = 'Показать все';

        if ($pages){
            foreach ($pages as $page){
                $pags[get_page_link( $page->ID )]= esc_html($page->post_title);
            }
        }
        $this->setup( 'Auction_widget_button', 'Кнопки снизу', 'Displays a block with title/text', 
        array(
            Field::make( 'text', 'text_btn_au', __( 'Текст кнопки 2' ) ),
            Field::make( 'text', 'txt_btn_login', 'Текст на кнопке входа' )->set_default_value( 'текст') ,
            Field::make( 'text', 'text_btn_uplog', 'Текст кнопка выход' )->set_default_value( 'текст'), 
            Field::make( 'select', 'url_select', __( 'Choose Options' ) )
            ->set_options( $pags)
            
        ) );
    }
   
    function front_end($args, $instance, $redirect = '', $echo = true)
    {   
        if( !empty ($instance['text_btn_au'] && $instance['txt_btn_login'] && $instance['text_btn_uplog'] && $instance['url_select'] )){


            if ( ! is_user_logged_in() ) {
                $link = '<a class="sidebar__login" href="' . esc_url( home_url( '/my-account/' )  ) . '">' . __(  $instance['txt_btn_login']  ) . '</a>';
                echo '<a class="sidebar__url" href="'.$instance['url_select'].'">'. $instance['text_btn_au'] .'</a>';
            } else {
                $link = '<a class="sidebar__login" href="' . esc_url( wp_logout_url( $redirect ) ) . '">' . __( $instance['text_btn_uplog'] ) . '</a>';
            }
            if ( $echo ) {
                echo apply_filters( 'loginout', $link );
            } else {
    
                return apply_filters( 'loginout', $link );
            }

        }
           
    }

}


add_action('widgets_init', 'load_widget_woo');
function load_widget_woo (){
    register_widget('AuctionWidgetButton');
}



?>