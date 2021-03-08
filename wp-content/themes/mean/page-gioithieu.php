<?php  
	// Template Name: GioiThieu
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
?>
	
<main>
	<section id="bread">
		<div class="container">
			<ul class="list-inline">
				<li class="list-inline-item"><a href="/">Trang chủ</a></li>
				<li class="list-inline-item"><a href="/gioi-thieu">Giới thiệu</a></li>
			</ul>
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
			</div>
		</div>
		<?php 
			} 
		?>
	</section>
	<section class="box-number" style="background: url('<?php the_field('anh_nen')['url']; ?>')">
		<div class="container">
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<div class="content-numb">
						<?php the_field('text_3'); ?>
						<div class="list-numb">
							<div class="row">
								<div class="col-md-4">
									<div class="item-numb">
										<h3><?php the_field('text_title_1'); ?></h3>
										<div class="desc"><?php the_field('text_block_1'); ?></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="item-numb">
										<h3><?php the_field('text_title_2'); ?></h3>
										<div class="desc"><?php the_field('text_block_2'); ?></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="item-numb">
										<h3><?php the_field('text_title_3'); ?></h3>
										<div class="desc"><?php the_field('text_block_3'); ?></div>
									</div>
								</div>
							</div>
						</div>
						<?php the_field('text_4'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ab-detail">
		<div class="container">
			<div class="detail">
				<?php the_content(); ?>
					
			</div>
		</div>
	</section>
	<section class="qc" style="clear: both; padding-top: 60px;">
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
</main>	

<?php

get_footer();