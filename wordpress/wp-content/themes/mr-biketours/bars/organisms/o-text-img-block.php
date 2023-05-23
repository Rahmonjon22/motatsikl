<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismTextImgBlock($field = 'o-text-img-block', $page_id = 0) {
	$headline = get_field($field . '_m-headline', $page_id);
	$text = get_field($field . '_m-text', $page_id);
	$bild = get_field($field . '_m-image', $page_id);
	$thumb = bars__get_thumb($bild['a-image']);
	$link = get_field($field . '_m-link', $page_id);

	?>


	<article class="row d-sm-flex flex-column">

		<div class="g-12 flex-first">

			<div class="small"><?=get_field($field.'-m-overline',$page_id); ?></div>
			<h2 class="blog__title m-t-0"><?php echo $headline['a-headline']; ?></h2>

		</div>

		<div class="g-6  g-sm-12  pull-sm-0  flex-last">

			<div class="blog__body">

				<?php echo $text['a-text']; ?>

			</div>

		</div>

		<div class="g-5 push-1 g-sm-12 push-sm-0 m-b-sm-2 flex-first">

			<figure class="m-b">

				<img src="<?php echo $thumb; ?>" alt="Image description" class="blog__img  img-responsive">

				<figcaption class="text-small p-t-quarter text-center">
				</figcaption>

			</figure>

		</div>

	</article>


	<?php
	return TRUE;
}