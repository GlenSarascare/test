!function(e){"use strict";var n=window.jnews;function t(n,t){var i=!1;return e.each(t,(function(e,t){n.indexOf(t)>-1&&(i=!0)})),i}"undefined"!=typeof wp&&wp.customize&&wp.customize.selectiveRefresh&&wp.customize.widgetsPreview&&wp.customize.widgetsPreview.WidgetPartial&&(wp.customize.selectiveRefresh.bind("partial-content-moved",(function(n){var t=e(n.container).parents(".jeg_sticky_sidebar");t&&(""===e(t).find(".theiaStickySidebar").html()&&(e(t).find(".theiaStickySidebar").remove(),e(t).css("style","").theiaStickySidebar({additionalMarginTop:20})))})),wp.customize.selectiveRefresh.bind("partial-content-rendered",(function(i){var _=i.partial.id;if(e(i.container).hasClass("jeg_menu")&&n.menu.init(e(i.container).parent()),t(_,["jnews_header_menu_animation"])&&n.menu.init(e(i.container)),t(_,["jnews_single_following_video","jnews_single_following_video_position"])&&(e.do_media_render(e(i.container)),window.jnews.floating_video.unbind(),window.jnews.floating_video.init(e(i.container))),e(i.container).hasClass("jeg_mobile_menu")&&e(i.container).superfish(),"widget"==_.substring(0,6)){var o=e(i.container).parent();if(e(o).hasClass("jeg_sticky_sidebar")){var s=e(o).find(".theiaStickySidebar");e(i.container).appendTo(s)}}if(e(i.container).hasClass("widget")){var a=e(i.container);e(a).find(".jeg_tabpost_widget").jtabs(),e(a).find(".jeg_module_hook").jmodule(),n.hero.init(a),e(a).find(".jeg_news_ticker").jnewsticker(),e(a).jnews_carousel(),e(a).find(".jeg_blocklink .jeg_videobg").jvideo_background(),e(a).jnews_slider(),e(a).find(".jeg_video_playlist").addClass("jeg_col_4").jvidplaylist(),e.facebook_page_widget(),e.twitter_widget(),e.google_plus_widget(),e.pinterest_widget()}(function(e){return n="jnews_hb",e.substr(0,n.length)==n;var n})(_)&&(n.menu.init(i.container),n.cart.init(i.container),n.mobile.init(),void 0!==n.weather&&n.weather.init(),n.first_load.init()),function(e){return e.indexOf("jnews_mobile_menu_follow")>-1}(_)&&n.mobile.init(),function(e){return e.indexOf("jnews_category_hero")>-1||e.indexOf("jnews_author_hero")>-1}(_)&&n.hero.dispatch(),(function(e){return e.indexOf("jnews_category_content")>-1}(_)||function(e){return t(e,["jnews_single_show_post_related","jnews_single_post_related_match","jnews_single_post_pagination_related","jnews_single_number_post_related","jnews_single_post_auto_load_related","jnews_single_post_related_template","jnews_single_post_related_excerpt","jnews_single_post_related_date","jnews_single_post_related_date_custom","jnews_single_post_show_inline_related","jnews_single_post_inline_related_match","jnews_single_post_inline_related_header","jnews_single_post_inline_related_pagination","jnews_single_post_inline_related_number","jnews_single_post_inline_related_template","jnews_single_post_inline_related_date","jnews_single_post_inline_related_date_custom","jnews_single_post_inline_related_ftitle","jnews_single_post_inline_related_stitle","jnews_single_post_inline_related_fullwidth","jnews_single_post_inline_related_paragraph","jnews_single_post_inline_related_random","jnews_single_post_inline_related_float"])}(_))&&e(i.container).find(".jeg_module_hook").jmodule(),function(e){return t(e,["jnews_comment_type","jnews_comment_disqus_shortname","jnews_comment_facebook_appid"])}(_)&&n.comment.init(),function(e){return t(e,["jnews_option[top_bar_weather_location]","jnews_option[top_bar_weather_item]","jnews_option[top_bar_weather_item_count]","jnews_option[top_bar_weather_item_content]","jnews_option[top_bar_weather_item_autoplay]","jnews_option[top_bar_weather_item_autodelay]","jnews_option[top_bar_weather_item_autohover]","jnews_option[top_bar_weather_location_auto]","jnews_option[weather_default_temperature]"])}(_)&&void 0!==n.weather&&n.weather.init(),function(e){return t(e,["jnews_single_show_popup_post","jnews_single_number_popup_post"])}(_)&&n.popuppost.init(),function(e){return t(e,["jnews_option[push_notification_post_enable]","jnews_option[push_notification_post_description]","jnews_option[push_notification_post_btn_subscribe]","jnews_option[push_notification_post_btn_unsubscribe]","jnews_option[push_notification_post_btn_processing]","jnews_option[push_notification_category_enable]","jnews_option[push_notification_category_description]","jnews_option[push_notification_category_btn_subscribe]","jnews_option[push_notification_category_btn_unsubscribe],","jnews_option[push_notification_category_btn_processing]"])}(_)&&n.push_notification.init()})))}(jQuery);