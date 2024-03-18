<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

             global $woo_options;
			 $args = array(
				'post_type'   => 'product',
				'show_past_auctions' => TRUE,
				'tax_query' => array(array('taxonomy' => 'product_type' , 'field' => 'slug', 'terms' => 'auction')),
				'meta_query' => array(
						array(
							'key' => '_auction_closed',
							'operator' => 'EXISTS',
						)
								
					
					),
				'auction_arhive' => TRUE,
				'show_past_auctions' => TRUE
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

<?php do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_auctions_settings_form_start' ); ?>
	 <?php
	 	$user_auctions_closing_soon_emails = get_user_meta(get_current_user_id(), 'auctions_closing_soon_emails', true) !== '0' ? '1' : '0';
	 	woocommerce_form_field( 'auctions_closing_soon_emails', array(
        'type'          => 'checkbox',
        'class'         => array('input-checkbox'),
        'label'         => esc_html__('Get email notification for my auctions ending soon', 'wc_simple_auctions'),
        'required'  => false,
        'default' => 1
        ), $user_auctions_closing_soon_emails );

       ?>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_auctions_settings_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_auctions_settings' ); ?>
		<input type="submit" class="woocommerce-Button button" name="save_auctions_settings" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
		<input type="hidden" name="action" value="save_auctions_settings" />
	</p>

	<?php do_action( 'woocommerce_auctions_settings_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_auctions_settings_form' ); ?>
