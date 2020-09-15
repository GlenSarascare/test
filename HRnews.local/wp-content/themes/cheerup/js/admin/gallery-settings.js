/**
 * Custom Gallery Settings
 */
(function($) {
	//"use strict";
	 
	var media = wp.media,
		parent = media.view.Settings.Gallery;

	// Add custom control to media popup for gallery type
	media.view.Settings.Gallery = media.view.Settings.Gallery.extend({
		
		render: function() {

			// call parent in the prototypical chain - play nice with plugins
			// @todo notify Jetpack to do the same
			parent.prototype.render.apply(this, arguments);
			var el = this.$el;
			
			el.append(media.template('cheerup-gallery-settings'));
			media.gallery.defaults.special_type = 0; // let media know there's a type attribute.
			this.update.apply(this, ['special_type']);

			// Change thumbnail size to recommend
			el.find('select[name=special_type]').on('change', function() {

				var columns = el.find('select[name=columns]').closest('label.setting');
				
				if ($(this).val() != 0) {
					var size = el.find('select[name=size]');
					
					if (size.val() == 'thumbnail') {
						size.val('large');
					}
					
					columns.hide(300);
				}
				else {
					columns.show(300);
				}
				
			}).change();
			
			return this;
		}
	});
})(jQuery);
