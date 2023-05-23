<?php

function getMolekuleCardActivity($field) {
	$images = get_field('a-gallery');
	$image = array_shift($images);
	?>
	<!--card-->

		<div class="card card--default  view overlay hm-brand   hm-zoom  d-flex  flex-column">

			<figure>
				<a href="<?php the_permalink(); ?>" class="card__img__link">
					<div class="card__img" style="background-image: url(<?php echo $image['sizes']['medium']; ?>);"></div>
					<div class="mask d-flex align-items-center">
						<span class="center-block"><i class="icon icon--plus"></i></span>
					</div>
				</a>
			</figure>

			<div class="card__block    p-x-0">
				<h4 class="card__title  m-t-0  m-b"><?php the_title(); ?></h4>
				<p class="card__block__text"><?php the_field('a-teaser'); ?></p>
			</div>
			<div class="card__footer m-t-auto  p-a-0">
				<a href="<?php the_permalink(); ?>" class="btn btn-block    btn--transparent   btn--more btn--more--before p-x-0 text-left"><?php echo __('more','bars-theme'); ?></a>
			</div>

		</div>

	<!--/card-->
	<?php
}