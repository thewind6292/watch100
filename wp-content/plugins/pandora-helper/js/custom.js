/**
 * @version    1.0
 * @package    Cover
 * @author     Warethemes Team <support@warethemes.com>
 * @copyright  Copyright (C) 2015 Warethemes.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://warethemes.com
 */
 
(function($) {
	"use strict";
	
	jQuery(document).ready(function(){
		/*Countdown*/
		jQuery('.countbox.hastime').each(function(){
			var countTime = jQuery(this).attr('data-time');
			
			jQuery(this).countdown(countTime, function(event) {
				jQuery(this).html(
					'<span class="timebox day"><strong>'+event.strftime('%D')+'</strong>days</span><span class="timebox hour"><strong>'+event.strftime('%H')+'</strong>hrs</span><span class="timebox minute"><strong>'+event.strftime('%M')+'</strong>mins</span><span class="timebox second"><strong>'+event.strftime('%S')+'</strong>secs</span>'
				);
			});
		});
		
		/* Counters
		-------------------------------------------------------*/
		$('.statistic').appear(function() {
			$('.timer').countTo({
				speed: 4000,
				refreshInterval: 60,
				formatter: function (value, options) {
					return value.toFixed(options.decimals);
				}
			});
		});
	});
})(jQuery);