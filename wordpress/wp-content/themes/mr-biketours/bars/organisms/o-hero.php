<?php
/**
 * @param $field
 * @param $page_id
 * @param $options
 * @return bool
 */
function getOrganismHero($field = 'o-hero', $page_id = 0, $options=array()) {
	$count = 0;
	?>

	<?php if (have_rows($field, $page_id)):

		while (have_rows($field, $page_id)) :the_row() ?>

			<div class="bar__custom  bar--y-middle <?php echo isset($options['small']) ? 'fill-height--50' : ''; ?>">

				<div class="bar__background">
					<?php
					$image = wp_get_attachment_image_src(attachment_url_to_postid(get_sub_field('m-hero-slide_a-image')),'mediumlarge');
					if(is_array($image)){
						$count++;
					}
					?>

					<div class="bar__bg-img" style="background-image: url('<?= $image[0]; ?>');"></div>



				</div>

				<div class="bar__foreground text-left">

					<div class="container">

						<div class="row">
							<div class="g-6 push-<?php echo isset($options['small']) ? '0' : '3 text-center'; ?> g-sm-10 push-sm-1">
								<?php
								$overline = get_sub_field('m-hero-slide_a-overline');
								if($overline){
									?><div class="bar__lead text-uppercase text--inverse"><?=$overline; ?></div><?php
								}
								?>

								<h1 class="bar__title  text--inverse  m-t-0 <?php echo isset($options['small']) ? 'bar__title--smaller' : ''; ?>"><?php the_sub_field('m-hero-slide_a-headline'); ?></h1>
								<?php
								$text = get_sub_field('m-hero-slide_a-text');
								if($text) {
									?><div class="bar__lead text--inverse"><?=$text; ?></div><?php
								}
								?>
							</div>
						</div>

					</div>

				</div>

			</div>

		<?php endwhile;
		if($count<=0){
			return false;
		}

		return TRUE;
	endif;

	return FALSE;
}