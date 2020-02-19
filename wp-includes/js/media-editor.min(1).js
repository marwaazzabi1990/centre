!function(a,l){var i={};wp.media.coerce=function(e,t){return l.isUndefined(e[t])&&!l.isUndefined(this.defaults[t])?e[t]=this.defaults[t]:"true"===e[t]?e[t]=!0:"false"===e[t]&&(e[t]=!1),e[t]},wp.media.string={props:function(e,t){var i,n,a,d,r=wp.media.view.settings.defaultProps;return e=e?l.clone(e):{},t&&t.type&&(e.type=t.type),"image"===e.type&&(e=l.defaults(e||{},{align:r.align||getUserSetting("align","none"),size:r.size||getUserSetting("imgsize","medium"),url:"",classes:[]})),t&&(e.title=e.title||t.title,"file"===(i=e.link||r.link||getUserSetting("urlbutton","file"))||"embed"===i?n=t.url:"post"===i?n=t.link:"custom"===i&&(n=e.linkUrl),e.linkUrl=n||"","image"===t.type?(e.classes.push("wp-image-"+t.id),a=(d=t.sizes)&&d[e.size]?d[e.size]:t,l.extend(e,l.pick(t,"align","caption","alt"),{width:a.width,height:a.height,src:a.url,captionId:"attachment_"+t.id})):"video"===t.type||"audio"===t.type?l.extend(e,l.pick(t,"title","type","icon","mime")):(e.title=e.title||t.filename,e.rel=e.rel||"attachment wp-att-"+t.id)),e},link:function(e,t){var i;return i={tag:"a",content:(e=wp.media.string.props(e,t)).title,attrs:{href:e.linkUrl}},e.rel&&(i.attrs.rel=e.rel),wp.html.string(i)},audio:function(e,t){return wp.media.string._audioVideo("audio",e,t)},video:function(e,t){return wp.media.string._audioVideo("video",e,t)},_audioVideo:function(e,t,i){var n,a;return"embed"!==(t=wp.media.string.props(t,i)).link?wp.media.string.link(t):(n={},"video"===e&&(i.image&&-1===i.image.src.indexOf(i.icon)&&(n.poster=i.image.src),i.width&&(n.width=i.width),i.height&&(n.height=i.height)),a=i.filename.split(".").pop(),l.contains(wp.media.view.settings.embedExts,a)?(n[a]=i.url,wp.shortcode.string({tag:e,attrs:n})):wp.media.string.link(t))},image:function(e,t){var i,n,a,d,r={};return e.type="image",n=(e=wp.media.string.props(e,t)).classes||[],r.src=l.isUndefined(t)?e.url:t.url,l.extend(r,l.pick(e,"width","height","alt")),e.align&&!e.caption&&n.push("align"+e.align),e.size&&n.push("size-"+e.size),r.class=l.compact(n).join(" "),i={tag:"img",attrs:r,single:!0},e.linkUrl&&(i={tag:"a",attrs:{href:e.linkUrl},content:i}),d=wp.html.string(i),e.caption&&(a={},r.width&&(a.width=r.width),e.captionId&&(a.id=e.captionId),e.align&&(a.align="align"+e.align),d=wp.shortcode.string({tag:"caption",attrs:a,content:d+" "+e.caption})),d}},wp.media.embed={coerce:wp.media.coerce,defaults:{url:"",width:"",height:""},edit:function(e,t){var i,n={};return t?n.url=e.replace(/<[^>]+>/g,""):(i=wp.shortcode.next("embed",e).shortcode,n=l.defaults(i.attrs.named,this.defaults),i.content&&(n.url=i.content)),wp.media({frame:"post",state:"embed",metadata:n})},shortcode:function(i){var e,n=this;return l.each(this.defaults,function(e,t){i[t]=n.coerce(i,t),e===i[t]&&delete i[t]}),e=i.url,delete i.url,new wp.shortcode({tag:"embed",attrs:i,content:e})}},wp.media.collection=function(e){var o={};return l.extend({coerce:wp.media.coerce,attachments:function(e){var t,i,n,a,d=e.string(),r=o[d],s=this;return delete o[d],r||(t=l.defaults(e.attrs.named,this.defaults),(i=l.pick(t,"orderby","order")).type=this.type,i.perPage=-1,void 0!==t.orderby&&(t._orderByField=t.orderby),"rand"===t.orderby&&(t._orderbyRandom=!0),t.orderby&&!/^menu_order(?: ID)?$/i.test(t.orderby)||(i.orderby="menuOrder"),t.ids?(i.post__in=t.ids.split(","),i.orderby="post__in"):t.include&&(i.post__in=t.include.split(",")),t.exclude&&(i.post__not_in=t.exclude.split(",")),i.post__in||(i.uploadedTo=t.id),a=l.omit(t,"id","ids","include","exclude","orderby","order"),l.each(this.defaults,function(e,t){a[t]=s.coerce(a,t)}),(n=wp.media.query(i))[this.tag]=new Backbone.Model(a),n)},shortcode:function(e){var t,i,n=e.props.toJSON(),a=l.pick(n,"orderby","order");return e.type&&(a.type=e.type,delete e.type),e[this.tag]&&l.extend(a,e[this.tag].toJSON()),a.ids=e.pluck("id"),n.uploadedTo&&(a.id=n.uploadedTo),delete a.orderby,a._orderbyRandom?a.orderby="rand":a._orderByField&&"rand"!=a._orderByField&&(a.orderby=a._orderByField),delete a._orderbyRandom,delete a._orderByField,a.ids&&"post__in"===a.orderby&&delete a.orderby,a=this.setDefaults(a),t=new wp.shortcode({tag:this.tag,attrs:a,type:"single"}),(i=new wp.media.model.Attachments(e.models,{props:n}))[this.tag]=e[this.tag],o[t.string()]=i,t},edit:function(e){var t,i,n,a=wp.shortcode.next(this.tag,e),d=this.defaults.id;if(a&&a.content===e)return a=a.shortcode,l.isUndefined(a.get("id"))&&!l.isUndefined(d)&&a.set("id",d),t=this.attachments(a),(i=new wp.media.model.Selection(t.models,{props:t.props.toJSON(),multiple:!0}))[this.tag]=t[this.tag],i.more().done(function(){i.props.set({query:!1}),i.unmirror(),i.props.unset("orderby")}),this.frame&&this.frame.dispose(),n=a.attrs.named.type&&"video"===a.attrs.named.type?"video-"+this.tag+"-edit":this.tag+"-edit",this.frame=wp.media({frame:"post",state:n,title:this.editTitle,editing:!0,multiple:!0,selection:i}).open(),this.frame},setDefaults:function(i){var n=this;return l.each(this.defaults,function(e,t){i[t]=n.coerce(i,t),e===i[t]&&delete i[t]}),i}},e)},wp.media._galleryDefaults={itemtag:"dl",icontag:"dt",captiontag:"dd",columns:"3",link:"post",size:"thumbnail",order:"ASC",id:wp.media.view.settings.post&&wp.media.view.settings.post.id,orderby:"menu_order ID"},wp.media.view.settings.galleryDefaults?wp.media.galleryDefaults=l.extend({},wp.media._galleryDefaults,wp.media.view.settings.galleryDefaults):wp.media.galleryDefaults=wp.media._galleryDefaults,wp.media.gallery=new wp.media.collection({tag:"gallery",type:"image",editTitle:wp.media.view.l10n.editGalleryTitle,defaults:wp.media.galleryDefaults,setDefaults:function(i){var n=this,a=!l.isEqual(wp.media.galleryDefaults,wp.media._galleryDefaults);return l.each(this.defaults,function(e,t){i[t]=n.coerce(i,t),e!==i[t]||a&&e!==wp.media._galleryDefaults[t]||delete i[t]}),i}}),wp.media.featuredImage={get:function(){return wp.media.view.settings.post.featuredImageId},set:function(e){var t=wp.media.view.settings;t.post.featuredImageId=e,wp.media.post("get-post-thumbnail-html",{post_id:t.post.id,thumbnail_id:t.post.featuredImageId,_wpnonce:t.post.nonce}).done(function(e){"0"!=e?a(".inside","#postimagediv").html(e):window.alert(window.setPostThumbnailL10n.error)})},remove:function(){wp.media.featuredImage.set(-1)},frame:function(){return this._frame?wp.media.frame=this._frame:(this._frame=wp.media({state:"featured-image",states:[new wp.media.controller.FeaturedImage,new wp.media.controller.EditImage]}),this._frame.on("toolbar:create:featured-image",function(e){this.createSelectToolbar(e,{text:wp.media.view.l10n.setFeaturedImage})},this._frame),this._frame.on("content:render:edit-image",function(){var e=this.state("featured-image").get("selection"),t=new wp.media.view.EditImage({model:e.single(),controller:this}).render();this.content.set(t),t.loadEditor()},this._frame),this._frame.state("featured-image").on("select",this.select)),this._frame},select:function(){var e=this.get("selection").single();wp.media.view.settings.post.featuredImageId&&wp.media.featuredImage.set(e?e.id:-1)},init:function(){a("#postimagediv").on("click","#set-post-thumbnail",function(e){e.preventDefault(),e.stopPropagation(),wp.media.featuredImage.frame().open()}).on("click","#remove-post-thumbnail",function(){return wp.media.featuredImage.remove(),!1})}},a(wp.media.featuredImage.init),wp.media.editor={insert:function(e){var t,i,n=!l.isUndefined(window.tinymce),a=!l.isUndefined(window.QTags);if(i=this.activeEditor?window.wpActiveEditor=this.activeEditor:window.wpActiveEditor,window.send_to_editor)return window.send_to_editor.apply(this,arguments);if(i)n&&(t=tinymce.get(i));else if(n&&tinymce.activeEditor)t=tinymce.activeEditor,i=window.wpActiveEditor=t.id;else if(!a)return!1;if(t&&!t.isHidden()?t.execCommand("mceInsertContent",!1,e):a?QTags.insertContent(e):document.getElementById(i).value+=e,window.tb_remove)try{window.tb_remove()}catch(e){}},add:function(e,t){var n=this.get(e);return n||((n=i[e]=wp.media(l.defaults(t||{},{frame:"post",state:"insert",title:wp.media.view.l10n.addMedia,multiple:!0}))).on("insert",function(e){var i=n.state();(e=e||i.get("selection"))&&a.when.apply(a,e.map(function(e){var t=i.display(e).toJSON();return this.send.attachment(t,e.toJSON())},this)).done(function(){wp.media.editor.insert(l.toArray(arguments).join("\n\n"))})},this),n.state("gallery-edit").on("update",function(e){this.insert(wp.media.gallery.shortcode(e).string())},this),n.state("playlist-edit").on("update",function(e){this.insert(wp.media.playlist.shortcode(e).string())},this),n.state("video-playlist-edit").on("update",function(e){this.insert(wp.media.playlist.shortcode(e).string())},this),n.state("embed").on("select",function(){var e=n.state(),t=e.get("type"),i=e.props.toJSON();i.url=i.url||"","link"===t?(l.defaults(i,{linkText:i.url,linkUrl:i.url}),this.send.link(i).done(function(e){wp.media.editor.insert(e)})):"image"===t&&(l.defaults(i,{title:i.url,linkUrl:"",align:"none",link:"none"}),"none"===i.link?i.linkUrl="":"file"===i.link&&(i.linkUrl=i.url),this.insert(wp.media.string.image(i)))},this),n.state("featured-image").on("select",wp.media.featuredImage.select),n.setState(n.options.state),n)},id:function(e){return e||((e=window.wpActiveEditor)||l.isUndefined(window.tinymce)||!tinymce.activeEditor||(e=tinymce.activeEditor.id),e=e||"")},get:function(e){return e=this.id(e),i[e]},remove:function(e){e=this.id(e),delete i[e]},send:{attachment:function(i,e){var n,t,a=e.caption;return wp.media.view.settings.captions||delete e.caption,i=wp.media.string.props(i,e),n={id:e.id,post_content:e.description,post_excerpt:a},i.linkUrl&&(n.url=i.linkUrl),"image"===e.type?(t=wp.media.string.image(i),l.each({align:"align",size:"image-size",alt:"image_alt"},function(e,t){i[t]&&(n[e]=i[t])})):"video"===e.type?t=wp.media.string.video(i,e):"audio"===e.type?t=wp.media.string.audio(i,e):(t=wp.media.string.link(i),n.post_title=i.title),wp.media.post("send-attachment-to-editor",{nonce:wp.media.view.settings.nonce.sendToEditor,attachment:n,html:t,post_id:wp.media.view.settings.post.id})},link:function(e){return wp.media.post("send-link-to-editor",{nonce:wp.media.view.settings.nonce.sendToEditor,src:e.linkUrl,link_text:e.linkText,html:wp.media.string.link(e),post_id:wp.media.view.settings.post.id})}},open:function(e,t){var i;return t=t||{},e=this.id(e),this.activeEditor=e,(!(i=this.get(e))||i.options&&t.state!==i.options.state)&&(i=this.add(e,t)),(wp.media.frame=i).open()},init:function(){a(document.body).on("click.add-media-button",".insert-media",function(e){var t=a(e.currentTarget),i=t.data("editor"),n={frame:"post",state:"insert",title:wp.media.view.l10n.addMedia,multiple:!0};e.preventDefault(),t.hasClass("gallery")&&(n.state="gallery",n.title=wp.media.view.l10n.createGalleryTitle),wp.media.editor.open(i,n)}),(new wp.media.view.EditorUploader).render()}},l.bindAll(wp.media.editor,"open"),a(wp.media.editor.init)}(jQuery,_);