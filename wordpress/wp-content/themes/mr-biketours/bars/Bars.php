<?php
/**
 * Created by PhpStorm.
 * User: Olli
 * Date: 22.03.2017
 * Time: 12:23
 */

namespace POINTDIGITAL;


class Bars {

	static private $instance = array();

	/**
	 * @return \POINTDIGITAL\Bars
	 */
	static public function getInstance() {
		$class = \get_called_class();
		if (!array_key_exists($class, self::$instance)) {
			self::$instance[$class] = new $class;
		}

		return self::$instance[$class];
	}

	protected function __construct() {
		$this->_autoload();
	}

	protected function __clone() {
	}

	function _autoload() {
		$organisms_dir = dirname(__FILE__) . "/{organisms,helper,molekules}/";
		$files = glob($organisms_dir . "*.php", GLOB_BRACE);
		foreach ($files as $inc) {
			if (is_file($inc)) {
				require_once($inc);
			}
		}
	}

	function getId() {
		if (get_post_type() === 'post') {
			return get_option('page_for_posts');
		} else {
			//$id = get_the_ID();
			return FALSE;
		}
	}

	/**
	 * @param string $target Organism or Helper name (lower case)
	 * @param string $field ACF fieldname
	 * @param array $options
	 * @return string|boolean
	 * @throws \Exception
	 */
	function get($target, $field, $options = array()) {
		$id = $this->getId();
		ob_start();
		try {
			$bool = $this->getOrganism($target, $field, $id, $options);
		} catch (\Exception $e) {
			try {
				$bool = $this->getHelper($target, $field, $id, $options);
			} catch (\Exception $e) {
				throw new \Exception('Organism or Helper "' . $target . '" not found!');
			}
		}

		$content = ob_get_contents();
		ob_end_clean();

		if ($bool === FALSE) {
			return FALSE;
		}

		return $content;
	}

	/**
	 * @param string $target Organism or Helper name (lower case)
	 * @param string $field ACF fieldname
	 * @param array $options
	 */
	function _print($target, $field, $options = array()) {
		echo $this->get($target, $field, $options);
	}

	/**
	 * @param string $organism Organism name (lower case)
	 * @param string $field ACF fieldname
	 * @param array $options
	 * @return bool
	 * @throws \Exception
	 */
	function getOrganism($organism, $field, $id, $options) {
		$getter = "getOrganism" . $this->getFunctionName($organism);
		if (function_exists($getter)) {
			$reflFunc = new \ReflectionFunction($getter);
			$this->_printComment("Bars Organism: " . basename($reflFunc->getFileName()) . " - start");
			$bool = $getter($field, $id, $options);
			$this->_printComment("Bars Organism: " . basename($reflFunc->getFileName()) . " - end");
		} else {
			throw new \Exception('Getter "' . $getter . '" doesn\'t exist!');
		}

		return $bool;
	}

	/**
	 * @param string $organism Organism name (lower case)
	 * @param string $field ACF fieldname
	 * @return bool
	 * @throws \Exception
	 */
	function getHelper($organism, $field, $id) {
		$getter = "getHelper" . $this->getFunctionName($organism);
		if (function_exists($getter)) {
			$reflFunc = new \ReflectionFunction($getter);
			$this->_printComment("Bars Helper: " . basename($reflFunc->getFileName()) . " - start");
			$bool = $getter($field, $id);
			$this->_printComment("Bars Helper: " . basename($reflFunc->getFileName()) . " - end");
		} else {
			throw new \Exception('Getter "' . $getter . '" doesn\'t exist!');
		}

		return $bool;
	}

	private function _printComment($comment) {
		echo "\n\n<!-- {$comment} -->\n\n";
	}

	private function getFunctionName($unformated) {
		$formated = ucfirst($unformated);

		$t = explode('-', $formated);
		array_walk($t, function (&$value, $key) {
			$value = ucfirst($value);
		});
		$formated = implode('', $t);

		return $formated;
	}

	function getMenu($menu) {
		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object($locations[$menu]);
		$menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
		return $this->menuWalker($menuitems);
	}

