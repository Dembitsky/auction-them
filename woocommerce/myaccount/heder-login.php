<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<?php endif; ?>
	
		<form class="login__form" action = " <?php site_url ( '/wp-login.php/' ) ;  ?> "method="post">
			<h3>Pieslēgšanās</h3>
			<?php do_action( 'woocommerce_login_form_start' ); ?>

				<input type="text" class="mail" placeholder="E-pasta adrese" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						
				<input class="pass" type="password" placeholder="Parole" name="password" id="password" autocomplete="current-password" />


			<?php do_action( 'woocommerce_login_form' ); ?>
			<p class="woocommerce-LostPassword lost_password">
				<a class="pass-relo" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Aizmirsta parole', 'woocommerce' ); ?></a>
			</p>

			<button type="submit" class="btn__oke" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Pieslēgties', 'woocommerce' ); ?></button>
			
			<p class="pass__rename">
				Nav profils?	
				<a href="<?php echo get_permalink(118);  ?>" title="Reģistrējies">Reģistrējies</a> 
			</p>
			

			<?php do_action( 'woocommerce_login_form_end' ); ?>

			

		</form>



<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
