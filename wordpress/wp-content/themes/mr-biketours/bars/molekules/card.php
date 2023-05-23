<?php

function getMolekuleCard($type, $field) {
	$fn = "getMolekuleCard" . ucfirst($type);
	if ($type!=="" && function_exists($fn)) {
		$fn($field);
	} else {
		$image = get_sub_field('a-image');
		if (!$image) {
			$images = get_sub_field('a-gallery');
			$image = array_shift($images);
		}
		?>

		<!--card-->
		<div class="card card--default  card--special  view overlay hm-brand  hm-zoom  d-flex  flex-column">

			<figure>
				<a href="<?php echo $image['sizes']['large']; ?>" data-size="<?php echo $image['sizes']['medium-width']; ?>x<?php echo $image['sizes']['medium-height']; ?>" class="card__img__link">
					<div class="card__img" style="background-image: url(<?php echo $image['sizes']['medium']; ?>);"></div>
					<div class="mask d-flex align-items-center">
						<span class="center-block"><i class="icon icon--plus"></i></span>
					</div>
				</a>
			</figure>

			<div class="card__block">
				<h4 class="card__title  m-t-0  m-b"><?php the_title(); ?></h4>
				<p class="card__block__text"><?php the_sub_field('a-teaser'); ?></p>
			</div>
			<div class="card__footer m-t-auto">
				<a href="<?php the_permalink(); ?>" class="btn btn-block    btn--transparent   btn--more btn--more--before p-x-0 text-left"><?php echo __('more','bars-theme'); ?></a>
			</div>

		</div>
		<!--/card-->


		<?php
	}
}