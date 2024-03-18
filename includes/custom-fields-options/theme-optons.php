<?php 
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Default options page
$basic_options_container = Container::make( 'theme_options', __( 'Basic Options' ) )
    ->add_fields( array(
        Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script' ) ),
        Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script' ) ),
    ) );

Container::make( 'theme_options', __( 'Options them ' ) )
    ->add_tab('Options', array(
       Field::make('complex','sity_option', 'Укажите представительство')
            ->add_fields(array(
                Field::make('text','sity_blok','Город'),
                Field::make('text','tel_blok','Телефон'),
        ))
    ))

    ->add_tab( __( 'Footer option' ), array(
        Field::make( 'image', 'fb_img', __( 'картинка fb' ) )
        ->set_width( 50 ),
        Field::make( 'text', 'fb_url', __( 'url_fb' ) )
        ->set_width( 50 ),
        Field::make( 'image', 'inst_img', __( 'картинка inst' ) )
        ->set_width( 50 ),
        Field::make( 'text', 'inst_url', __( 'url_inst' ) )
        ->set_width( 50 ),
        Field::make( 'text', 'copy_r', __( 'Копирайт' ) )
        ->set_width( 50 )
    
    ) );

 ?>