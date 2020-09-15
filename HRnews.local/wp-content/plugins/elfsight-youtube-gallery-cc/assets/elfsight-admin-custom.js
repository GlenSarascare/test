/*
    Youtube Gallery
    Version: 3.4.0
    Release date: Tue Dec 10 2019

    https://elfsight.com

    Copyright (c) 2019 Elfsight, LLC. ALL RIGHTS RESERVED
*/

!function(e,a,t){"use strict";a.add("api-key",e.noop),e(function(){const a="elfsight-admin-page-api-key-form",n=e(".elfsight-admin"),s=e("."+a),i=s.find("."+a+"-input"),o=s.find("."+a+"-button-connect"),d=t=>{e("."+a).removeClass([a+"-connect",a+"-success"].join(" ")).addClass(a+"-"+t),n.toggleClass("elfsight-admin-api-key-invalid","success"!==t),r=t,"success"===t?(i.attr("readonly",!0),o.text("Clear API key").addClass("elfsight-admin-button-gray").removeClass("elfsight-admin-button-green")):(i.attr("readonly",!1),o.text("Save API key").addClass("elfsight-admin-button-green").removeClass("elfsight-admin-button-gray"))},l=a=>e.ajax({type:"POST",url:pluginParams.restApiUrl+"update-preferences",data:{option:{name:"api_key",value:a}},dataType:"json",beforeSend:function(e){e.setRequestHeader("X-WP-Nonce",wpApiSettings.nonce)}});let c,r;t.addEventListener("message",e=>{if(!e.data)return;const a=e.data;a.action&&~a.action.search("EappsPreview.appPreferences.updated")&&(c=a.data).apiKey&&(u=c.apiKey)!==i.val()&&(i.val(u).attr("readonly",!0),o.text("Clear API key").addClass("elfsight-admin-button-gray").removeClass("elfsight-admin-button-green"),d("success"),l(u).then(function(){document.location.reload()}))});let u=i.val();(e=>!!e)(u)?d("success"):d("connect"),o.click(()=>{"success"===r&&i.val(""),u===i.val()&&""!==i.val()||(u=i.val(),d(""===u?"connect":"success"),s.addClass(a+"-reload-active"),l(u).then(function(){document.location.reload()}))})})}(window.jQuery,window.elfsightAdminPagesController||{},window);