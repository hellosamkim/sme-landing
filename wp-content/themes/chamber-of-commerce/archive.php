<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chamber_of_commerce
 */

get_header();
?>

	<main id="primary" class="site-main bg-gray-light">
		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php
get_footer();
