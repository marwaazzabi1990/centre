!function(i){var n="undefined"!=typeof current_site_id?"&site_id="+current_site_id:"";i(document).ready(function(){var a={offset:"0, -1"};"undefined"!=typeof isRtl&&isRtl&&(a.my="right top",a.at="right bottom"),i(".wp-suggest-user").each(function(){var e=i(this),t=void 0!==e.data("autocompleteType")?e.data("autocompleteType"):"add",o=void 0!==e.data("autocompleteField")?e.data("autocompleteField"):"user_login";e.autocomplete({source:ajaxurl+"?action=autocomplete-user&autocomplete_type="+t+"&autocomplete_field="+o+n,delay:500,minLength:2,position:a,open:function(){i(this).addClass("open")},close:function(){i(this).removeClass("open")}})})})}(jQuery);