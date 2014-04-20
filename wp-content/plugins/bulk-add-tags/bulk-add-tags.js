jQuery(document).ready(function($){

	var iframe_url		= wpr_bat_vars.plugin_url+"bulk-add-tags-iframe.php?keepThis=true&TB_iframe=true&height=180&width=420";
	var iframe_txt		= "Bulk Add Tags";
	var iframe_title	= "Add multiple tags in one go";
  $('#col-left .form-wrap h3').append(' or <a href="'+iframe_url+'" title="'+iframe_title+'" class="thickbox">'+iframe_txt+'</a>');
});