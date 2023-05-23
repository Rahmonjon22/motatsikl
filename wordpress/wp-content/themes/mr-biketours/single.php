<?php
get_header();
/*include "_templates/top.php";*/ ?>
<div id="stage" class="stage">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<main class="page-content page-content-default" id="Page">
			<section class="underline underline--primary-color p-y-2">

				<div class="container">

					<div class="grid grid--col-12">
						<div class="grid__item--col-12">
							<h1><?php the_title(); ?></h1>

							<div>

								<?php the_content(); ?>

							</div>
						</div>
					</div>

				</div>

			</section>
		</main>

	<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
