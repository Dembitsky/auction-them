<?php 
/* Template Name: sakuma-lapa

*/
get_header();

?>

<div class="container">		
	<div class="orbery__btn">
		<div class="tab">
			<button class="btn__active active" onclick="openTabs(event, 'auctions')">Rāda aktīvās</button>
			<button class="btn__active" onclick="openTabs(event, 'close')">Rādīt beigušās</button>
		</div>
	<div>		
	<div id="auctions" class="tabcontent">
		<?php
				global $woo_options;
				$args = array(
				'post_type'   => 'product',
				'show_past_auctions' => TRUE,
				'posts_per_page'     => 9,
				'tax_query' => array(array('taxonomy' => 'product_type' , 'field' => 'slug', 'terms' => 'auction')),
				'meta_query' => array(
						array(
							'taxonomy' => 'product_type',
							'field'    => 'slug',
							'terms'    => 'auction'
						)
								
					
					),
				'auction_arhive' => false,
				'show_past_auctions' => false
				);     
			
			$the_query  = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
					
			?>                                                           
				
				<?php  do_action( 'woocommerce_before_shop_loop' ); ?>

				<?php woocommerce_product_loop_start(); ?>

					

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php

					do_action( 'woocommerce_after_shop_loop' );
				?>

			
				</article><!-- /.post -->
		<?php endif; // End IF Statement ?>  
	</div>			
	<div id="close" class="tabcontent">
			<?php echo do_shortcode( '[past_auctions]' );?>	
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

<?php do_action( 'woocommerce_sidebar' );?>

<?php get_footer('shop');?>