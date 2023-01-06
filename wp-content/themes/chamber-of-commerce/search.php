<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package chamber_of_commerce
 */

get_header();
?>

	<main id="primary" class="py-10 site-main bg-gray-topbar">
		<div class="container">
				<div class="flex flex-col-reverse p-6 bg-white rounded lg:p-10 lg:grid lg:grid-cols-12 lg:gap-4">
					<div class="col-span-8 mt-6 lg:mt-0">

						<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title h3 lg:h2">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'chamber-of-commerce' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->
							
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

						endif;
						?>
				</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();