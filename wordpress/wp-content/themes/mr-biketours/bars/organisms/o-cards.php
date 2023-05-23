<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismCards($field = 'o-cards', $page_id = 0) {
	$count = get_sub_field($field . '-count', $page_id);
	$grid = 12;
	$g = $grid / $count;

	if ($count > 0) {


		if (have_rows($field, $page_id)) {

			?>
			<section class="bar">
				<div class="container">

					<?php


					?>
					<div class="row  d-flex align-items-stretch  flex-wrap   m-t-2">
						<?php
						while (have_rows($field, $page_id)) : the_row();
							?>
							<div class="g-<?= $g; ?> g-sm-6 g-xs-12 m-b-2  d-flex">

								<div class="card card--default  card--plain  view overlay hm-brand  d-flex  flex-column">


									<figure>
										<a href="<?php echo get_sub_field('m-card_a-link'); ?>" class="card__img__link" data-card="card-1">
											<?php
											$image = get_sub_field('m-card_a-image');
											$thumb = $image['sizes']['medium'];
											?>
											<div class="card__img" style="background-image: url('<?php echo $thumb; ?>');"></div>

											<div class="mask d-flex align-items-center">

												<span class="center-block"><i class="icon icon-plus"></i></span>

											</div>

										</a>

									</figure>

									<div class="card__block">
										<h2 class="card__title"><?php echo get_sub_field('m-card_a-headline'); ?></h2>
										<?php echo get_sub_field('m-card_a-text'); ?>
									</div>

									<div class="card__footer m-t-auto">
										<a href="<?php echo get_sub_field('m-card_a-link'); ?>" class="btn btn--more btn--more--before p-x-0"><?php echo __('Read more', 'bars-theme'); ?></a>
									</div>

								</div>

							</div>

						<?php
						endwhile;
						?>
					</div>
				</div>
			</section>

			<?php
		}


		return TRUE;
	}

	return FALSE;
}