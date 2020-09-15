jQuery(document).ready(function($){
	$('body').on('click', '.rwf-required strong, .rwf-optional strong, .rwf-layout strong, .rwf-settings strong, .rwf-advance strong, .rwf-styling strong', function(){
		$(this).parent().toggleClass('rwf-collapsed');
		//$(this).parent().find('p').toggle();
	});
	$('.wp-list-table.styles ul li').on('click', function(){
		$(this).siblings().removeClass('selected');
		$(this).addClass('selected');
		$('input[name="rfw_style"]').val($(this).data('id'));
	});
	
	
	function parse_query_string(query) {
	  var vars = query.split("&");
	  var query_string = {};
	  for (var i = 0; i < vars.length; i++) {
		var pair = vars[i].split("=");
		// If first entry with this name
		if (typeof query_string[pair[0]] === "undefined") {
		  query_string[pair[0]] = decodeURIComponent(pair[1]);
		  // If second entry with this name
		} else if (typeof query_string[pair[0]] === "string") {
		  var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
		  query_string[pair[0]] = arr;
		  // If third or later entry with this name
		} else {
		  query_string[pair[0]].push(decodeURIComponent(pair[1]));
		}
	  }
	  return query_string;
	}		
	
	$('.rfw-esettings a.nav-tab').click(function(){
		$(this).siblings().removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active');
		$('.nav-tab-content, form:not(.wrap.rfw-esettings .nav-tab-content)').hide();
		$('.nav-tab-content').eq($(this).index()).show();
		window.history.replaceState('', '', rfw_obj.this_url+'&t='+$(this).index());	
		$('form input[name="rfw_tn"]').val($(this).index());
		rfw_obj.rfw_tab = $(this).index();
		
	});		
	
	var query = window.location.search.substring(1);
	var qs = parse_query_string(query);	
	if(typeof(qs.t)!='undefined'){
		$('.rfw-esettings a.nav-tab').eq(qs.t).click();
		
	}
});