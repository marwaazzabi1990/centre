!function(a){var n=a(document);window.postboxes={handle_click:function(){var e,o=a(this),s=o.parent(".postbox"),t=s.attr("id");"dashboard_browser_nag"!==t&&(s.toggleClass("closed"),e=!s.hasClass("closed"),o.hasClass("handlediv")?o.attr("aria-expanded",e):o.closest(".postbox").find("button.handlediv").attr("aria-expanded",e),"press-this"!==postboxes.page&&postboxes.save_state(postboxes.page),t&&(!s.hasClass("closed")&&a.isFunction(postboxes.pbshow)?postboxes.pbshow(t):s.hasClass("closed")&&a.isFunction(postboxes.pbhide)&&postboxes.pbhide(t)),n.trigger("postbox-toggled",s))},add_postbox_toggles:function(t,e){var o=a(".postbox .hndle, .postbox .handlediv");this.page=t,this.init(t,e),o.on("click.postboxes",this.handle_click),a(".postbox .hndle a").click(function(e){e.stopPropagation()}),a(".postbox a.dismiss").on("click.postboxes",function(e){var o=a(this).parents(".postbox").attr("id")+"-hide";e.preventDefault(),a("#"+o).prop("checked",!1).triggerHandler("click")}),a(".hide-postbox-tog").bind("click.postboxes",function(){var e=a(this),o=e.val(),s=a("#"+o);e.prop("checked")?(s.show(),a.isFunction(postboxes.pbshow)&&postboxes.pbshow(o)):(s.hide(),a.isFunction(postboxes.pbhide)&&postboxes.pbhide(o)),postboxes.save_state(t),postboxes._mark_area(),n.trigger("postbox-toggled",s)}),a('.columns-prefs input[type="radio"]').bind("click.postboxes",function(){var e=parseInt(a(this).val(),10);e&&(postboxes._pb_edit(e),postboxes.save_order(t))})},init:function(o,e){var s=a(document.body).hasClass("mobile"),t=a(".postbox .handlediv");a.extend(this,e||{}),a("#wpbody-content").css("overflow","hidden"),a(".meta-box-sortables").sortable({placeholder:"sortable-placeholder",connectWith:".meta-box-sortables",items:".postbox",handle:".hndle",cursor:"move",delay:s?200:0,distance:2,tolerance:"pointer",forcePlaceholderSize:!0,helper:function(e,o){return o.clone().find(":input").attr("name",function(e,o){return"sort_"+parseInt(1e5*Math.random(),10).toString()+"_"+o}).end()},opacity:.65,stop:function(){var e=a(this);e.find("#dashboard_browser_nag").is(":visible")&&"dashboard_browser_nag"!=this.firstChild.id?e.sortable("cancel"):postboxes.save_order(o)},receive:function(e,o){"dashboard_browser_nag"==o.item[0].id&&a(o.sender).sortable("cancel"),postboxes._mark_area(),n.trigger("postbox-moved",o.item)}}),s&&(a(document.body).bind("orientationchange.postboxes",function(){postboxes._pb_change()}),this._pb_change()),this._mark_area(),t.each(function(){var e=a(this);e.attr("aria-expanded",!e.parent(".postbox").hasClass("closed"))})},save_state:function(e){var o,s;"nav-menus"!==e&&(o=a(".postbox").filter(".closed").map(function(){return this.id}).get().join(","),s=a(".postbox").filter(":hidden").map(function(){return this.id}).get().join(","),a.post(ajaxurl,{action:"closed-postboxes",closed:o,hidden:s,closedpostboxesnonce:jQuery("#closedpostboxesnonce").val(),page:e}))},save_order:function(e){var o,s=a(".columns-prefs input:checked").val()||0;o={action:"meta-box-order",_ajax_nonce:a("#meta-box-order-nonce").val(),page_columns:s,page:e},a(".meta-box-sortables").each(function(){o["order["+this.id.split("-")[0]+"]"]=a(this).sortable("toArray").join(",")}),a.post(ajaxurl,o)},_mark_area:function(){var o=a("div.postbox:visible").length,e=a("#post-body #side-sortables");a("#dashboard-widgets .meta-box-sortables:visible").each(function(){var e=a(this);1==o||e.children(".postbox:visible").length?e.removeClass("empty-container"):(e.addClass("empty-container"),e.attr("data-emptyString",postBoxL10n.postBoxEmptyString))}),e.length&&(e.children(".postbox:visible").length?e.removeClass("empty-container"):"280px"==a("#postbox-container-1").css("width")&&e.addClass("empty-container"))},_pb_edit:function(e){var o=a(".metabox-holder").get(0);o&&(o.className=o.className.replace(/columns-\d+/,"columns-"+e)),a(document).trigger("postboxes-columnchange")},_pb_change:function(){var e=a('label.columns-prefs-1 input[type="radio"]');switch(window.orientation){case 90:case-90:e.length&&e.is(":checked")||this._pb_edit(2);break;case 0:case 180:a("#poststuff").length?this._pb_edit(1):e.length&&e.is(":checked")||this._pb_edit(2)}},pbshow:!1,pbhide:!1}}(jQuery);