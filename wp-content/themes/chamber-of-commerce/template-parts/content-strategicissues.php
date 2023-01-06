<?php
/**
 * Template part for displaying strategic issues posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chamber_of_commerce
 */

$related_posts = new WP_Query(array(
	'post_type' => 'strategicissues',
	'category__in' => wp_get_post_categories(get_the_ID()),
	'post__not_in' => array(get_the_ID()),
	'post_status' => array('publish'),
	'posts_per_page' => 3,
	'orderby' => 'rand',
	'order'    => 'ASC'
));

?>

<section class="relative text-white hero bg-forest-DEFUALT">
    <div class="lg:container flex flex-col items-center justify-center md:flex md:flex-row md:min-h-[500px] relative z-10">
        <div class="container order-2 w-full py-16 md:order-1 md:w-1/2 lg:pr-10">
            <div class="content">
								<?php if (apply_filters( 'wpml_current_language', NULL ) == "fr") {
								?> <h5 class="pb-3 text-white uppercase"><a href="/fr/interventions/"><?= esc_html__( 'Interventions', 'chamber' ) ?></a> / <a href="/fr/interventions/enjeux-strategiques/"><?= esc_html__( 'Enjeux stratégiques', 'chamber' ) ?></a> / <p class="inline opacity-50 text-gray-light"><?= get_the_title(); ?></p></h5> <?php 	
								} else {
								?> <h5 class="pb-3 text-white uppercase"><a href="/advocacy/"><?= esc_html__( 'Advocacy', 'chamber' ) ?></a> / <a href="/advocacy/strategic-issues/"><?= esc_html__( 'Strategic Issues', 'chamber' ) ?></a> / <p class="inline opacity-50 text-gray-light"><?= get_the_title(); ?></p></h5> <?php 	
								}
								?>
                <?php
								if ( is_singular() ) :
									the_title( '<h1 class="pb-6">', '</h1>' );
								else :
									the_title( '<h2 class="pb-6"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								endif;
								?>
                <p class="text-white subtitle"><?= get_the_excerpt(); ?></p>
							</div>
        </div>
        <div class="relative order-1 overflow-hidden lg:ml-0 lg:mr-0 md:order-2 md:w-1/2">
                        
            <img class="md:hidden" src="<?php if (get_the_post_thumbnail_url($post->ID)) { echo get_the_post_thumbnail_url($post->ID); } else { echo get_template_directory_uri(). '/src/images/placeholder-image.jpeg'; } ?>" alt="">
                    </div>
    </div>
    <div class="absolute top-0 left-0 flex-row hidden w-full h-full md:flex">
        <div class="order-1 w-full md:w-1/2 md:mr-20">
            &nbsp;
        </div>
        <div class="order-2 w-full md:w-1/2">
                        <img class="block object-cover w-full h-full" src="<?php if (get_the_post_thumbnail_url($post->ID)) { echo get_the_post_thumbnail_url($post->ID); } else { echo get_template_directory_uri(). '/src/images/placeholder-image.jpeg'; } ?>" alt="">
                    </div>
    </div>
</section>

<div id="post-<?php the_ID(); ?>" class="py-16">
	<div class="container p-12 bg-white rounded card main relative z-[1]">
		<div class="max-w-full prose main-blog-content">
			<?= the_content(); ?>
		</div>
	</div>
	<section class="pt-16 pb-32">
		<div class="container">
			<h2 class="pb-10"></h2>
			<h2 class="pb-10"><?= esc_html__( 'Policy Committees', 'chamber' ) ?> </h2>
			<p class="max-w-lg pb-5"><?= esc_html__( 'An important complement to our Policy team, many significant policy public positions originate from our committees and working groups', 'chamber' ) ?></p>
			<p class="max-w-lg pb-5"></p>
			<div class="grid grid-cols-12 gap-7 gap-y-12 lg:gap-y-7 ">
				<a href="<?= get_field('related_policy_committees', $post->ID)->guid; ?>"
					class="flex justify-between col-span-12 p-4 bg-white border-b-4 rounded img-scale card border-forest-DEFUALT lg:col-span-6 group">
					<div class="flex flex-col w-full px-2 pt-1">
						<div class="pb-4 mr-8">
							<h4 class="relative table"><span class="relative z-10 block pr-5 bg-white"><?= get_field('related_policy_committees', $post->ID)->post_title; ?></span><img
									src="/wp-content/themes/chamber-of-commerce/src/images/long-right-arrow.svg"
									class="animate-hover absolute group-hover:right-[-2rem] top-[6px] right-[-1rem] object-cover"
									alt="Canadian Chamber of Commerce Icon"></h4>
						</div>
						<div class="text-dark-body">
							<p><?= get_the_excerpt($post->ID); ?></p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</section>
	<div class="container mt-20">
			<div class="bg-forest-DEFUALT absolute mt-[-8rem] z-0 h-[24rem] left-0 w-[90%]"></div>
			<div class="relative">
					<h2 class="pb-10 text-white"><?= esc_html__( 'Related Strategic Issues', 'chamber' ) ?></h2>
					<div class="grid grid-cols-12 gap-5">
						<?php 
							if($related_posts->have_posts()) {
								while($related_posts->have_posts()) : $related_posts->the_post() ?>
									<a href="<?= get_the_permalink($related_posts->ID) ?>" class="flex flex-col col-span-12 bg-white rounded md:flex-row lg:flex-col card lg:col-span-4 hover:card-shadow">
											<img class="md:w-1/2 lg:w-full h-[16rem] object-cover rounded-t" src="<?php if (get_the_post_thumbnail_url($related_posts->ID)) { echo get_the_post_thumbnail_url($related_posts->ID,  'medium_large'); } else { echo get_template_directory_uri(). '/src/images/placeholder-image.jpeg'; } ?>" alt="">
											<div class="p-8 md:px-8 md:py-4 md:w-1/2 lg:w-full">
													<?php if (!$hide_meta) { ?>
													<div class="flex items-center mb-4 meta <?php if (get_post_type($related_posts->ID) == "policycommittees" || get_post_type($related_posts->ID) == "resources" || get_post_type($related_posts->ID) == "strategicissues") { echo "hidden"; } ?>">
															<?php if (get_post_type($related_posts->ID) == "news") {
																	$label = get_post_type_object(get_the_terms($related_posts->ID,'news_type')[0])->labels->singular_name;
																	$slug = get_the_terms($related_posts->ID,'news_type')[0]->slug;
															} else {
																	if (get_post_type($related_posts->ID)  == "post") {
																			$label = 'blog';
																			$slug = 'blog';
																	} else {
																			$label = get_post_type_object(get_post_type($related_posts->ID))->labels->singular_name;
																			$slug = get_post_type($related_posts->ID);
																	}
															}
															?>
															<?php if ($label) { ?><div class="mr-4 label <?= $slug; ?>"><?= $label ?></div><?php } ?>
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
					<a href="/advocacy/strategic-issues/" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= esc_html__( 'SEE ALL STRATEGIC ISSUES', 'chamber' ) ?></span></a>
			</div>
	</div>
</div>