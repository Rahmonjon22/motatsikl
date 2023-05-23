<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismIcons($field = 'o-icons', $page_id = 0) {


	if (have_rows($field)) {

		?>

		<section class="bar">
			<div class="container">


				<div class="row justify-content-center">

					<?php


					while (have_rows($field)): the_row();

						?>

						<div class="g-4 p-a text-center">
							<i class="icon icon--<?php the_sub_field('a-icon') ?> text-primary" style="font-size: 6rem;"></i>
							<h3><?php the_sub_field('a-title') ?></h3>
						</div>

					<?php

					endwhile;

					?>

				</div>
			</div>
		</section>
		<?php

	}


	?>

	<?php
	return TRUE;
}