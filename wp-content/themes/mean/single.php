<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mean
 */

get_header('new');
$categories = get_the_category(get_the_ID());
?>
<main>
	<section class="bread-contact" style="background: url('<?php bloginfo( 'stylesheet_directory' ); ?>/images/new-detail.png');">
		<div class="content">
			<div class="container">
				<div class="info-br">
					<h1><?php the_title(); ?></h1>
					<p>Cập nhật lần cuối: <?php echo get_the_date('H:i - d/m/Y') ?></p>
				</div>
			</div>
		</div>
	</section>
	<section class="content-detail pt-60 pb-60">
		<div class="container">
			 <div class="row">
			 	<div class="col-md-8">
			 		<div class="detail">
			 			<?php the_content(); ?>
			 		</div>
			 	</div>
			 	<div class="col-md-4">
			 		<div class="side-bar-prd">
			 			<h4>Bài viết nổi bật</h4>
			 			<div class="list-prd-bar">
			 				<?php  
			 				if ($categories){
								    $category_ids = array();
								    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
								    $args=array(
								    	'category__not_in' => $category_ids,
								        'post__not_in' => array(get_the_ID()),
								        'posts_per_page' => 4, 
								    );
			 						$my_query = new wp_query($args);
								    if($my_query->have_posts() ):
								        while ($my_query->have_posts()):$my_query->the_post();
						            ?>
			 				<div class="prd-bar">
			 					<div class="avarta"><a href="<?php echo the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-fluid w-100 " alt="<?php  the_title(); ?>"></a></div>
			 					<div class="info">
			 						<h3><a href="<?php echo the_permalink(); ?>"><?php  the_title(); ?></a></h3>
			 						<div class="desc"><?php echo the_excerpt(); ?></div>
			 					</div>
			 				</div>
			 				<?php
							        endwhile;
							    endif; 
						    	wp_reset_query();
							}
							?>
			 			</div>
			 		</div>
			 	</div>
			 	<div class="col-md-12">
			 		<div class="other-news">
			 			<div class="title-other">You might also like</div>
			 			<div class="list-other">
			 				<div class="row">
			 					<?php
                                
								if ($categories){
								    $category_ids = array();
								    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
								    $args=array(
								        'category__in' => $category_ids,
								        'post__not_in' => array(get_the_ID()),
								        'posts_per_page' => 3, // So bai viet dc hien thi
								    );
								    $my_query = new wp_query($args);
								    if($my_query->have_posts() ):
								        while ($my_query->have_posts()):$my_query->the_post();
						            ?>
			 					<div class="col-md-3">
			 						<div class="item-other">
			 							<div class="avarta"><a href="<?php echo the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-fluid w-100" alt="<?php  the_title(); ?>"></a></div>
			 							<div class="info">
			 								<h3><a href="<?php echo the_permalink(); ?>"><?php  the_title(); ?></a></h3>
			 							</div>
			 						</div>
			 					</div>
			 					<?php
								        endwhile;
								    endif; 
							    	wp_reset_query();
								}
								?>
			 				</div>
			 			</div>
			 		</div>
			 	</div>
			 	<div class="col-md-12">
			 		<div class="comment">
			 			<img src="http://tpl.gco.vn/lighting//images/cmt.png" class="img-fluid w-100" alt="">
			 		</div>
			 	</div>
			 </div>
		</div>
	</section>
</main>
<?php
get_footer();
