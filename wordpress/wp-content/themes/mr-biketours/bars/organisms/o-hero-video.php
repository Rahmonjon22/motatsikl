<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismHeroVideo($field = 'o-hero', $page_id = 0) {
	?>

	<?php if (have_rows($field, $page_id)):
		$image = get_sub_field($field . '_a-image');
		$thumb = bars__get_thumb($image, array('min' => 1024, 'max' => 1980));
		?>
		<div class="bar__custom  bar--y-middle">

			<div class="bar__background">
				<div class="bar__bg-video" style="background-image: url('<?= $thumb; ?>');">
					<video class="video-full" autoplay loop muted preload="metadata">
						<source src="<?php the_field($field . '_a-video', $page_id); ?>" type="video/mp4">
					</video>
				</div>

			</div>

			<div class="bar__foreground container text-left">

				<div class="row">
					<div class="g-8 push-2 g-sm-10 push-sm-1 text-center">
						<?php
						$overline = get_field($field . '_a-overline', $page_id);
						if ($overline) {
							?>
							<div class="bar__lead text-uppercase text-inverse"><?= $overline; ?></div><?php
						}
						?>

						<h1 class="bar__title text-inverse"><?php the_field($field . '_a-headline', $page_id); ?></h1>
						<?php
						$text = get_field($field . '_a-text', $page_id);
						if ($text) {
							?>
							<div class="bar__lead text-inverse"><?= $text; ?></div><?php
						}
						?>
					</div>
				</div>

			</div>

		</div>

		<?php

		return TRUE;
	endif;

	return FALSE;
}