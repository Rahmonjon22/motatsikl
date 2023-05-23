<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismTeaser($field = 'o-teaser', $page_id = 0) {

	$teaser = get_sub_field($field);

	$image = $teaser['a-image'];
	$thumb = $image['sizes']['large'];

	$image_position = $teaser['a-image_position'];


	?>
	<section class="bar">
		<div class="container">


			<div class="row">

				<div class="g-12 pull-sm-left  <?php if ($image_position == "left") {
					echo "pull-left   order-pull-1  order-pull-sm-0";
				} else {
					echo "pull-right  order-push-1  order-push-sm-0";
				} ?>">

					<section class="bar  bar--teaser  fill-height  fill-height--50  fill-height-lg--50    bar--<?php if ($image_position == "left") {
						echo "left";
					} else {
						echo "right";
					} ?>  bar--break  bar--break--top   p-a-0">

						<div class="bar__custom  bar--y-middle">

							<div class="bar__foreground  text-left">

								<div class="row">
									<div class="g-4 g-md-5 g-sm-12 lead <?php
									if ($image_position == "left") {
										echo "push-8 push-md-7 push-sm-0    order-push-1 order-push-sm-0";
									} elseif ($image_position == "right") {
										echo "order-pull-sm-0";
									} ?>">
										<h3 class="m-t-0"><?php echo $teaser['a-headline']; ?></h3>

										<?php
										echo $teaser['a-text'];

										if ($teaser['a-link']) { ?>
											<a href="<?php echo $teaser['a-link']; ?>" class="btn  btn--transparent  btn--more btn--more--before text-left p-x-0"><?php echo $teaser['a-link_text']; ?></a><?php
										}
										?>

									</div>

								</div>

							</div>

							<div class="bar__background">

								<div class="row">
									<div class="g-8  g-md-7  g-sm-12   fill-height--50  fill-height-lg--50  height-sm--400 <?php if ($image_position == "left") {
										echo " push-0  push-sm-0 ";
									} elseif ($image_position == "right") {
										echo " push-4 push-md-5 push-sm-0 ";
									} ?>">
										<div class="bar__bg-img" style="background-image:url('<?php echo $thumb; ?>');"></div>

									</div>

								</div>

							</div>

						</div>

					</section>

				</div>

			</div>
		</div>
	</section>
	<?php
	return TRUE;
}