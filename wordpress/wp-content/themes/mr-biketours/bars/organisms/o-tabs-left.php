<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismTabsLeft($field = 'o-tabs', $page_id = 0) {
	if (have_rows($field,$page_id)) {
		?>

		<div class="row  d-flex  align-items-stretch">
			<?php
			$tabs = array();
			while (have_rows($field,$page_id)) : the_row();
				array_push($tabs,array(
					'id' => uniqid('tab_'),
					'headline' => get_sub_field('m-tab_a-headline'),
					'text' => get_sub_field('m-tab_a-text'),
					'icon' => get_sub_field('m-tab_a-icon'),
				));
			endwhile;
				?>
				<ul class="nav nav-tabs  nav-tabs-justified  tabs--stacked  tabs  g-6 g-sm-12" id="myTabs">
					<?php
					foreach ($tabs as $tab) { ?>
						<li role="presentation" class="active"><a href="#<?=$tab['id']; ?>"><i class="icon tabs__icon icon-<?=$tab['icon'];?>"></i><?=$tab['headline']; ?></a></li>
					<?php } ?>
				</ul>


				<!--Tab panes-->
				<div class="tab-content g-6  g-sm-12" style="height: 270px;">
					<?php
					$i=0;
					foreach ($tabs as $tab) { ?>
						<div role="tabpanel" class="tab-pane <?php $i===0 ? 'active' : ''; ?>" id="<?=$tab['id']; ?>">
							<?=$tab['text']; ?>
						</div>
						<?php
						$i++;
					} ?>
				</div>
				<!--/Tab panes-->
		</div>

		<?php
		return TRUE;
	}

	return FALSE;
}