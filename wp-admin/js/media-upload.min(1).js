window.send_to_editor=function(t){var e,i="undefined"!=typeof tinymce,n="undefined"!=typeof QTags;if(wpActiveEditor)i&&(e=tinymce.get(wpActiveEditor));else if(i&&tinymce.activeEditor)e=tinymce.activeEditor,window.wpActiveEditor=e.id;else if(!n)return!1;if(e&&!e.isHidden()?e.execCommand("mceInsertContent",!1,t):n?QTags.insertContent(t):document.getElementById(wpActiveEditor).value+=t,window.tb_remove)try{window.tb_remove()}catch(t){}},function(d){window.tb_position=function(){var t=d("#TB_window"),e=d(window).width(),i=d(window).height(),n=833<e?833:e,o=0;return d("#wpadminbar").length&&(o=parseInt(d("#wpadminbar").css("height"),10)),t.length&&(t.width(n-50).height(i-45-o),d("#TB_iframeContent").width(n-50).height(i-75-o),t.css({"margin-left":"-"+parseInt((n-50)/2,10)+"px"}),void 0!==document.body.style.maxWidth&&t.css({top:20+o+"px","margin-top":"0"})),d("a.thickbox").each(function(){var t=d(this).attr("href");t&&(t=(t=t.replace(/&width=[0-9]+/g,"")).replace(/&height=[0-9]+/g,""),d(this).attr("href",t+"&width="+(n-80)+"&height="+(i-85-o)))})},d(window).resize(function(){tb_position()})}(jQuery);