	private function menuWalker($menuitems) {
		global $wp;
		$current_url = home_url(add_query_arg(array(), $wp->request)) . "/";

		$menu = array();
		$count = 0;
		//$submenu = false;
		if (!is_array($menuitems)) return FALSE;
		foreach ($menuitems as $item):
			$link = $item->url;
			$title = $item->title;


			// item does not have a parent so menu_item_parent equals 0 (false)
			if (!$item->menu_item_parent):
				$menu[$item->ID] = array(
					'ID' => $item->ID,
					'title' => $title,
					'link' => $link,
					'children' => NULL,
					'active' => FALSE,
					'classes' => $item->classes
				);
				// save this id for later comparison with sub-menu items
				$parent_id = $item->ID;

			endif;

			if (($item->type === 'taxonomy' || $item->object !== 'page') && array_key_exists($item->ID, $menu)) {
				$menu[$item->ID]['object'] = $item->object;
				$menu[$item->ID]['object_id'] = $item->object_id;

			} elseif (array_key_exists($item->ID, $menu)) {
				$menu[$item->ID]['object'] = FALSE;
			}

			if ($parent_id == $item->menu_item_parent):
				if (!is_array($menu[$parent_id]['children'])) {
					$menu[$parent_id]['children'] = array();
				}
				$menu[$parent_id]['children'][$item->ID] = array(
					'ID' => $item->ID,
					'title' => $title,
					'link' => $link,
					'children' => NULL,
					'parentID' => $parent_id,
					'active' => FALSE,
					'classes' => $item->classes
				);

				if (($item->type === 'taxonomy' || $item->object !== 'page') && array_key_exists($item->ID, $menu[$parent_id]['children'])) {
					$menu[$parent_id]['children'][$item->ID]['object'] = $item->object;
					$menu[$parent_id]['children'][$item->ID]['object_id'] = $item->object_id;

				} elseif (array_key_exists($item->ID, $menu[$parent_id]['children'])) {
					$menu[$parent_id]['children'][$item->ID]['object'] = FALSE;
				}

				if ($current_url == $link) {
					$menu[$parent_id]['children'][$item->ID]['active'] = TRUE;
					$menu[$parent_id]['active'] = TRUE;
				}

			endif;

			if($parent_id != $item->menu_item_parent && $menu[$parent_id] && $menu[$parent_id]['children']):
				if(!is_array($menu[$parent_id]['children'][$item->menu_item_parent]['children'])) {
					$menu[$parent_id]['children'][$item->menu_item_parent]['children'] = array();
				}
				$menu[$parent_id]['children'][$item->menu_item_parent]['children'][$item->ID] = array(
					'ID' => $item->ID,
					'title' => $title,
					'link' => $link,
					'children' => NULL,
					'parentID' => $parent_id,
					'active' => FALSE,
					'classes' => $item->classes
				);
				if (($item->type === 'taxonomy' || $item->object !== 'page') && array_key_exists($item->ID, $menu[$parent_id]['children'][$item->menu_item_parent]['children'])) {
					$menu[$parent_id]['children'][$item->menu_item_parent]['children'][$item->ID]['object'] = $item->object;
					$menu[$parent_id]['children'][$item->menu_item_parent]['children'][$item->ID]['object_id'] = $item->object_id;

				} elseif (array_key_exists($item->ID, $menu[$parent_id]['children'][$item->menu_item_parent]['children'])) {
					$menu[$parent_id]['children'][$item->menu_item_parent]['children'][$item->ID]['object'] = FALSE;
				}

				if ($current_url == $link) {
					$menu[$parent_id]['children'][$item->menu_item_parent]['children'][$item->ID]['active'] = TRUE;
					$menu[$parent_id]['children'][$item->menu_item_parent]['active'] = TRUE;
					$menu[$parent_id]['active'] = TRUE;
				}
			endif;

			$count++; endforeach;

		return $menu;
	}

	protected $galleryImages = array();

	function addGalleryImage($gallery, $image) {
		if (!isset($this->galleryImages[$gallery])) {
			$this->galleryImages[$gallery] = array();
		}
		array_push($this->galleryImages[$gallery], $image);
	}

	function getGalleryImages() {
		return $this->galleryImages;
	}

	function hasGalleryImages() {
		return count($this->galleryImages) > 0;
	}

}
