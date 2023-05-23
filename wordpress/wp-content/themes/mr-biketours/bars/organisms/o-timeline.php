<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismTimeline($field = 'o-timeline', $page_id = 0) {

	if (have_rows($field, $page_id)) {
		?>

		<section class="bar">
			<div class="container">


				<div class="time-journey">

					<?php
					$i = 1;
					while (have_rows($field, $page_id)) : the_row();
						$i++;
						$direction = $i % 2 ? 'left' : 'right';
						?>
						<div class="row d-flex  d-sm-block  align-items-center  time-item js-timeline-row m-b">
						<div class="g-2 g-md-4 g-sm-12 push-sm-0  g-xs-12 push-xs-0  order-push-5 order-push-md-4 order-push-sm-0  p-x-0 p-x-sm-half">
							<div class="statcard timeline__statcard">
								<div class="statcard__content">
									<div class="statcard__content__number m-x-sm-0"><?php the_sub_field('m-timeline_a-year'); ?></div>

								</div>
							</div>
						</div>
						<div class="g-4 g-md-4 g-sm-12 g-xs-12 push-sm-0  push-xs-0 <?= ($i % 2 ? 'order-push-5 order-push-md-4 order-push-sm-0' : 'push-1  push-md-3   order-pull-2 order-pull-md-6 order-pull-sm-0'); ?>">
							<div class="timeline__text-<?= ($i % 2 ? 'right' : 'left'); ?>">
								<h3><?php the_sub_field('m-timeline_a-headline'); ?></h3>
								<?php the_sub_field('m-timeline_a-text'); ?>
							</div>
						</div>
						</div><?php

					endwhile;

					?>
				</div>
			</div>
		</section>
		<?php
	}

	return TRUE;
}