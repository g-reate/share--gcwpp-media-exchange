/**
 * gcme-front.js
 */
jQuery(document).ready(function ($) {

	/**
	 * Slick slider 
	 */
	const $main_visual = $('.main-visual');
	$main_visual.slick({
		autoplay: true,
		autoplaySpeed: 4000,
		speed: 1000,
		arrows: false,
		dots: true,
		fade: false,
		cssEase: 'linear'
	});
});