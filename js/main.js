// My animelist js
jQuery("#smoke-myanimelist-api-generate")
    .on("click", function () {
        if (jQuery("#smoke-myanimelist-api").val().length > 0) {
            jQuery
                .getJSON("/wp-content/themes/animesubs/api.php", {
                    url: jQuery("#smoke-myanimelist-api").val()
                }, function (data) {
                    jQuery("#tw_thumbnail").val(data.image);
                    jQuery("#new-tag-genre").val(data.genres);
                    jQuery("#new-tag-season").val(data.premiered);
                    jQuery("#new-tag-producer").val(data.producers);
                    jQuery("#smoke_snopsis").val(data.synopsis);
                    jQuery("input[name=\"post_title\"]#title").val(data.title);
                    jQuery.each(data, function (key, value) {
                        if (jQuery("#smoke-" + key).length > 0) {
                            jQuery("#smoke-" + key).val(value);
                        } else if (jQuery("#new-tag-" + key).length > 0) {
                            jQuery("#new-tag-" + key).val(value);
                        }
                    });
                });
        }
    });
// Gogoanime js
jQuery("#smoke-gogoanime-api-generate").on("click", function () {
    if (jQuery("#smoke-gogoanime-api").val().length > 0) {
        jQuery
            .getJSON("/wp-content/themes/animesubs/gogoanime.php", {
                urll: jQuery("#smoke-gogoanime-api").val()
            }, function (data) {
                jQuery
                    .each(data, function (key, value) {
                        if (jQuery("#smoke_" + key).length > 0) {
                            jQuery("#smoke_" + key).val(value);
                        } else if (jQuery("#new-tag-" + key).length > 0) {
                            jQuery("#new-tag-" + key).val(value);
                        }
                    });
            });
    }
});
// Showmore js
$(function () {
    var showTotalChar = 200,
        showChar = "Show More (+)",
        hideChar = "Show Less (-)";
    $('.show').each(function () {
        var content = $(this).text();
        if (content.length > showTotalChar) {
            var con = content.substr(0, showTotalChar);
            var hcon = content.substr(showTotalChar, content.length - showTotalChar);
            var txt = con + '<span class="dots">...</span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<div class="showmoretxt"><a href="">' + showChar + '</a></div></span>';
            $(this).html(txt);
        }
    });
    $(".showmoretxt").click(function () {
        if ($(this).hasClass("sample")) {
            $(this).removeClass("sample");
            $(this).text(showChar);
        } else {
            $(this).addClass("sample");
            $(this).text(hideChar);
        }
        $(this)
            .parent()
            .prev()
            .toggle();
        $(this)
            .prev()
            .toggle();
        return false;
    });
});
// Smoth js


// Toggle Anime Info js
$('.minjs').click(function () {
    $("#alt-title").toggle("slow");
    $(this)
        .find('i')
        .toggleClass('fa fa-caret-left fa fa-caret-down');
    return false;

});
   // Search box js
   $(document).ready(function(){
    var submitIcon = $('.searchbox-icon');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;
    submitIcon.click(function(){
        if(isOpen == false){
            searchBox.addClass('searchbox-open');
            inputBox.focus();
            isOpen = true;
        } else {
            searchBox.removeClass('searchbox-open');
            inputBox.focusout();
            isOpen = false;
        }
    });  
     submitIcon.mouseup(function(){
            return false;
        });
    searchBox.mouseup(function(){
            return false;
        });
    $(document).mouseup(function(){
            if(isOpen == true){
                $('.searchbox-icon').css('display','block');
                submitIcon.click();
            }
        });
});
    function buttonUp(){
        var inputVal = $('.searchbox-input').val();
        inputVal = $.trim(inputVal).length;
        if( inputVal !== 0){
            $('.searchbox-icon').css('display','none');
        } else {
            $('.searchbox-input').val('');
            $('.searchbox-icon').css('display','block');
        }
    }	
// Dropdown js
var $ = jQuery.noConflict();
				$(function() {
					$('#activator').click(function(){
						$('#box').animate({'right':'0px'},500);
					});
					$('#boxclose').click(function(){
					$('#box').animate({'right':'-700px'},500);
					});
				});
				$(document).ready(function(){
				//Hide (Collapse) the toggle containers on load
				$(".toggle_container").hide(); 
				//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
				$(".trigger").click(function(){
					$(this).toggleClass("active").next().slideToggle("slow");
						return false; //Prevent the browser jump to the link anchor
				});
									
			});