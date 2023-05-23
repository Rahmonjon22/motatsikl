<?php // TODO: Die Suche muss noch gemacht werden
get_header();
include "_templates/top.php"; ?>


<div id="stage" class="stage">

	<main class="page-content" id="Page">

		<section>
			<div class="container">

				<div class="grid grid--col-12">



						<?php
						$s = get_search_query();
						$args = array(
							's' => $s
						);
						// The Query
						$the_query = new WP_Query($args);
						if ($the_query->have_posts()):?>
						<div class="grid__item--col-12">
							<h2 class="m-b-0"><?=getTranslation('page_search_results');?>: <?=get_query_var('s')?></h2>
						</div>
						<div class="grid__item--col-10 grid__item--col-offset-1">
							<div class="search-results-content">
								<?php while ($the_query->have_posts()):
									$the_query->the_post();
									$desc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
									if(!$desc) {
										if (have_rows('group-intro')):
											while (have_rows('group-intro')): the_row();
												$desc = get_sub_field('group-intro_text-1');
											endwhile;
										endif;
										if(!$desc) {
											$desc = getTranslation('page_search_results_desc');
										}
									}
									$desc = wp_trim_words($desc,35);

									?>
									<div class="search-results-content__item">
										<a href="<?php the_permalink(); ?>">
											<h3 class="link m-y-0"><?php the_title(); ?></h3>
											<p class="m-b-0"><?=$desc?></p>
										</a>
									</div>
								<?php endwhile;?>
							</div>
						</div>
						<?php else:?>
							<div class="grid__item--col-12">
								<h2 class="m-b-0"><?=getTranslation('page_search_results_404_headline');?></h2>
							</div>
							<div class="grid__item--col-10 grid__item--col-offset-1">
								<div class="alert alert-info">
									<p><?=getTranslation('page_search_results_404');?></p>
								</div>
							</div>
						<?php endif; ?>



				</div>

			</div>

		</section>

	</main>



</div>
<?php
include "template-parts/template-part--ap-data.php";
?>
<?php get_footer(); ?>
