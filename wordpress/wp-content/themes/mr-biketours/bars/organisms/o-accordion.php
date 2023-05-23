<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismAccordion($field = 'o-accordion', $page_id = 0) {
	$accordion_headline = get_field($field . '-headline', $page_id);

	if (have_rows($field, $page_id)) {

		?>

		<section class="bar m-y-3">
			<div class="container">

				<?php


				if ($accordion_headline) { ?>
					<h4 class="m-b"><?php echo $accordion_headline; ?></h4>
				<?php } ?>

				<div class="panel-group acc-toggle" id="accordion-<?php echo $field; ?>" role="tablist" aria-multiselectable="true">

					<?php
					$i = 0;
					while (have_rows($field, $page_id)) : the_row();
						$i++; ?>

						<div class="panel panel-default">

							<div class="panel-heading" role="tab" id="<?php echo $field; ?>-heading-accordion-<?= $i; ?>">

								<h3 class="panel-title">

									<a class="acc-toggle__item collapsed" role="button" data-toggle="collapse" data-parent="#accordion-<?php echo $field; ?>" href="#<?php echo $field . '-' . $i; ?>" aria-expanded="false" aria-controls="<?php echo $field . '-' . $i; ?>">

										<?php echo get_sub_field('m-accordion_a-headline'); ?>

									</a>

								</h3>

							</div>

							<div id="<?php echo $field . '-' . $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $field; ?>-heading-accordion-<?= $i; ?>" aria-expanded="true">

								<div class="panel-body">

									<?php

									$image = get_sub_field('m-accordion_a-image');

									if ($image) {
										?>
										<div class="row">
											<div class="g-6">
												<img class="img-responsive" src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt']; ?>">
											</div>
										</div>
										<?php
									}
									?>

									<?php echo get_sub_field('m-accordion_a-text'); ?>

								</div>

							</div>

						</div>

					<?php endwhile;

					?>

				</div>
				<?php
				return TRUE;

				?>

			</div>
		</section>

		<?php


	}

	return FALSE;
}