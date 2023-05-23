<?php
/**
 * Created by PhpStorm.
 * User: Olli
 * Date: 22.03.2017
 * Time: 15:10
 */
/**
 * @param array $terms
 */
function getHelperTermsSlider($terms) {
	?>
	<div class="row slider-basic">
		<?php $query = new WP_Query(
			array(
				'post_type' => 'post',
				'orderby' => 'asc',
				'cat' => implode(",", $terms)
			)
		);
		?>
		<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

			<div class="g-4 g-sm-6 g-xs-12">
				<h3><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>" class="btn btn-block btn--more text-left p-x-0"><?php echo __('mehr','bars-theme'); ?></a>
			</div>

        <?php wp_reset_postdata(); ?>
		<?php endwhile; endif; ?>

	</div>
	<?php
}
