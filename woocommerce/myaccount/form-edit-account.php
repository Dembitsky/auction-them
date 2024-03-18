<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	<div class="wrapper__reg">
		<div class="itemwoo__input">
			<div class="form__title">
				<div class="edit__title">Jūsu profila dati</div>
				<div class="edit__text">Esat reģistrējies kā juridiska persona: SIA”AZY”</div>
			</div>
			<div class="itemwoo__wrapp">
				<div class="item__input">
					<label for="account_first_name"><?php esc_html_e( 'Vārds', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
				</div>
				<div class="item__input">
					<label for="account_last_name"><?php esc_html_e( 'Uzvārds', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
				</div>
			</div>
			<div class="itemwoo__wrapp">
				<div class="itemneme__input">
					<label for="account_display_name"><?php esc_html_e( 'Kontakttālrunis', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
				</div>
				<div class="item__input">
					<label for="account_email"><?php esc_html_e( 'E-pasta adrese', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
				</div>
			</div>
			<div class="itemsub__input">
				<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" id="save_account" name="save_account_details" value="<?php esc_attr_e( 'Sagalabāt', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
				<input type="hidden" name="action" value="save_account_details" />
			</div>
		</div>
		<div class="item-regpass">
			<div class="form__title">	
				<div class="edit__title">Parole</div>
				<div class="edit__text">Jums ir iespēja nomainīt sava profila pieejas paroli</div>
			</div>
			<div class="item__input">
				<label for="password_current"><?php esc_html_e( 'Parol', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
			</div>
			<div class="item__input">
				<label for="password_1"><?php esc_html_e( 'Ievadiet esošo paroli', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
			</div>
			<div class="item__input">
				<label for="password_2"><?php esc_html_e( 'Ievadiet jauno paroli', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
			</div>
		</div>
	</div>	
	<?php do_action( 'woocommerce_edit_account_form' ); ?>
	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
