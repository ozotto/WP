<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package laTomate
 */

get_header(); ?>

<?php
$argsFirstSlider = array(
		'post_status' => 'publish',
		'post_type' => 'slider',
		'posts_per_page' => 1,
);

$argsOtherSlider = array(
		'post_status' => 'publish',
		'post_type' => 'slider',
		'posts_per_page' => 5,
		'offset' => 1,
);

$queryFirstPost = new WP_Query($argsFirstSlider);
$queryOtherPost = new WP_Query($argsOtherSlider);
$numberIndicator = $queryOtherPost->found_posts;

?>

	<!-- Header Carousel -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Carousel indicators -->
		<ol class="carousel-indicators">
			<?php
			if($queryFirstPost->have_posts()) :
				?>
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<?php
				for ($i = 1; $i < $numberIndicator; $i++) {
					?>
					<li data-target="#myCarousel" data-slide-to=<?php echo $i; ?>></li>
					<?php
				}
			else :
				?>
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<?php
			endif;
			?>

		</ol>
		<!-- Wrapper for carousel items -->
		<div class="carousel-inner">
			<?php
			if($queryFirstPost->have_posts()) :
				while ( $queryFirstPost->have_posts() ) : $queryFirstPost->the_post();
					$urlImg = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
					?>
					<div class="item active">
						<img src="<?php echo $urlImg; ?>" alt="">
					</div>
					<?php
				endWhile; wp_reset_postdata();
				while ( $queryOtherPost->have_posts() ) : $queryOtherPost->the_post();
					$urlImgOther = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
					?>
					<div class="item">
						<img src="<?php echo $urlImgOther; ?>" alt="">
					</div>
				<?php endwhile; wp_reset_postdata();
			else :
				?>
				<div class="item active">
					<img src="http://placehold.it/1900x650&text=Slide One" alt="First Slide">
				</div>
				<div class="item">
					<img src="http://placehold.it/1900x650&text=Slide Two" alt="Second Slide">
				</div>
				<div class="item">
					<img src="http://placehold.it/1900x650&text=Slide Three" alt="Third Slide">
				</div>
				<?php
			endif;
			?>

		</div>
		<!-- Carousel controls -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">
			<span class="icon-next"></span>
		</a>
	</div>

	<!-- Index Description  -->
	<?php
	$argsFirstDesription = array(
			'post_status' => 'publish',
			'post_type' => 'description',
			'posts_per_page' => 1,
	);
	$queryFirstDesc = new WP_Query($argsFirstDesription);
	?>
	<hr>
	<div class="row">
		<?php
		if($queryFirstDesc->have_posts()) :
		while ( $queryFirstDesc->have_posts() ) : $queryFirstDesc->the_post();
			$urlImgDes = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		?>
		<div class="col-md-8">
			<h2><?php the_title();?></h2>
			<p class="lead"><?php the_content();?></p>
		</div>
		<div class="col-md-4">
			<img class="img-circle img-responsive pull-right" src="<?php echo $urlImgDes; ?>">
		</div>
			<?php
		endwhile;
		else :
			?>
			<div class="col-md-8">
				<h2>This First Heading
					<span class="text-muted">Will Catch Your Eye</span>
				</h2>
				<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
			</div>
			<div class="col-md-4">
				<img class="img-circle img-responsive pull-right" src="http://placehold.it/500x500">
			</div>
			<?php
		endif;
		?>
	</div>


	<!-- Index Components  -->
	<?php
	$argsFirstModule = array(
			'post_status' => 'publish',
			'post_type' => 'module',
			'posts_per_page' => 3,
	);
	$queryModule = new WP_Query($argsFirstModule);
	?>
	<hr>
	<div class="row">
		<?php
		if($queryModule->have_posts()) :
			while ( $queryModule->have_posts() ) : $queryModule->the_post();
				$isLink = false;
				$urlImgModule = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
				$linkMore = get_post_meta( $post->ID, '_meta_module_url', true );
				if($linkMore) : $isLink = true; endif;
		?>
				<div class="col-md-4">
					<div class="thumbnail">
						<?php if($isLink) : ?> <a href="<?php echo $linkMore; ?>"><h2><?php the_title();?></h2></a>
						<?php else : ?> <h2><?php the_title();?></h2> <?php endif; ?>
						<img src="<?php echo $urlImgModule; ?>">
						<p><?php the_excerpt(); ?></p>
						<?php
						if (get_post_meta( $post->ID, '_meta_module_checkbox', true ) && $isLink):
							?>
							<p><a class="btn btn-default" href="<?php echo $linkMore; ?>" role="button">Voir plus &raquo;</a></p>
							<?php
							endif;
						?>
					</div>
				</div>
		<?php
			endwhile;
		else :
		?>
		<div class="col-md-4">
			<div class="thumbnail">
				<h2>Heading</h2>
				<img src="http://placehold.it/360x200">
				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				<p><a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a></p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail">
				<h2>Heading</h2>
				<img src="http://placehold.it/360x200">
				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				<p><a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a></p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail">
				<h2>Heading</h2>
				<img src="http://placehold.it/360x200">
				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				<p><a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a></p>
			</div>
		</div>
		<?php
		endif;
		?>
	</div>

<?php
get_footer();
