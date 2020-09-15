/**
 * Dismissable notices
 */
jQuery(function($) {
	'use strict';

	// AJAX request to the URL
	$('.bunyad-admin-notice.is-dismissible').on('click', '.notice-dismiss', function() {

		var parent = $(this).parent('.notice');
		
		$.post(ajaxurl, {
			'action': parent.data('action'),
			'_wpnonce': parent.data('nonce'),
		});
	});
});