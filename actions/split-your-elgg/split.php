<?php
/**
 * Split elgg
 *
 * @package Split-your-elgg
 */

$widthB = (int)get_input('widthB');
$url = (string)get_input('url');

if (!$widthB) {
	$widthB = '';
} else {
	$widthB = "widthB=$widthB&";
}

if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
	forward(REFERER);
} else {
	forward(elgg_get_site_url() . "split?{$widthB}b={$url}");
}
