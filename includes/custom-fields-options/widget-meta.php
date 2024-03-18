<?php

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class AuctionWidgetBanner extends Widget {
    // Register widget function. Must have the same name as the class
    function __construct() {
        $this->setup( 'Auction_widget_Banner', 'Баннер для footer', 'Displays a block with title/text', 
        array(
            Field::make( 'text', 'baner_title', 'Title' )->set_default_value( 'Тайтел текст') ,
            Field::make( 'text', 'text_btn', 'text_btn' )->set_default_value( 'Кнопка текст') ,
            Field::make( 'text', 'url_btn', '' )->set_default_value( 'Url для кнопки') ,
            Field::make( 'text', 'ls1_title', 'Лист 1' )->set_default_value( 'Тайтел текст к иконкам ') ,
            Field::make( 'text', 'ls2_title', 'Лист 2' )->set_default_value( 'Тайтел текст к иконкам ') ,
            Field::make( 'text', 'ls3_title', 'Лист 3' )->set_default_value( 'Тайтел текст к иконкам ') ,
            Field::make( 'image', 'icon1_footer', 'Иконка 1' ),
            Field::make( 'image', 'icon2_footer', 'Иконка 2' ),
            Field::make( 'image', 'icon3_footer', 'Иконка 3' ),
            Field::make( 'image', 'bg_img_footer', 'Фото' )
        ) );
    }

    function front_end($args, $instance)
    {   
        if( !empty ($instance['bg_img_footer'])){
            $bg_img_footer = wp_get_attachment_image_url($instance['bg_img_footer'],'full');
            echo '<div class="footer__banner" style="background-image: url('. $bg_img_footer . ');">'; 
        }
        echo '<div class="container">
                    <div class="banner__wrapp">
                        <div class="banner__item">';
        if( !empty ($instance['baner_title'])){            
                    echo $args ['before_title'] . $instance['baner_title'] .$args['after_title'];
        }
        if( !empty ($instance['text_btn']  && $instance['url_btn'])){
            echo'<a href="'.$instance['url_btn'] .'" class="banner__btn">' . $instance['text_btn'] .'</a>';
        }
        echo '</div> <div class="banner__text">';
        if( !empty ($instance['ls1_title']  && $instance['icon1_footer'])){
            $icon1_footer = wp_get_attachment_image_url($instance['icon1_footer'],'full');
            echo'<div class="banner__inner"> <img src="'.$icon1_footer .'" alt="">
            <div class="banner__list">'.$instance['ls1_title'].'</div></div>';
        }
        if( !empty ($instance['ls2_title']  && $instance['icon2_footer'])){
            $icon2_footer = wp_get_attachment_image_url($instance['icon2_footer'],'full');
            echo'<div class="banner__inner"> <img src="'.$icon2_footer .'" alt="">
            <div class="banner__list">'.$instance['ls2_title'].'</div></div>';
        }
        if( !empty ($instance['ls3_title']  && $instance['icon3_footer'])){
            $icon3_footer = wp_get_attachment_image_url($instance['icon3_footer'],'full');
            echo'<div class="banner__inner"> <img src="'.$icon3_footer .'" alt="">
            <div class="banner__list">'.$instance['ls3_title'].'</div></div>';
        }
       
                    
        echo'                </div>
                    </div>
                </div>
            </div>';

    }

}


add_action('widgets_init', 'load_widget');
function load_widget (){
    register_widget('AuctionWidgetBanner');
}



?>