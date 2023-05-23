<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismBar($field = 'o-bar', $page_id = 0) {


	if (have_rows($field)) {

		?>

		<section class="bar">
			<div class="container">
				<div class="row">

					<?php

					while (have_rows($field)):
						the_row();

						switch (get_row_layout()) {

							case 'text':
								?>
								<div class="g-6 g-sm-12">
									<h2><?php the_sub_field('a-headline'); ?></h2>
									<div><?php the_sub_field('a-text'); ?></div>
								</div>
								<?php
								break;
							case 'image':
								?>
								<div class="g-6 g-sm-12">
									<div class="slick slick--center">
										<?php
										$images = get_sub_field('a-image');

										foreach ($images as $image) {

											?>
											<div class="slick-slide-img" style="background-image: url('<?php echo $image['sizes']['large'] ?>');"></div>
											<?php

										}
										?>
									</div>
								</div>
								<?php

								break;
							case 'card':

								?>

								<div class="g-4 g-sm-12">
									<?php getMolekuleCard('', 'm-card'); ?>
								</div>

								<?php

								break;
							default:
								break;

						}

					endwhile;

					?>

				</div>
			</div>
		</section>


		<?php

	}


	?>


	<?php


}