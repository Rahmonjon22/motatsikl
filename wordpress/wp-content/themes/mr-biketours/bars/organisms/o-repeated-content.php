<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismRepeatedContent($field = 'o-repeated_content', $page_id = 0) {
	global $bars;
	if (have_rows($field, $page_id)) {
		$md5 = md5($field);
		while (have_rows($field, $page_id)) : the_row();
			$subfield = 'm-repeated_content';
			$image_position = get_sub_field($subfield . '_a-image_position');
			$image = get_sub_field($subfield . '_a-image');
			?>

			<section class="bar  bar--blog m-b-2" id="BlogPost">

				<!--Toolbar + Headline-->
				<div class="container container-fluid-md">
					<!--Headline-->
					<div class="row">
						<div class="<?php if($image){ ?>g-6  g-sm-12 <?php
							if ($image_position == "left") {
								echo "push-6 push-sm-0";
							} elseif ($image_position == "right") {
								echo "pull-6 pull-sm-0";
							}}else{ ?>g-12<?php } ?>">
							<h2 class="blog__title m-t-0"><?php the_sub_field($subfield . '_a-headline'); ?></h2>
						</div>
					</div>
					<!--/Headline-->
				</div>
				<!--/Toolbar + Headline-->

				<!--Blogpost-->
				<div class="container-fluid   p-x-0  pos-r  <?=$image_position !== 'full'?'js--blog-wrapper':''?> d-flex  flex-column">
					<!--container text-->
					<div class="container container-fluid-md flex-sm-last">

						<div class="row">

							<article class="<?php if($image){ ?><?=$image_position =='full'?'g-12':'g-6  g-sm-12 '?> <?php
							if ($image_position == "left") {
								echo "push-6 push-sm-0";
							} elseif ($image_position == "right") {
								echo "pull-6 pull-sm-0";
							}}else{ ?>g-12<?php } ?>">
								<div class="blog__body">
									<?php the_sub_field($subfield . '_a-text'); ?>
								</div>
							</article>

						</div>

					</div>
					<!--/container text-->

					<!--container image-->
					<?php
					if ($image) {

						$first_sizes = bars__getimagesizes($image['url']);


						$bars->addGalleryImage($md5, array(
							'src' => $image['sizes']['large'],
							'w' => $image['sizes']['large-width'],
							'h' => $image['sizes']['large-height'],
							'md5' => $md5
						));
						?>
						<div class="container-fluid container-lg <?=$image_position !== 'full'?'container--offgrid ':''?>   flex-sm-first  m-b-sm-2" itemscope itemtype="http://schema.org/ImageGallery">
							<div class="row">
								<div class="<?=$image_position == 'full'?'g-12':'g-6'?> g-sm-12  <?php
								if ($image_position == "left") {
									echo "";
								} elseif ($image_position == "right") {
									echo "order-push-6  order-push-sm-0";
								} ?>" style="pointer-events: all;">
									<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
										<a href="<?= $image['sizes']['large']; ?>" data-size="<?= $first_sizes['width']; ?>x<?= $first_sizes['height']; ?>" data-gallery-id="<?= $md5; ?>" itemprop="contentUrl" class="view overlay  js--pswp-gallery hm-dark">
											<img class="blog__img  img-responsive" src="<?= $image['sizes']['medium_large']; ?>" alt="">
											<div class="mask d-flex align-items-center">
												<span class="center-block"><i class="icon icon--loupe"></i></span>
											</div>
										</a>
										<figcaption class="text-small p-t-quarter text-center"><?php echo $image['title'] ?></figcaption>
									</figure>
								</div>
							</div>
						</div>
						<!--/container image-->
					<?php } ?>
				</div>
				<!--Blogpost-->
			</section>
			<?php
		endwhile;

		return TRUE;
	}

	return FALSE;
}