<?php
/**
 * @param $field
 */
function getHelperCollapsedNav($menu = 'main') {
	$bars = \POINTDIGITAL\Bars::getInstance();
	$menuitems = $bars->getMenu($menu);
	if (is_array($menuitems)) {
		?>

		<!--nav collapsed-->
		<nav class="stage-shelf stage-shelf-right hide show-sm invisible" id="sidebar" style="display:none;">
			<div class="stage-shelf__wrapper  container">
				<!--nav-->
				<ul class="nav nav--stacked nav-toggle" id="nav-toggle">
					<?php
						foreach ($menuitems as $item) {
							$hasChildren = FALSE;
							if ($item['children'] !== NULL && is_array($item['children'])) {
								$hasChildren = TRUE;
							}
							if (!is_array($item['classes'])) {
								$item['classes'] = array();
							}
							?>

							<li class="nav-toggle__item <?= ($hasChildren ? 'nav-toggle__item--parent js--responsive-menu-parent' : ''); ?>">
								<a href="<?= $item['link']; ?>"><?= $item['title']; ?></a>
								<?php if ($hasChildren) {?>
									<div class="nav-toggle_item_child-page">
										<div class="nav-toggle_item_child-page__inner">
											<div class="nav-toggle_item_child-page__back-outer">
												<span class="nav-toggle_item_child-page__back js--nav-toggle_item_child-page__back">
													<i class="icon icon--arrow-left"></i>
													<?= getTranslation('button_back')?>
												</span>
											</div>
											<?php foreach ($item['children'] as $child)	{
												if(get_field('a-highlight', $child["ID"])) {
													continue;
												}
												?>
												<div class="nav-toggle_item_child-page_section">
													<?php
														$hasActiveChilds = FALSE;
														if($child['children'] !== NULL && is_array($child['children'])){
															foreach ($child['children'] as $childChild):
																$hasActiveChilds = $hasActiveChilds || $childChild['active'];
															endforeach;
														}
													?>
													<a class="<?= ($child['active'] && !$hasActiveChilds ? 'active' : '').(get_field('a-is-column', $child["ID"]) ? ' link-column':'')?>" href="<?= $child['link']; ?>"><?= $child['title']; ?></a>
													<?php if($child['children'] !== NULL && is_array($child['children'])){?>
														<ul  class="list-unstyled nav-toggle__menu">
															<?php foreach ($child['children'] as $childChild)	{?>
																<li><a href="<?=$childChild["link"]?>" class="<?= $childChild['active'] ? 'active' : ''?>"><?=$childChild["title"]?></a></li>
															<?php }?>
														</ul>
													<?php }?>
												</div>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
							</li>
							<?php
						}
					?>
					<li class="nav__divider m-y-2"></li>
					<li class="panel  nav-toggle__item nav-toggle__item--smaller">

						<a href="#" data-toggle="modal" data-target="#modal-download-form" class="js--close-menu">
							<?= getTranslation('header_download_list')?>
							<span class="download-list-button__count">0</span>
						</a>
					</li>
					<?php if(is_user_logged_in()):?>
					<li class="panel  nav-toggle__item nav-toggle__item--smaller">
						<?php
						$haendlerlink = "/haendlerportal";
						switch (ICL_LANGUAGE_CODE) {
							case 'en': $haendlerlink = "/en/dealer-login"; break;
							case 'en-us': $haendlerlink = "/en-us/dealer-login"; break;
						}
						?>
						<a href="<?=$haendlerlink?>">
							<?= getTranslation('header_dealer_switch')?>
						</a>
					</li>
					<?php endif;
					?>
					<?php
						$metaMenuitems = $bars->getMenu("menu_custom_header_meta");
						if (is_array($metaMenuitems)):
							foreach ($metaMenuitems as $metaItem):?>
								<li class="panel  nav-toggle__item nav-toggle__item--smaller">
									<a href="<?= $metaItem['link']; ?>"><?= $metaItem['title']; ?></a>
								</li>
							<?php endforeach;
						endif;
					?>

				</ul>
				<div class="c_forms language-select-mobile">
					<?php
					function languages_list_dropdown(){
						$languages = apply_filters("wpml_active_languages", TRUE,"orderby=code");
						if(!empty($languages)){
							echo '<select id="language_select_from-mobile" class="input-select m-b-0" onchange="document.location.href=this.options[this.selectedIndex].value;">';
							foreach($languages as $l){
								echo "<option " . ($l['active'] ? 'selected="selected"' : '') ." value=\"". $l['url'] ."\" data-lang=\"".$l["native_name"]."\">". $l["translated_name"] ."</option>";
							}
							if(count($languages) == 1) {
								$curLang = reset($languages);
								if($curLang["native_name"] === "de" || $curLang["native_name"] === "DE") {
									echo "<option value=\"/en/\" data-lang=\"en\">EN</option>";
								}
								else {
									echo "<option value=\"/\" data-lang=\"de\">DE</option>";
								}
							}
							echo '</select>';
						}
					}
					?>
					<div class="language-select-mobile--inner">
						<?php
						languages_list_dropdown();?>
					</div>
				</div>
			</div>
		</nav>
		<?php
	}
}
