<?php
/**
 *	Split-your-elgg plugin
 *	@package Split-your-elgg
 *	@author Emmanuel Salomon @ManUtopiK
 *	@license GNU Affero General Public License, version 3 or late
 *	@link https://github.com/ManUtopiK/split-your-elgg
 **/

elgg_register_event_handler('init', 'system', 'split_your_elgg_init');

/**
 * Initialize elgg split_your_elgg plugin.
 */
function split_your_elgg_init() {

	elgg_extend_view('css/elgg','split-your-elgg/css');
	elgg_extend_view('js/elgg', 'split-your-elgg/js');

	// Register page handler to split elgg with 2 frames
	elgg_register_page_handler('split', 'split_page_handler');

	// register action
	elgg_register_action('split-your-elgg/split', elgg_get_plugins_path() . "/split-your-elgg/actions/split-your-elgg/split.php", 'public');
}



/**
 * Page hander to split ggouv with 2 frame
 *
 * @param array $page Page array
 *
 * @return bool
 * @access private
 */
function split_page_handler() {

	$A = get_input('a', elgg_get_site_url());
	$B = get_input('b', false);
	$widthB = get_input('widthB', 50);

	if ($widthB < 10) $widthB = 10;
	if ($widthB > 90) $widthB = 90;

	$widthA = 100 - $widthB;

	echo elgg_view('page/elements/head', $vars);

	// cursor to resize iframes
	echo '<div id="cursor-containment-wrapper"><div id="cursor-iframes" class="tooltip n" title="' . elgg_echo('split-your-elgg:cursor:helper') . '" style="left:' . $widthA . '%;"><div id="cursor-line" class="hidden"></div></div></div>';
	echo '<div id="cursor-mask" class="hidden"></div>';

	if (!$A || !filter_var(iconv('UTF-8', 'ASCII//IGNORE',$A), FILTER_VALIDATE_URL)) elgg_get_site_url();
	echo '<iframe id="splited-frame-a" src="' . $A . '" frameborder="0" width="' . $widthA . '%" height="100%"></iframe>';

	if (!$B || !filter_var(iconv('UTF-8', 'ASCII//IGNORE',$B), FILTER_VALIDATE_URL)) {
		echo elgg_view_form('split-your-elgg/split', array('id' => 'splited-frame-b'));
	} else {
		echo '<iframe id="splited-frame-b" src="' . $B . '" frameborder="0" width="' . $widthB . '%" height="100%"></iframe>';
	}

	echo elgg_view('page/elements/foot');

	return true;
}