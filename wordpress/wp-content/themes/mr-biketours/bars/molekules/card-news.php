<?php

function getMolekuleCardNews($field) {
	$images = get_field('a-gallery');
	$image = null;
	if (is_array($images)) {
		$image = array_shift($images);
	}
	?>
	<!--card-->
	<div class="card card--default  card--special  view overlay hm-brand  hm-zoom  d-flex  flex-column">

		<?php if ($image !== NULL) { ?>
			<figure>
				<a href="<?php the_permalink(); ?>" class="card__img__link">
					<div class="card__img" style="background-image: url(<?php echo $image['sizes']['medium']; ?>);"></div>
					<div class="mask d-flex align-items-center">
						<span class="center-block"><i class="icon icon--plus"></i></span>
					</div>
				</a>
			</figure>
		<?php } ?>
		<div class="card__block">
			<div class="card__meta  bg--brand-primary  text--inverse  text-center  p-a-quarter"><?php the_field('a-date'); ?></div>
			<h4 class="card__title m-b"><?php the_title(); ?></h4>
			<p class="card__block__text"><?php the_field('a-teaser'); ?></p>
		</div>
		<div class="card__footer m-t-auto">
			<a href="<?php the_permalink(); ?>" class="btn btn-block   btn transparent  btn more btn more before p-x-0 text-left"><?php echo __('more', 'bars-theme'); ?></a>
		</div>

	</div>
	<!--/card-->
	<?php
}