<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chamber_of_commerce
 */

 $related_posts = new WP_Query(array(
	'post_type' => 'post',
	'category__in' => wp_get_post_categories(get_the_ID()),
	'post__not_in' => array(get_the_ID()),
	'posts_per_page' => 3,
	'orderby' => 'rand',
	'post_status' => array('publish'),
	'order'    => 'ASC'
));

?>

<div id="post-<?php the_ID(); ?>" class="py-16">
	<div class="container p-12 bg-white rounded card main relative z-[1]">
		<header class="entry-header">
			<div class="my-5 breadcrumbs">
				<a href="/chamber-blog/" class="breadcrumbs">Chamber Blog</a> / <p class="inline breadcrumbs"><?= get_the_title(); ?></p>
			</div>
			<div class="flex items-center mb-4 meta">
					<?php 
					// if (get_post_type($featured->ID) == "news") {
					//     $label = get_the_terms($featured->ID,'news_type')[0]->name;
					// } else {
					//     $label = get_post_type($featured->ID);
					// }
					$label = get_post_type(get_the_ID());
					$slug = get_post_type(get_the_ID());
					?>
					<?php if ($label) { ?><div class="mr-4 label <?= $slug; ?>"><?= $label ?></div><?php } ?>
					<p class="dates"><?= get_the_date('M d, Y',get_the_ID()) ?></p>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="lg:max-w-[90%]">', '</h1>' );
			else :
				the_title( '<h2 class="lg:max-w-[90%]"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="" class="w-full py-8">
		</header><!-- .entry-header -->
		<div class="max-w-full prose main-blog-content">
			<?= the_content(); ?>
		</div>
	</div>
	<div class="container mt-20">
			<div class="bg-forest-DEFUALT absolute mt-[-8rem] z-0 h-[24rem] left-0 w-[90%]"></div>
			<div class="relative">
					<h2 class="pb-10 text-white"><?= esc_html__( 'Related Blogs', 'chamber' ) ?></h2>
					<div class="grid grid-cols-12 gap-5">
						<?php 
							if($related_posts->have_posts()) {
								while($related_posts->have_posts()) : $related_posts->the_post() ?>
									<a href="<?= get_the_permalink($related_posts->ID) ?>" class="flex flex-col col-span-12 bg-white rounded md:flex-row lg:flex-col card lg:col-span-4 hover:card-shadow">
											<img class="md:w-1/2 lg:w-full h-[16rem] object-cover rounded-t" src="<?= get_the_post_thumbnail_url($related_posts->ID,  'medium_large') ?>" alt="">
											<div class="p-8 md:px-8 md:py-4 md:w-1/2 lg:w-full">
													<?php if (!$hide_meta) { ?>
													<div class="flex items-center mb-4 meta">
															<?php if (get_post_type($related_posts->ID) == "news") {
																	$label = get_the_terms($related_posts->ID,'news_type')[0]->name;
																	$slug = get_the_terms($related_posts->ID,'news_type')[0]->slug;
															} else {
																	if (get_post_type($related_posts->ID)  == "post") {
																			$label = 'blog';
																			$slug = 'blog';
																	} else {
																			$label = get_post_type($related_posts->ID);
																			$slug = get_post_type($related_posts->ID);
																	}
															}
															?>
															<div class="mr-4 label <?= $slug; ?>"><?= $label; ?></div>
															<p class="dates"><?= get_the_date('M d, Y',$related_posts->ID) ?></p>
													</div>
													<?php } ?>
													<h3 class="pb-4 leading-8"><?= get_the_title($related_posts->ID) ?></h3>
													<div class="text-dark-body"><?= get_the_excerpt($related_posts->ID) ?></div>
											</div>
									</a>
							<?php 
								endwhile;
								wp_reset_postdata();
								};
							?>
					</div>
					<?php if ($cta) { ?>
					<div class="flex justify-end mt-10 mr-2 lg:mt-20">
							<a href="<?= $cta['url'] ?>" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= $cta['title'] ?></span></a>
					</div>
					<?php } ?>
			</div>
			<div class="flex justify-center mt-5 mr-2 lg:justify-end">
					<a href="/chamber-blog/" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= esc_html__( 'SEE ALL POSTS', 'chamber' ) ?></span></a>
			</div>
	</div>
</div>