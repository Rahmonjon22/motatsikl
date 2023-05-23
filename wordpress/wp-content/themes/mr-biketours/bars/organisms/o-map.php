<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismMap($field = 'o-lead', $page_id = 0) {

	?>


		<section class="bar p-y-3">

			<div class="container  container-fluid-md">

				<div class="row  d-flex  flex-sm-column  align-items-stretch">

					<!--card: map-->
					<div class="g-6  g-sm-12  p-l-0  p-x-sm-0  d-flex  flex-sm-last">
						<div class="map  d-flex flex-column  height-sm--500">

							<div class="map__body p-y-0  p-x-0">

								<section class="bar bar--map bar__bg-img">

									<div class="bar__custom bar--y-middle">

										<div id="bar__map" class="bar__background p-x-0"></div>

										<div class="bar__foreground  pos-s  container text-center">

											<address class="map__kontakt-box  text-small">

												<p><?php the_field('company', 'options')?></p>

												<div class="row">
													<div class="g-6 g-md-12 ">
														<p><?php the_field('street', 'options')?><br>
															<?php the_field('city', 'options')?></p></div>
													<div class="g-6 g-md-12">
														<p>
															<i class="icon icon--phone"></i> <?php the_field('phone', 'options');?><br>

														</p></div>
												</div>

												<i class="icon icon--mail"></i>
												<a href="mailto:<?php the_field('email', 'options');?>" class="link link--inverse"><?php the_field('email', 'options');?></a>
											</address>

										</div>

									</div>

								</section>

							</div>

						</div>
					</div>
					<!--/card map-->


				</div>
				<!--/row-->

			</div>

		</section>

		<?php





	?>

	<?php
	return TRUE;
}