<?php
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

	if (empty($pagerange)) {
		$pagerange = 2;
	}

	/**
	 * This first part of our function is a fallback
	 * for custom pagination inside a regular loop that
	 * uses the global $paged and global $wp_query variables.
	 *
	 * It's good because we can now override default pagination
	 * in our theme, and use this function in default quries
	 * and custom queries.
	 */
	global $paged;
	if (empty($paged)) {
		$paged = 1;
	}
	if ($numpages == '') {
		global $wp_query;
		$numpages = $wp_query->max_num_pages;
		if(!$numpages) {
			$numpages = 1;
		}
	}

	/**
	 * We construct the pagination arguments to enter into our paginate_links
	 * function.
	 */
	$pagination_args = array(
		'base'            => get_pagenum_link(1) . '%_%',
		'format'          => 'page/%#%',
		'total'           => $numpages,
		'current'         => $paged,
		'show_all'        => False,
		'end_size'        => 1,
		'mid_size'        => $pagerange,
		'prev_next'       => True,
		'prev_text'       => __('&laquo;'),
		'next_text'       => __('&raquo;'),
		'type'            => 'array',
		'add_args'        => false,
		'add_fragment'    => ''
	);

	$paginate_links = paginate_links($pagination_args);

	if ($paginate_links) {

		?>
		<!-- <?= count($paginate_links)?>-->
		<div class="row">
			<nav aria-label="Page navigation">
				<ul class="pagination pagination-lg center-block">
					<?php
					$linkLen = count($paginate_links);

					for($i = 0; $i < $linkLen; $i++) {

						//ADD Prev wenn Seite 1 ist (befindet sich sonst nicht in paginate_links)
						if($paged == 1 && $i == 0) {
							?>
							<li class="disabled">
								<a aria-label="Previous">
									<span class="prev page-numbers" >«</span>
								</a>
							</li>
							<?php
						}

						$listItemClass = '';
						if($paged == 1 && $i == 0 || $paged == $i && $paged > 1 && $i != 0) {
							$listItemClass = 'active';
						}

						$ariaLabel = '';
						if($paged > 1 && $i == 0) {
							$ariaLabel = "Previous";
						}
						elseif ($i-1 == $numpages) {
							$ariaLabel = "Next";
						}
						?>

						<li class="<?= $listItemClass ?>" <?= ($ariaLabel != '')? 'aria-label="'.$ariaLabel.'"' : '' ?>><?= $paginate_links[$i];?></li>

						<?php

						//Add next wenn letzte Seite ist (befindet sich sonst nicht in paginate_links)
						if($paged == $numpages && $i+1 == $linkLen) {
							?>
							<li class="disabled">
								<a aria-label="Next">
									<span class="prev page-numbers" >»</span>
								</a>
							</li>
							<?php
						}
					}
					?>
				</ul>
			</nav>
		</div>

		<?php
	}

}