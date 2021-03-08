<?php  
	// Template Name: LienHe
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

	<section class="bread-contact" style="background: url('<?php the_field('anh_chuyen_muc', 'option'); ?>');">
		<div class="content">
			<div class="container">
				<div class="info text-center">
					<h1><?php the_field('tieu_de_chuyen_muc', 'option'); ?></h1>
					<p><?php the_field('mo_ta_chuyen_muc', 'option'); ?></p>
				</div>
			</div>
		</div>
	</section>
	<section id="bread">
		<div class="container">
			<ul class="list-inline">
				<li class="list-inline-item"><a href="/">Trang chủ</a></li>
				<li class="list-inline-item"><a href="/lien-he">Liên hệ</a></li>
			</ul>
		</div>
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