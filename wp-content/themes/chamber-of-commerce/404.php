<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package chamber_of_commerce
 */

get_header();
?>

	<main id="primary" class="site-main">

		 
		<div class="container flex flex-col justify-center py-20 text-center min-h-[calc(100vh-620px)]">
			<div class="max-w-lg mx-auto">
			<h1 class="mb-5"><?php esc_html_e( 'Error 404 - Not Found', 'chamber-of-commerce' ); ?>  </h1>
			<p class="mb-2"><?php esc_html_e( "Please check the URL for proper spelling and capitalization. If you're having trouble locating a destination, try visiting the:", 'chamber-of-commerce' ); ?></p>
		   <a href="/" target="" class="inline-block mt-7 button-filled__primary">Home Page</a> 
			</div>
		</div>


	</main><!-- #main -->

<?php
get_footer();