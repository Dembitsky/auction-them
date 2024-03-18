<?php 
/* Template Name: Contact

*/
get_header();

?>
<div class="container">
        <div class="title__reg">
            <h1><?php the_title()?></h1>
        </div>
    <div class="contact">
        <?php the_content()?>
    </div>
</div>

<?php get_footer();?>