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
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$current_term_level = get_tax_level(get_queried_object()->term_id, get_queried_object()->taxonomy);
$parent = get_term_by( 'id', $term->parent , get_query_var( 'taxonomy' ) );
$wcatTerms = get_terms('san-pham', array('hide_empty' => 0, 'parent' =>$term->term_taxonomy_id));
if ($current_term_level == 1) {
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
						<h2><?php echo $term->name; ?></h2>
						<span><?php echo $term->description; ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="bread">
		<div class="container">
			<ul class="list-inline">
				<li class="list-inline-item"><a href="/">Trang chủ</a></li>
				<li class="list-inline-item"><a href="/<?php echo $term->taxonomy; ?>">Sản phẩm</a></li>
				<li class="list-inline-item"><a href="<?php echo get_term_link( $term->slug, $term->taxonomy ); ?>"><?php echo $term->name; ?></a></li>
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
}
if ($current_term_level == 2) {
?>
<main>
	<section class="breadcrumbs" style="background: url('<?php bloginfo( 'stylesheet_directory' ); ?>/images/bn-prd.png');">
		<div class="info-bread">
			<div class="container">
				<div class="row align-items-center ">
					<div class="col-md-6">
						<div class="avarta"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/pr-4.png" class="img-fluid" alt=""></div>
					</div>
					<div class="col-md-6 text-right">
						<h2><?php echo $term->name; ?></h2>
						<p><?php echo $term->description; ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="bread">
		<div class="container">
			<ul class="list-inline">
				<li class="list-inline-item"><a href="/">Trang chủ</a></li>
				<li class="list-inline-item"><a href="/<?php echo $term->taxonomy; ?>">Sản phẩm</a></li>
				<li class="list-inline-item"><a href="<?php echo get_term_link( $parent->slug, $parent->taxonomy ); ?>"><?php echo $parent->name; ?></a></li>
				<li class="list-inline-item"><a href="<?php echo get_term_link( $term->slug, $term->taxonomy ); ?>"><?php echo $term->name; ?></a></li>
			</ul>
		</div>
	</section>
	<section class="product pt-60 pb-60">
		<div class="container">
			<div class="list-meet">
				<div class="row">
					<?php 
					foreach ($wcatTerms as $key => $value) {
						$images = get_field('image', $value->taxonomy . '_' . $value->term_id);
					?>
					<div class="col-md-4 col-sm-4 col-6">
						<div class="item-pr-4 text-center">
							<div class="avarta"><a href="<?php echo get_term_link( $value->slug, $value->taxonomy ); ?>"><img src="<?php echo $images['url']; ?>" class="img-fluid" alt="<?php echo $value->name; ?>"></a></div>
							<div class="info">
								<h3><a href="<?php echo get_term_link( $value->slug, $value->taxonomy ); ?>"><?php echo $value->name; ?></a></h3>
							</div>
						</div>
					</div>
					<?php 
					}
					?>
				</div>
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
</main>
<?php  
}
if ($current_term_level == 3) {
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
						<h2><?php echo $term->name; ?></h2>
						<p><?php echo $term->description; ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="bread">
		<div class="container">
			<ul class="list-inline">
				<li class="list-inline-item"><a href="/">Trang chủ</a></li>
				<li class="list-inline-item"><a href="/<?php echo $term->taxonomy; ?>">Sản phẩm</a></li>
				<li class="list-inline-item"><a href="<?php echo get_term_link( $parent->slug, $parent->taxonomy ); ?>"><?php echo $parent->name; ?></a></li>
				<li class="list-inline-item"><a href="<?php echo get_term_link( $term->slug, $term->taxonomy ); ?>"><?php echo $term->name; ?></a></li>
			</ul>
		</div>
	</section>
	<section class="product-detail2 pt-60 pb-60">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8 col-12">
					<div class="des">
						<?php echo get_field('thong_tin_them', $term->taxonomy . '_' . $term->term_id); ?>
					</div>
				</div>
				<div class="col-md-2">
				</div>
			</div>

		</div>
		<!-- <div class="container">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8 col-12">
					<div class="des">
						Phần mềm nhất của nửa thân thịt lợn, được lấy từ phần thịt chính của psoas, không có mỡ, có hoặc không có đầu.
						<br>
						<br>
						Sử dụng trong ẩm thực: Được khuyến nghị để chế biến các loại thịt hun khói độc quyền và các món chiên, quay hoặc om.
					</div>
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>
		<div class="container pt-40">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8 col-12">
					<div class="title">
						LEGALLY REGULATED PRODUCT NAME
					</div>
					<div class="category-title">
						PORK TENDERLOIN
					</div>
					<div class="category-title">
						RELATED RECIPES
					</div>
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div> -->
		<div class="container pt-60">
			<div class="row">
				<?php 
				if( have_rows('thong_tin_anh', $term->taxonomy . '_' . $term->term_id) ){
        			$regular = get_field('thong_tin_anh', $term->taxonomy . '_' . $term->term_id);
	    			foreach ($regular as $k => $row) {
				?>
				
				<div class="col-md-6 col-12">
					<img src="<?php echo $row['anh']['url']; ?>" class="pb-20" width="100%" title="<?php echo $row['name']; ?>">
					<!-- <div class="list-info">
						<ul class="list-inline">
							<li class="list-inline-item">
								<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/product2/icon1.png">
								<span>Healthy</span> 
							</li>
							<li class="list-inline-item">
								<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/product2/icon2.png">
								<span>136 Calories</span> 
							</li>
							<li class="list-inline-item">
								<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/product2/icon3.png">
								<span>120 min</span> 
							</li>
						</ul>
					</div>
					<div class="title-image pt-20">
						Pork tenderloin
					</div> -->
				</div>
				<?php 
					}
				}
				?>
			</div>
		</div>
		
	</section>
</main>
<?php	
}
?>
<?php

get_footer();