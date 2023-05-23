<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismLead($field = 'o-lead', $page_id = 0) {

	?>

	<section class="bar">
		<div class="container">
			<div class="row">

				<div class="g-10 push-1 g-sm-12 push-sm-0">

					<div class="title m-b">

						<?php
						if (have_rows($field)) {

							while (have_rows($field)): the_row();

								?>
								<h1 class="text-center">
									<?php the_sub_field('a-headline'); ?>
								</h1>
								<div class="lead text-center">
									<?php the_sub_field('a-text'); ?>
								</div>

							<?php

							endwhile;

						}
						?>


					</div>

					<div class="lead text-center"><?php echo get_field($field . '_a-text', $page_id); ?></div>

				</div>

			</div>
		</div>
	</section>

	<?php
	return TRUE;
}