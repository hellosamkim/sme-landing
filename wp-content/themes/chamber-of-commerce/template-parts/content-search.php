<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chamber_of_commerce
 */

?>

<article id="post-<?php the_ID(); ?>" class="mt-5">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="leading-tight entry-title hover:underline text-primary h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			chamber_of_commerce_posted_on();
			chamber_of_commerce_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<!-- <?php chamber_of_commerce_post_thumbnail(); ?> -->

	<div class="entry-summary text-gray">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

 
</article>