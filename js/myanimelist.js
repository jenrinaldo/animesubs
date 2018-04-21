jQuery("#smoke-myanimelist-api-generate").on("click", function(){
	if(jQuery("#smoke-myanimelist-api").val().length > 0){
		jQuery.getJSON("/wp-content/themes/animesubs/api.php", {
			url: jQuery("#smoke-myanimelist-api").val()
		}, function(data){
			jQuery("#tw_thumbnail").val(data["image"]);
			jQuery("#new-tag-genre").val(data["genres"]);
			jQuery("#new-tag-season").val(data["premiered"]);
			jQuery("#new-tag-producer").val(data["producers"]);
			jQuery("#new-tag-types").val(data["tipe"]);
			jQuery("#content.wp-editor-area").val(data["synopsis"]);
			jQuery("input[name=\"post_title\"]#title").val(data["title"]);
			jQuery.each(data, function(key, value){
				if(jQuery("#smoke-" + key).length > 0){
					jQuery("#smoke-" + key).val(value);
				}else if(jQuery("#new-tag-" + key).length > 0){
					jQuery("#new-tag-" + key).val(value);
				}
			});
		});
	}
});
