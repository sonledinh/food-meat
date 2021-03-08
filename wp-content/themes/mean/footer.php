<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mean
 */

?>

	<footer>
		<div id="back-to-top"><a href="javascript:void(0)"><i class="fa fa-arrow-up"></i></a></div>
		<div class="info-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="item-footer">
							<div class="title-ft"><?php  the_field('tieu_de_block_1', 'option'); ?></div>
							<ul>
								<?php 
									if( have_rows('danh_muc_block_1', 'option') ):
                            			$regular = get_field('danh_muc_block_1', 'option');
						    			foreach ($regular as $k => $row) {
								?>
								<li><a href="<?php echo $row['link']; ?>"><?php echo $row['tieu_de']; ?></a></li>
								<?php 
					           			}
									endif; 
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="item-footer">
							<div class="title-ft"><?php the_field('tieu_de_block_2', 'option'); ?></div>
							<ul>
								<?php 
									if( have_rows('danh_muc_block_2', 'option') ):
                            			$regular = get_field('danh_muc_block_2', 'option');
						    			foreach ($regular as $k => $row) {
								?>
								<li><a href="<?php echo $row['link']; ?>"><?php echo $row['tieu_de']; ?></a></li>
								<?php 
					           			}
									endif; 
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="item-footer">
							<div class="title-ft"><?php the_field('tieu_de_block_3', 'option'); ?></div>
							<ul>
								<?php 
									if( have_rows('danh_muc_block_3', 'option') ):
                            			$regular = get_field('danh_muc_block_3', 'option');
						    			foreach ($regular as $k => $row) {
								?>
								<li><a href="<?php echo $row['link']; ?>"><?php echo $row['tieu_de']; ?></a></li>
								<?php 
					           			}
									endif; 
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-5">
						<div class="item-footer">
							<div class="title-ft"><?php the_field('tieu_de_block_4', 'option'); ?></div>
							<div class="desc">
								<?php the_field('mo_ta', 'option'); ?>
							</div>
							<div class="box-subscribe">
								<?php echo do_shortcode('[contact-form-7 id="94" title="Subscribe"]'); ?>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="social-ft">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a href="<?php the_field('facebook', 'option'); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/sc-11.png" class="img-fluid" width="25" height="25" alt=""></a>
								</li>
								<li class="list-inline-item">
									<a href="<?php the_field('zalo', 'option'); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/sc-12.png" class="img-fluid" width="25" height="25" alt=""></a>
								</li>
								<li class="list-inline-item">
									<a href="<?php the_field('instagram', 'option'); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/sc-13.png" class="img-fluid" width="25" height="25" alt=""></a>
								</li>
								<li class="list-inline-item">
									<a href="<?php the_field('youtube', 'option'); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/sc-14.png" class="img-fluid" width="25" height="25" alt=""></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
 
<!--Link js--> 
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/slick.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/private.js"></script> 
<style type="text/css">
	.fr{
		float: right;
	}
</style>
<script type="text/javascript">
	jQuery(function($) {
		var path = window.location.href; 
		$('.content-menu ul a').each(function() {
			if (this.href === path) {
				$(this).addClass('active');
			}
		});
    });
</script>
<?php wp_footer(); ?>

</body>
</html>
