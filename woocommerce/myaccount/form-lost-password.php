<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>
<div class="wrapp__reset">
<div class="reset__title">Paroles atjaunošana</div>
<div class="rezet__login"><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lūdzu ievadiet sava profila reģistrēto e-pastu.
Mēs nosūtīsim atkopšanās saiti, lai varat atjaunot savu paroli.', 'woocommerce' ) ); ?></div><?php // @codingStandardsIgnoreLine ?>
</div>
<form method="post" class="woocommerce-ResetPassword lost_reset_password">

	

	<div class="item__login">
		<label for="user_login"><?php esc_html_e( 'Reģistrētais e-pasts', 'woocommerce' ); ?></label>
		<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
	</div>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<div class="item__login">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Sūtīt atkopšanās saiti', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
	</div>

	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

</form>
<?php
do_action( 'woocommerce_after_lost_password_form' );
