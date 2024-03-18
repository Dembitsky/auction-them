<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package auction-them
 */

?>

<footer class="footer">
        <div class="container">
            <div class="footer__wrapper">
			<div class="footer__item">
				<a class="nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<div class="wrapper__inner">
						<?php 

							if( 
								function_exists( 'carbon_get_theme_option' ) 
								&& ( $id_fb = carbon_get_theme_option('fb_img') ) 
							) 
							if( 
								function_exists( 'carbon_get_theme_option' ) 
								&& ( $id_inst = carbon_get_theme_option('inst_img') ) 
							) 
						$fb_url = wp_get_attachment_image_url( $id_fb, 'full' );
						$inst_url = wp_get_attachment_image_url( $id_inst, 'full' );
						?>
                        <div class="fb__url"><a href="<?php echo carbon_get_theme_option( 'fb_url' ); ?>"><img src="<?php echo $fb_url ?>" alt=""></a></div>
                        <div class="ins__url"><a href="<?php echo carbon_get_theme_option( 'inst_url' ); ?>"><img src="<?php echo $inst_url ?>" alt=""></a></div>
				</div>
				<div class="footer__cop"><?php echo carbon_get_theme_option( 'copy_r' ); ?></div>
				
			</div>
			<div class="footer__item">
				<?php
					wp_nav_menu(
					array(
						'theme_location' => 'menu-footer',
						'container'      => false,
						'items_wrap'      => '<ul class="footer__list">%3$s</ul>',
					)
				);
				?>
			</div>
			<div class="footer__item">
				<?php
					wp_nav_menu(
					array(
						'theme_location' => 'menu-footer-colum-3',
						'container'      => false,
						'items_wrap'      => '<ul class="footer__list">%3$s</ul>',
					)
				);
				?>
			</div>
			<?php dynamic_sidebar( 'col_foot4' ); ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
