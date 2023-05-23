<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismSlider($field = 'o-slider', $page_id = 0) {

	$headline = get_sub_field($field . '-headline', $page_id);
	$images = get_sub_field($field);


	if ($images) { ?>

		<section class="bar">
			<div class="container">


				<?php if ($headline) { ?>
					<div class="row">
						<h4 class="m-b"><?= $headline; ?></h4>
					</div>
				<?php } ?>

				<div class="row">

					<div class="g-12">

						<div class="slick slick--center autoplay">

							<?php foreach ($images as $image) { ?>

								<div class="slick-slide-img" style="background-image: url('<?php echo $image['sizes']['large']; ?>')"></div>

							<?php } ?>


						</div>

					</div>

				</div>
			</div>
		</section>
		<?php
		return TRUE;
	}

	return FALSE;

}