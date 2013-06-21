
/**
 *	Split-your-elgg plugin
 *	@package split-your-elgg
 *	@author Emmanuel Salomon @ManUtopiK
 *	@license GNU Affero General Public License, version 3 or late
 *	@link https://github.com/ManUtopiK/split-your-elgg
 *
 *	Split-your-elgg js
 *
 */

/**
 * Split-your-elgg initialization
 *
 * @return void
 */
elgg.provide('elgg.split_your_elgg');

elgg.split_your_elgg.init = function() {
	// resize frame
	$( "#cursor-iframes" ).draggable({
		axis: "x",
		containment: "#cursor-containment-wrapper",
		drag: function() {
			$('#cursor-mask, #cursor-line').show();
			$('input[name="widthB"]').val( Math.round(100 - (100 * parseInt($(this).css('left')) / $(document).width())) );
		},
		stop: function() {
			var l = parseInt($(this).css('left'));

			$('#splited-frame-a').width(l);
			$('#splited-frame-b').width($(document).width()-l);
			$('#cursor-mask, #cursor-line').hide();
		}
	});
}
elgg.register_hook_handler('init', 'system', elgg.split_your_elgg.init);


// End of js for elgg-split_your_elgg plugin
