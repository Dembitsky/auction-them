<?php 
/* Template Name: sakuma-lapa-home

*/
get_header();

?>

<div class="container">
    <div class="pag_wrap">  
            <div class="pag__title"><?php the_title()?></div>
            <div class="pag__text"><?php echo carbon_get_the_post_meta('text_slid'); ?></div>
        </div>

    <div class="slider__cat">
        <div class="slider__wrapp">
        <?php 
            $slides = carbon_get_post_meta( get_the_ID(), 'crb_slider' );
 
            if( $slides ) {
                foreach( $slides as $slide ) {
                   
                    if( ! $slide[ 'photo' ] ) {
                        continue; 
                    }
                    echo '<a href="'. $slide['crb_select'] .'" class="slider__card">';
                    $bg_foto = wp_get_attachment_image_url($slide[ 'photo' ] ,'full');
                    if( $slide[ 'sl_text' ] && $slide['sl_text']) { 
                        echo '<div class="slider__title">'. $slide[ 'sl_title' ] .'</div>';
                        echo '<div class="slider__text">'. $slide[ 'sl_text' ] .'</div>';
                        
                    }
                    echo ' <img src="'. $bg_foto .'" alt="">';
                    echo '</a>';
                }
            }
        ?>
        </div>
    </div>
		
	<div class="orbery__btn">
					<?php
					// 		$catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
							
					// 		'menu_order' => __( 'Default sorting', 'woocommerce' ),

					// 		'auction_activity'      => __( 'Rāda aktīvās' ),

					// 		'auction_end' => __( 'Rādīt beigušās' )
					// 	) );
					// 	$catalog_orderby[ 'auction_activity' ] = 'Rāda aktīvās';
					// 	$catalog_orderby[ 'auction_end' ] = 'Rādīt beigušās';
						
					// 	if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
					// 		unset( $catalog_orderby['rating'] );
					// 		unset( $catalog_orderby['bid_asc'] );
	   				// 		unset( $catalog_orderby['bid_desc'] );
					// 		unset( $catalog_orderby['auction_started'] );
					// 		unset( $catalog_orderby['menu_order'] );

					// 		foreach ( $catalog_orderby as $id => $name )
    				// echo '<a class="btn__active" href="' . get_permalink( wc_get_page_id( 'shop' ) ) . '?orderby=' . $id . '" >' . esc_attr( $name ) . '</a></li>';
						?>
			</div>
  
    <div class="page__content">

        <?php 
        		while ( have_posts() ) :
                    the_post();
        
                    get_template_part( 'template-parts/content', get_post_type() );
        
    
    
        
                endwhile; // End of the loop.
    ?>
        </div>
</div>
<div class="page__content">

<?php 
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', get_post_type() );




        endwhile; // End of the loop.
?>
</div>
<?php do_action( 'woocommerce_sidebar' );?>

<?php get_footer('shop');?>