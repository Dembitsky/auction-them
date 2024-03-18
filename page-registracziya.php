<?php
/**
 * The template for displaying all registration
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auction-them
 */

get_header();
?>

<div class="container">
    <main class="main">
       
		<?php
         get_template_part( 'template-parts/reg', get_post_type() );
		
		?>

	</main><!-- #main -->
</div>
<?php

get_footer();

?>