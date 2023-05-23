<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismPause($field = 'o-pause', $page_id = 0) {
	$image = get_sub_field('a-image');

	if ($image) {
		?>
		<section class="bar">
			<div class="container-fluid">
				<div class="row">
					<div class="g-12 bar bar--brand  bar__bg-img  bar--paralax  bar--blend  bar--blend--dark bar--label text-center" style="background-image: url('<?php echo $image['sizes']['large']; ?>');">

						<div class="bar__custom  bar__foreground  p-a-3">

							<h2 class="bar__title  text--primary"><?php the_sub_field('a-headline'); ?></h2>
							<h4 class="text--primary"><?php the_sub_field('a-subline'); ?></h4>
							<button class="btn btn-primary m-t" onclick="location.href='<?php the_sub_field('a-btn-link'); ?>'"><?php the_sub_field('a-btn-text'); ?></button>

						</div>
					</div>
				</div>
			</div>
		</section>
		<?php

	}

}
