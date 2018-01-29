jQuery("#smoke-gogoanime-api-generate").on("click", function(){
	if(jQuery("#smoke-gogoanime-api").val().length > 0){
		jQuery.getJSON("/wp-content/themes/c-fanshare/gogoanime.php", {
			urll: jQuery("#smoke-gogoanime-api").val()
		}, function(data){
			jQuery.each(data, function(key, value){
				if(jQuery("#smoke_" + key).length > 0){
					jQuery("#smoke_" + key).val(value);
				}else if(jQuery("#new-tag-" + key).length > 0){
					jQuery("#new-tag-" + key).val(value);
				}
			});
		});
	}
});
