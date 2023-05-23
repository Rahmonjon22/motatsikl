<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismBlockquote($field = 'o-blockquote', $page_id = 0) {
	?>
	<section class="bar">
		<div class="container">
			<div class="row">
				<div class="g-12 g-lg-8 push-lg-2 push-0">
					<blockquote class="blockquote text-center">
						<?php echo get_sub_field($field . '_a-text', $page_id); ?>
					</blockquote>
				</div>
			</div>
		</div>
	</section>
	<?php
	return TRUE;
}