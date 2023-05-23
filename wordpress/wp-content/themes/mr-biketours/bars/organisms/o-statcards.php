<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismStatcards($field = 'o-statcards', $page_id = 0) {
	$statcards = get_sub_field($field, $page_id);
	$grid = 12;
	$anz = get_sub_field('o-statcard-count', $page_id);
	$anz = count($statcards) > $anz ? $anz : count($statcards);
	if (!$anz) return FALSE;
	$g = $grid / $anz;
	if ($anz > 0) {

		if (have_rows($field)) {

			?>

			<section class="bar">
				<div class="container">


					<div class="row">
						<?php

						while (have_rows($field)): the_row();

							$statcard = get_sub_field('m-statcard');

							?>

							<div class="g-<?= $g; ?> g-sm-6 g-xs-12 m-b-sm">
								<div class="statcard">
									<div class="statcard__content">
										<div class="statcard__content__number  text--passion-one"><?php echo $statcard['a-value']; ?></div>
										<div class="statcard__content__desc"><?php echo $statcard['a-title']; ?></div>
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