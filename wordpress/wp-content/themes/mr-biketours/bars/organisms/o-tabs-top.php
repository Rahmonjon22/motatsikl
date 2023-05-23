<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismTabsTop($field = 'o-tabs', $page_id = 0) {
	if (have_rows($field,$page_id)) {
		?>

		<div class=" container-fluid ">
				<div class="row">
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
					$g = ceil(12 / count($tabs));
					?>
					<ul class="nav nav-tabs  nav-tabs-justified  tabs  g-12 g-sm-12  m-b-2  p-x-0 js--tabs" id="tabs-<?=$field?>">
						<?php
						$i=0;
						foreach ($tabs as $tab) {
							?>
							<li role="presentation" class="<?= $i===0 ? 'active ' : ''; ?>g-<?=$g;?> g-sm-12 p-x-0">
								<a href="#<?=$tab['id']; ?>" class="tabs__link text-center"><i class="icon tabs__icon icon-<?=$tab['icon'];?>"></i><?=$tab['headline']; ?></a>
							</li>
						<?php
							$i++;
						} ?>
					</ul>
				</div>
			</div>
			<div class="container">
				<div class="row">

				<!--Tab panes-->
					<div class="tab-content g-12 p-x-0">
					<?php
					$i=0;
					foreach ($tabs as $tab) { ?>
						<div role="tabpanel" class="tab-pane <?= $i===0 ? 'active ' : ''; ?>p-x-0 p-y-0" id="<?=$tab['id']; ?>">
							<?=$tab['text']; ?>
						</div>
						<?php
						$i++;
					} ?>
					</div>
				</div>
				<!--/Tab panes-->
		</div>

		<?php
		return TRUE;
	}

	return FALSE;
}