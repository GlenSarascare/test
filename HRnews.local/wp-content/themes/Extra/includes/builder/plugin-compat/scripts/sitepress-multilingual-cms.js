(function($) {
  $(document).ready(function($) {
    $('body').on('click', '.js-wpml-translate-link', function() {
      var $this  = $(this);
      var url    = $this.attr('href');

      if (!url) {
        return;
      }

      // Bail early if current layout has translation.
      if (!url.startsWith('post-new')) {
        return;
      }

      // Find translation language ID and trid.
      var langIds = url.match(/lang\=(\w+)&/);
      var langId  = langIds && 'undefined' !== typeof langIds[1] ? langIds[1] : '';
      var trids   = url.match(/trid\=(\w+)&/);
      var trid    = trids && 'undefined' !== typeof trids[1] ? trids[1] : '';

      if (!langId || !trid) {
        return false;
      }

      var thisElement = $this.html();

      $this.html('<span class="spinner et-builder-wpml-compat-spinner" style="visibility: visible; margin: 0;"></span>');

      $.ajax({
        type: 'POST',
        url: et_builder_wpml_compat_options.ajaxurl,
        dataType: 'json',
        data: {
          action: 'et_builder_wpml_translate_layout',
          nonce: et_builder_wpml_compat_options.nonces.et_builder_wpml_translate_layout,
          translation_trid: trid,
          translation_lang_id: langId,
        }
      })
      .done(function(result) {
        if ('undefined' !== typeof result) {
          if (result.success && 'undefined' !== typeof result.data) {
            window.location.href = _.unescape( result.data.edit_layout_link );
          }
        }

        $this.html(thisElement);
      })
      .fail(function(data) {
        console.log(data.responseText);
        $this.html(thisElement);
      });

      return false;
    });
  });
})(jQuery);