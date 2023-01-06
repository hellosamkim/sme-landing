<?php
  add_action('wp_ajax_postfilter', 'postfilter'); // wp_ajax_{ACTION HERE}
  add_action('wp_ajax_nopriv_postfilter', 'postfilter');

  function postfilter() {

    $issues = [];
    $committees = [];
    $news_type = [];
    $publications = [];

    foreach($_POST as $key=>$value){
      if (str_contains($key,'issue')) {
        array_push($issues,substr($key, strpos($key, "-") + 1));
      }
      if (str_contains($key,'news')) {
        array_push($news_type,substr($key, strpos($key, "-") + 1));
      }
      if (str_contains($key,'committee')) {
        array_push($committees,substr($key, strpos($key, "-") + 1));
      }
      if (str_contains($key,'publication')) {
        array_push($publications,substr($key, strpos($key, "-") + 1));
      }
    }

    //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $paged = isset( $_POST['current_page'] ) ? $_POST['current_page'] : 1;

    $args = array(
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => $_POST['type'],
      'post_status' => array('publish'),
      'posts_per_page'   => '5',
      's' => $_POST['search'],
      'paged'   => $paged,
      'suppress_filters' => 0,
    );

    if ($_POST['type'] == "post") {
      if ($issues) {
        $args['tax_query'] = array(
          'relation' => 'OR',
            array(
              'taxonomy' => 'strategic-issues',
              'field' => 'term_id',
              'terms' => $issues
            )
        );
      }
    } elseif ($_POST['type'] == 'news') {
      if ($issues && $news_type) {
        $args['tax_query'] = array(
          'relation' => 'OR',
            array(
              'taxonomy' => 'news-strategic-issues',
              'field' => 'term_id',
              'terms' => $issues
            ),
            array(
              'taxonomy' => 'news_type',
              'field' => 'term_id',
              'terms' => $news_type
            )
        );
      } elseif ($issues && !$news_type) {
        $args['tax_query'] = array(
          'relation' => 'OR',
            array(
              'taxonomy' => 'news-strategic-issues',
              'field' => 'term_id',
              'terms' => $issues
            ),
        );
      } elseif (!$issues && $news_type) {
        $args['tax_query'] = array(
          'relation' => 'OR',
            array(
              'taxonomy' => 'news_type',
              'field' => 'term_id',
              'terms' => $news_type
            ),
        );
      }
    } elseif ($_POST['type'] == "publications") {
      if ($issues && $publications) {
        $args['tax_query'] = array(
          'relation' => 'OR',
            array(
              'taxonomy' => 'publication-strategic-issues',
              'field' => 'term_id',
              'terms' => $issues
            ),
            array(
              'taxonomy' => 'publication',
              'field' => 'term_id',
              'terms' => $publications
            )
        );
      } elseif ($issues && !$publications) {
        $args['tax_query'] = array(
          'relation' => 'OR',
            array(
              'taxonomy' => 'publication-strategic-issues',
              'field' => 'term_id',
              'terms' => $issues
            ),
        );
      } elseif (!$issues && $publications) {
        $args['tax_query'] = array(
          'relation' => 'OR',
            array(
              'taxonomy' => 'publication',
              'field' => 'term_id',
              'terms' => $publications
            ),
        );
      }
    } elseif ($_POST['type'] == "policy-resolutions") {
      if ($issues) {
        $args = array(
          'orderby'     => 'date',
          'order'       => 'DESC',
          'post_status' => array('publish'),
          'post_type'   => 'publications',
          'posts_per_page'   => '5',
          's' => $_POST['search'],
          'paged'   => $paged,
          'tax_query' => array(
            'relation' => 'AND',
              array(
                'taxonomy' => 'publication-strategic-issues',
                'field' => 'term_id',
                'terms' => $issues
              ),
              array(
                'taxonomy' => 'publication',
                'field' => 'term_id',
                'terms' => [163,173]
              )
              ),
          'suppress_filters' => 0,
        );
      } else {
        $args = array(
          'orderby'     => 'date',
          'order'       => 'DESC',
          'post_status' => array('publish'),
          'post_type'   => 'publications',
          'posts_per_page'   => '5',
          'tax_query' => array(
            'relation' => 'AND',
              array(
                'taxonomy' => 'publication',
                'field' => 'term_id',
                'terms' => [163,173]
              )
            ),
          's' => $_POST['search'],
          'paged'   => $paged,
          'suppress_filters' => 0,
        );
      }
    }

    $posts = new WP_Query( $args ); 
    
    $total_pages = $posts->max_num_pages;
    $current_page = max(1, $paged);
    
    $results = '';

    if ($posts->found_posts > 5) {
      $results .= '<h5 class="pagination-show border-b py-[0.9rem] lg:mr-8 hidden">Showing '. 5 * $current_page .' out of '. $posts->found_posts .'</h5>';
    } else {
      $results .= '<h5 class="pagination-show border-b py-[0.9rem] lg:mr-8 hidden">Showing '. $posts->found_posts .' out of '. $posts->found_posts .'</h5>';
    }

    if($posts->have_posts()) {
      while($posts->have_posts()) : $posts->the_post();

        $label = get_post_type($post->ID);
        $slug = get_post_type($post->ID);
        $doc = get_field('publication_document', get_the_ID());
        if (get_the_post_thumbnail_url($post->ID)) {
          $img = get_the_post_thumbnail_url($post->ID);
        } else {
          $img = get_template_directory_uri(). '/src/images/placeholder-image.jpeg';
        }

        if ($label == "") { $slug = "hidden"; }
        ?>
        <?php if (get_post_type($post->ID) == "events" || get_post_type($post->ID) == "policycommittees" || get_post_type($post->ID) == "resources" || get_post_type($post->ID) == "strategicissues") { $hide = "hidden"; } ?>
        <?php 
        if ($doc) {
          $results .= '<a href="'. $doc .'" class="relative flex flex-col justify-between col-span-12 mb-8 bg-white rounded md:flex-row card lg:col-span-4 hover:card-shadow">
          <div class="relative md:w-1/3 h-[14rem] max-h-full p-8 pr-0">
              <img class="object-cover object-top w-full h-full rounded-l" src="'. $img .'" alt="">
          </div>
          <div class="p-8 md:w-2/3">
              <div class="flex items-center mb-4 meta ' . $hide . '">
                  <div class="mr-4 label '. $slug .'">'. $label .'</div>
                  <p class="dates">'. get_the_date('M d, Y',$post->ID) .'</p>
              </div>
              <h4 class="pb-4 leading-8">'. get_the_title($post->ID) .'</h4>
              <div class="text-dark-body">'. get_the_excerpt($post->ID) .'</div>
          </div>
        </a>';
        } else {
          $results .= '<a href="'. get_the_permalink($post->ID) .'" class="relative flex flex-col justify-between col-span-12 mb-8 bg-white rounded md:flex-row card lg:col-span-4 hover:card-shadow">
          <div class="relative md:w-1/3 h-[14rem] max-h-full p-8 pr-0">
              <img class="object-cover object-top w-full h-full rounded-l" src="'. $img .'" alt="">
          </div>
          <div class="p-8 md:w-2/3">
              <div class="flex items-center mb-4 meta ' . $hide . '">
                  <div class="mr-4 label '. $slug .'">'. $label .'</div>
                  <p class="dates">'. get_the_date('M d, Y',$post->ID) .'</p>
              </div>
              <h4 class="pb-4 leading-8">'. get_the_title($post->ID) .'</h4>
              <div class="text-dark-body">'. get_the_excerpt($post->ID) .'</div>
          </div>
        </a>';
        }
          
      endwhile;
      wp_reset_postdata();
    } else {
      $results .= "<h3 class='my-5 text-center col-12'>No results were found</h4>";
    }

    $results .= '<div class="pb-8 text-right lg:mr-8 pagination">';
    
    if ($total_pages > 1){

      $results .= paginate_links(array(
        'base'      => get_pagenum_link(1) . '%_%',
        'format'    => '?page=%#%',
        'current'   => $current_page,
        'total'     => $total_pages,
        'prev_text' => __('<button class="pr-2 text-button"><i class="fa-solid fa-chevron-left"></i></button>'),
        'next_text' => __('<button class="pl-2 text-button"><i class="fa-solid fa-chevron-right"></i></button>'),
      ));
    }

    $results .= '</div>';
    
    print_r($results);
    exit;
  }