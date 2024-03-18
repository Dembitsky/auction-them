<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$pages = get_pages();

$pags[0] = 'Показать все';

if ($pages){
    foreach ($pages as $page){
        $pags[get_page_link( $page->ID )]= esc_html($page->post_title);
    }
}


Container::make( 'post_meta', 'Слайдер страниц' )
    ->where( 'post_id', '=',  '180'  )
    ->add_fields( array(
        Field::make( 'text', 'text_slid', __( 'Текст под заголовком' ) ),
        Field::make( 'complex', 'crb_slider', __( 'Slider' ) )
        ->add_fields( array(
            Field::make( 'image', 'photo', __( 'Slide Photo' ) ),
            Field::make( 'text', 'sl_title', __( 'Заголовком' ) ),
            Field::make( 'text', 'sl_text', __( 'Описание' ) ),
            Field::make( 'select', 'crb_select', __( 'Choose Options' ) )
            ->set_options( $pags)
        ) )
    ));



?>