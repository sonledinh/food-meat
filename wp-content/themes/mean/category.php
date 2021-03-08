<?php  
	// Template Name: News
?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package toyota
 */

get_header('new');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page=get_option("posts_per_page");
$categories = get_the_category(get_the_ID());
if ($categories){
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args=array(
        'numberposts'=>-1,
        'category__in' => $category_ids,
        'paged'=>$paged,
    );
}else{
	$args=array(
        'numberposts'=>-1,
        'paged'=>$paged,
    );
}
$data = new WP_Query( $args );
$posts = $data->get_posts();
?>
	
<main>
	<section class="bread-contact" style="background: url('<?php bloginfo( 'stylesheet_directory' ); ?>/images/bread-ct.png');">
		<div class="content">
			<div class="container">
				<div class="info-br">
					<h1><?php single_cat_title() ?></h1>
					<p><?php echo category_description(); ?></p>
				</div>
			</div>
		</div>
	</section>
	<section id="news">
		<div class="container">
			<div class="list-news">
				<div class="row">
					<div class="col-md-8">
						<?php
						foreach( $posts as $key => $post ) { 
							if ($key == 0) {
			            ?>
						<div class="new-big">
							<div class="avarta">
								<a href="<?php echo the_permalink(); ?>" title="<?php  the_title(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-fluid w-100" alt="<?php  the_title(); ?>"></a>
								<div class="date-new">
									<span><?php echo get_the_date( 'd' ); ?></span>
									<label><?php echo get_the_date( 'F ' ); ?></label>
								</div>
							</div>
							<div class="info-news">
								<h1><a href="<?php echo the_permalink(); ?>" title="<?php  the_title(); ?>"><?php  the_title(); ?></a></h1>
								<ul class="list-inline">
									<li class="list-inline-item"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/n-1.png" class="img-fluid" alt="<?php  the_title(); ?>"><?php echo get_the_category()[0]->name  ; ?></li>
									<li class="list-inline-item"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/n-2.png" class="img-fluid" alt="<?php  the_title(); ?>">0 Comment</li>
								</ul>
								<div class="desc">
									<?php echo the_excerpt(); ?>
								</div>
							</div>
						</div>
						<?php
							}
						}
						?>
					</div>
					<div class="col-md-4">
						<?php
                        foreach( $posts as $key => $post ) { 
							if ($key == 1) {
			            ?>
						<div class="new-small">
							<div class="avarta">
								<a href=<?php echo the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-fluid w-100" alt="<?php  the_title(); ?>"></a>
								<div class="date-new">
									<span><?php echo get_the_date( 'd' ); ?></span>
									<label><?php echo get_the_date( 'F ' ); ?></label>
								</div>
							</div>
							<div class="info-news">
								<h3><a href="<?php echo the_permalink(); ?>" title="<?php  the_title(); ?>"><?php  the_title(); ?></a></h3>
								<ul class="list-inline">
									<li class="list-inline-item"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/n-1.png" class="img-fluid" alt=""><?php echo get_the_category()[0]->name  ; ?></li>
									<li class="list-inline-item"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/n-2.png" class="img-fluid" alt="">0 Comment</li>
								</ul>
								<div class="desc">
									<?php echo the_excerpt(); ?>
								</div>
							</div>
						</div>
						<?php
							}
						}
						?>
					</div>
					<?php
                    foreach( $posts as $key => $post ) { 
						if ($key > 1) {
		            ?>
					<div class="col-md-4">
						<div class="new-small">
							<div class="avarta">
								<a href=<?php echo the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-fluid w-100" alt="<?php  the_title(); ?>"></a>
								<div class="date-new">
									<span><?php echo get_the_date( 'd' ); ?></span>
									<label><?php echo get_the_date( 'F ' ); ?></label>
								</div>
							</div>
							<div class="info-news">
								<h3><a href="<?php echo the_permalink(); ?>" title="<?php  the_title(); ?>"><?php  the_title(); ?></a></h3>
								<ul class="list-inline">
									<li class="list-inline-item"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/n-1.png" class="img-fluid" alt=""><?php echo get_the_category()[0]->name  ; ?></li>
									<li class="list-inline-item"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/n-2.png" class="img-fluid" alt="">0 Comment</li>
								</ul>
								<div class="desc">
									<?php echo the_excerpt(); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					}
					?>
					<div class="col-md-12">
						<div class="pagination-new w-100">
							<?php 
					            $total_pages = $data->max_num_pages;
							    if ($total_pages > 1){
							        $current_page = max(1, get_query_var('paged'));
							        echo paginate_links(array(
							            'base' => get_pagenum_link(1) . '%_%',
							            'current' => $current_page,
							            'total' => $total_pages,
							            'prev_text' => '&laquo;',
										'next_text' => '&raquo;',
										'type' => 'list'
							        ));
							    }
			                ?>
							<ul class="list-inline w-100 text-center">
								<li class="list-inline-item"><a href="" class="active">1</a></li>
								<li class="list-inline-item"><a href="">2</a></li>
								<li class="list-inline-item"><a href="">3</a></li>
								<li class="list-inline-item"><a href="">4</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>	

<?php

get_footer();