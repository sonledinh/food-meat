<?php  
	// Template Name: SanPham
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
$wcatTerms = get_terms('san-pham', array('hide_empty' => 0, 'parent' =>0));
?>
<main>
	<section class="breadcrumbs" style="background: url('<?php bloginfo( 'stylesheet_directory' ); ?>/images/bn-prd.png');">
		<div class="info-bread">
			<div class="container">
				<div class="row align-items-center ">
					<div class="col-md-6">
						<div class="avarta"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/i-bread.png" class="img-fluid" alt=""></div>
					</div>
					<div class="col-md-6 text-right">
						<h2><?php the_title(); ?></h2>
						<span><?php the_content(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="bread">
		<div class="container">
			<ul class="list-inline">
				<li class="list-inline-item"><a href="/">Trang chủ</a></li>
				<li class="list-inline-item"><a href="/san-pham">Sản phẩm</a></li>
			</ul>
		</div>
	</section>
	<section class="product-2 pt-60 pb-60">
		<?php 
		foreach ($wcatTerms as $key => $value) {
			$images = get_field('image', $value->taxonomy . '_' . $value->term_id);
			if ($key % 2 == 0) {
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-12">
					<div class="title"><?php echo $value->name; ?></div>
					<div class="sapo"><?php echo $value->description; ?></div>
					<div class="loadmore">
						<a href="<?php echo get_term_link( $value->slug, $value->taxonomy ); ?>" class="btn">Xem thêm &emsp;&emsp;→ </a>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<img class="pt-20" src="<?php echo $images['url']; ?>">
				</div>
			</div>
		</div>
		<?php 
			}else{
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-12">
					<img class="pt-20" src="<?php echo $images['url']; ?>">
				</div>
				<div class="col-md-8 col-12 text-right">
					<div class="title"><?php echo $value->name; ?></div>
					<div class="sapo"><?php echo $value->description; ?></div>
					<div class="loadmore pull-right">
						<a href="<?php echo get_term_link( $value->slug, $value->taxonomy ); ?>" class="btn">Xem thêm &emsp;&emsp;→ </a>
					</div>
				</div>
			</div>
		</div>
		<?php 
			}
		}
		?>
	</section>
</main>
<?php

get_footer();