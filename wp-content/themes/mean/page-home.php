<?php  
	// Template Name: Home
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

get_header();
$wcatTerms = get_terms('san-pham', array('hide_empty' => 0));
?>
	
<main>
	<?php 
		if( have_rows('block_uu_dai', 'option') ){
			$field = get_field('block_uu_dai', 'option');
	?>
	<section class="banner" style="background: url('<?php echo $field['anh_nen']['url']; ?>');">
		<div class="caption-banner">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="avarta"><img src="<?php echo $field['anh']['url']; ?>" class="img-fluid" alt=""></div>
					</div>
					<div class="col-md-6">
						<div class="info">
							
							<h3><?php echo $field['tieu_de_uu_dai']; ?></h3>
							<h1><?php echo $field['tieu_de']; ?></h1>
							<div class="desc"><?php echo $field['mo_ta']; ?></div>
							<div class="b-link"><a href="<?php echo $field['link']; ?>">Xem thêm <i>→</i></a></div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
		} 
	?>
	<section class="commitment" style="background: url('<?php bloginfo( 'stylesheet_directory' ); ?>/images/bn-com.png');">
		<div class="container">
			<div class="title-comm"><h2><span>Cam kết của chúng tôi</span></h2></div>
			<div class="list-comm">
				<div class="row">
					<?php 
						if( have_rows('block_uu_cam_ket', 'option') ){
							$camket = get_field('block_uu_cam_ket', 'option');
							foreach ($camket as $k => $row) {
					?>
					<div class="col-md-3 col-sm-6">
						<div class="item-comm text-center">
							<div class="avarta"><img src="<?php echo $row['image']['url']; ?>" class="img-fluid" alt=""></div>
							<div class="info">
							 	<h3><?php echo $row['tieu_de']; ?></h3>
							 	<div class="desc"><?php echo $row['mo_ta']; ?></div>
							 	<div class="btn-comm"><a href="<?php echo $row['link']; ?>">→</a></div>
							</div>
						</div>
					</div>
					<?php 
		           			}
						}
					?>
			</div>
		</div>
	</section>
	<section class="box-about">
		<?php 
			if( have_rows('block_ve_chung_toi', 'option') ){
				$vechungtoi = get_field('block_ve_chung_toi', 'option');
		?>
		<div class="avarta"><img src="<?php echo $vechungtoi['anh_nen']['url']; ?>" class="img-fluid w-100" alt="<?php echo $vechungtoi['tieu_de']; ?>"></div>
		<div class="caption-about text-center">
			<div class="container">
				<h2><?php echo $vechungtoi['tieu_de']; ?></h2>
				<div class="desc">
					<?php echo $vechungtoi['mo_ta']; ?>
				</div>
				<div class="b-link"><a href="<?php echo $vechungtoi['link']; ?>">Xem thêm <i>→</i></a></div>
			</div>
		</div>
		<?php 
			} 
		?>
	</section>
	<section class="box-product">
		<div class="container">
			<div class="title d-flex ">
				<h2><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/title-1.png" class="img-fluid" alt=""><span>Sản phẩm nổi bật</span></h2>
				<a href="/san-pham">Xem tất cả  →</a>
			</div>
			<div class="list-product">
				<div class="slide-prd">
					<?php 
					foreach ($wcatTerms as $key => $value) {
						$images = get_field('image', $value->taxonomy . '_' . $value->term_id);
						if ($key < 7) {
							$level = get_tax_level($value->term_id, $value->taxonomy);
							if ($level == 3) {
					?>
					<div class="item-slide">
						<div class="item-prd">
							<div class="avarta">
								<a href="<?php echo get_term_link( $value->slug, $value->taxonomy ); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/prd-2.png" class="img-fluid" alt=""></a>
								<div class="icon-info"><img src="<?php echo $images['url']; ?>" class="img-circle" alt="<?php echo $value->name; ?>"></div>
							</div>
							<div class="info">
								<h3 class="d-flex">
									<a href="product-detail.php"><?php echo $value->name; ?></a>
									<ul class="list-inline">
										<li class="list-inline-item"><a href="<?php echo get_term_link( $value->slug, $value->taxonomy ); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-1.png" class="img-fluid" alt="<?php echo $value->name; ?>"></a></li>
										<li class="list-inline-item"><a href="<?php echo get_term_link( $value->slug, $value->taxonomy ); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-2.png" class="img-fluid" alt="<?php echo $value->name; ?>"></a></li>
									</ul>
								</h3>
								<div class="desc">
									<?php echo $value->description; ?>
								</div>
								<div class="button-price">
									<div class="btn-buy"><a href="<?php echo get_term_link( $value->slug, $value->taxonomy ); ?>">TÌM HIỂU THÊM</a></div>
								</div>
							</div>
						</div>
					</div>
					<?php 
							}
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<section class="qc">
		<div class="slide-qc">
			<?php 
				if( have_rows('danh_muc_block_4', 'option') ):
	    			$regular = get_field('danh_muc_block_4', 'option');
	    			foreach ($regular as $k => $row) {
			?>
			<div class="item"><a href="<?php echo $row['link']; ?>"><img src="<?php echo $row['ảnh']['url']; ?>" class="img-fluid w-100" alt="<?php echo $row['tieu_de']; ?>"></a></div>
			<?php 
	       			}
				endif; 
			?>
		</div> 
	</section>
	<section class="box-new-home">
		<div class="container">
			<div class="slide-new-home">
				<?php 
				$args = array(
			        'numberposts'=>-1,
			        'orderby' => 'desc', 
			    );
            	$ttnv = new WP_Query($args);
            	if($ttnv->have_posts()):
                	while ($ttnv->have_posts()) {
                		$ttnv->the_post();
				?>
				<div class="item-slide">
					<div class="item-new">
						<div class="avarta"><a href="<?php echo the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-fluid w-100" alt="<?php  the_title(); ?>"></a></div>
						<div class="info">
							<ul class="d-flex info-top">
								<li><?php echo get_the_category()[0]->name  ; ?></li>
								<li>
									<?php  
										$timeago = vi_human_time_diff(get_the_time('U'), current_time('timestamp'));
									    if ($timeago == false) {
									        the_time('d/m/Y');
									    } else {
									        echo $timeago . ' trước';
									    }
									?>
								</li>
							</ul>
							<h3><a href="<?php echo the_permalink(); ?>"><?php  the_title(); ?></a></h3>
							<div class="desc">
								<?php echo the_excerpt(); ?>
							</div>
							<div class="info-bot">
								<div class="user">
									<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/person.png" class="img-fluid" alt="<?php  the_title(); ?>">
									<span><?php the_author(); ?></span>
								</div>
								<div class="readmore"><a href="">Read more 🡢</a></div>
							</div>
						</div>
					</div>
				</div>
				<?php 
                	}
				    else: 
                    endif;
                	
                    wp_reset_query();
                ?>
			</div>
		</div>
	</section>
	<section class="box-partner">
		<div class="container">
			<div class="title-part text-center">Khách hàng của chúng tôi</div>
			<div class="list-part text-center">
				<?php 
					if( have_rows('block_khach_hang', 'option') ){
						$khachhang = get_field('block_khach_hang', 'option');
						foreach ($khachhang as $k => $row) {
				?>
				<div class="item-slide">
					<div class="item"><a href="<?php echo $row['link']; ?>"><img src="<?php echo $row['image']['url']; ?>" class="img-fluid" alt="<?php echo $row['tieu_de']; ?>"></a></div>
				</div>
				<?php 
	           			}
					}
				?>
			</div>
		</div>
	</section> 
	<section class="story">
		<?php 
			if( have_rows('block_lang_nghe', 'option') ){
				$langnghe = get_field('block_lang_nghe', 'option');
		?>
		<div class="avarta"><img src="<?php echo $langnghe['anh_nen']['url']; ?>" class="img-fluid w-100" alt="<?php echo $langnghe['tieu_de']; ?>"></div>
		<div class="caption-story">
			<div class="container">
				<div class="info text-center">
					<h3><?php echo $langnghe['tieu_de']; ?></h3>
					<p><?php echo $langnghe['mo_ta']; ?></p>
					<div class="btn-story"><a href="<?php echo $langnghe['link']; ?>"><?php echo $langnghe['tieu_de_nut']; ?></a></div>
				</div>
			</div>
		</div>
		<?php 
			}
		?>
	</section>
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="content-contact">
						<div class="form-ct">
							<?php the_content() ?>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box-bar-ct">
						<div class="item">
							<div class="icon"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/i-ct-1.svg" class="" alt=""></div>
							<h3>Address</h3>
							<ul>
								<li><?php the_field('dịa_chi', 'option'); ?></li>
							</ul>
						</div>
						<div class="item">
							<div class="icon"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/i-ct-2.svg" class="" alt=""></div>
							<h3>Contact Info</h3>
							<ul>
								<li>Email : <?php the_field('email', 'option'); ?></li>
								<li>Phone : <?php the_field('phone', 'option'); ?></li>
							</ul>
						</div>
						<div class="item">
							<div class="icon"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/i-ct-3.svg" class="" alt=""></div>
							<h3>Open Hour</h3>
							<ul>
								<li><?php the_field('thoi_gian_lam_ca_1', 'option'); ?></li>
								<li>
									<?php the_field('thoi_gian_lam_ca_2', 'option'); ?>
								</li>
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