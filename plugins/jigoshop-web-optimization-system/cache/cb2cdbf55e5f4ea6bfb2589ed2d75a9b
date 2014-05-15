(function($) {
	// @todo: varmeta is a temporary name.. this should be a global jigoshop var

	$(function() {

		// This is a unique ID for add_variation
		var ID = 0;

		// Unbind the standard postbox click event
		setTimeout(function(){
			$('.jigoshop_variation.postbox h3').unbind('click.postboxes');
		}, 100);

		// Set up the events bound to the root variable product options so events don't bubble to the document
		$('#variable_product_options')
		.on('change', '.product_type', function(e) {

			var $this	= $(this);
		 	      panel	= '.'+$this.val();
		 	      $root	= $this.parent().parent().parent();

			// Hide all the panels first then show the relevant one
			// TODO: can this be improved anyway?
			$root.find('.options').hide();
			$root.find(panel).show();
		})

		.on('click', '.postbox h3', function(e) {

			// the jquery event can still be triggered by other child elements, so we need to be explicit
			if ( e.target.tagName.toLowerCase() != 'h3' && !$(this).hasClass('handlediv'))
				return false;

			$(this).parent().toggleClass('closed');
		})

		// @todo: this should be an ID
		.on('click', '.add_variation', function(e) {

			// Disable default action
			e.preventDefault();

			// Remove the demo if it exists
			$('.demo.variation').remove();

			// Replace the ID with a unique ID
			html = varmeta.actions.create.panel.replace(/__ID__/gi, ID++ +'_new');

			// Append a new variation panel
			$(html).removeClass('closed').hide().prependTo('.jigoshop_variations').slideDown( 150 );
			$(this).trigger('jigoshop_add_variation');
		})

		// @todo: this should be an ID
		.on('click', '.remove_variation', function(e) {

			// Disable default action
			e.preventDefault();

			// Only remove if the user is sure
			if ( ! confirm(varmeta.actions.remove.confirm) )
				return false;

			remove_variation($(this).parent());
		})

		.on('click', '.upload_image_button', function(e) {

			// Disable default action
			e.preventDefault();

			// Set up variables
			var $this		= $(this);
				$img		= $this.find('img');
				$imgID		= $this.find('input');
				$parent		= $this.parent();
				post_id		= $this.attr('rel');
				formfield	= $('.upload_image_id').attr('name');

			// Remove the image
			if ( $this.is('.remove') ) {

				// Set the hidden input value as null
				$imgID.val(null);

				// Replace the image with the placeholder
				$img.attr('src', varmeta.assets_url+'/assets/images/placeholder.png');
				$this.removeClass('remove');
			}
			else {

				window.send_to_editor = function( html ) {

					// Set up variables
					var $img		= $(html).find('img');
						imgsrc		= $img.attr('src');
						imgclass		= $img.attr('class');
						imgid 		= parseInt(imgclass.replace(/\D/g, ''), 10);

					// Set the vhidden input value with the thumb ID
					$imgID.val(imgid);

					// Replace the image with a preview of the image
					$('img', $parent).attr('src', imgsrc);
					$this.addClass('remove');

					// Hide thickbox
					tb_remove();
				};

				// @todo: Why do we need this? -Rob
				// formfield = $('.upload_image_id', $parent).attr('name');

				// Show thickbox
				tb_show('', 'media-upload.php?post_id'+post_id+'&type=image&TB_iframe=true');
			}
		})

		.on('click', '.upload_file_button', function(e) {

			// Disable default action
			e.preventDefault();

			// Set up variables
			var $this   = $(this);
			    $file   = $this.prev();
			    post_id = $this.parents('.jigoshop_variation').attr('rel');

			window.send_to_editor = function(html) {

				// Attach the file URI to the relevant
				$file.val( $(html).attr('href') );

				// Hide thickbox
				tb_remove();
			};

			// @todo: Why do we need this? -Rob
			// formfield = $(parent).attr('name');

			// Show thickbox
			tb_show('', 'media-upload.php?post_id=' + post_id + '&type=downloadable_product&from=jigoshop_variation&TB_iframe=true');
		})

		.on('click', '#do_actions', function(e) {

			// Disable default action
			e.preventDefault();

			if ( ! $('.jigoshop_variation').size() )
				return alert( varmeta.i18n.variations_required );

			// Cache variables
			var $this = $(this);
			$this.trigger( $this.prev().val() );
		})

		.on({
			remove_all: function(e) {
				if( ! confirm( varmeta.i18n.remove_all ) )
					return false;

				$('.jigoshop_variation').each( function() {
					remove_variation( $(this) );
				});
			},
			set_all_regular_prices: function(e) {
				value = prompt( varmeta.i18n.set_regular_price );
				$(' input[name*="regular_price"] ').val( value );
			},
			set_all_sale_prices: function(e) {
				value = prompt( varmeta.i18n.set_sale_price );
				$(' input[name*="sale_price"] ').val( value );
			},
			set_all_stock: function(e) {
				value = prompt( varmeta.i18n.set_stock );
				$(' input[name*="stock"] ').val( value );
			},
			set_all_weight: function(e) {
				value = prompt( varmeta.i18n.set_weight );
				$(' input[name*="weight"] ').val( value );
			},
			set_all_width: function(e) {
				value = prompt( varmeta.i18n.set_width );
				$(' input[name*="width"] ').val( value );
			},
			set_all_length: function(e) {
				value = prompt( varmeta.i18n.set_length );
				$(' input[name*="length"] ').val( value );
			},
			set_all_height: function(e) {
				value = prompt( varmeta.i18n.set_height );
				$(' input[name*="height"] ').val( value );
			}
		});

	});

	function remove_variation( $panel ) {

		// Set up the variables
		var variation	= $panel.attr('rel');
			data 		= {
				action: varmeta.actions.remove.action,
				variation_id: variation,
				security: varmeta.actions.remove.nonce,
			};

		// If the variation already exists
		if ( variation.indexOf('_new') < 0 ) {

			// Start the block to simulate AJAX requests
			$panel.block({ message: null, overlayCSS: { background: '#fff url('+varmeta.assets_url+'/assets/images/ajax-loader.gif) no-repeat center', opacity: 0.6 } });

			// Remove the variation from the posts array
			$.post(varmeta.ajax_url, data, function(response) {
				$panel.fadeOut('slow', function() {
					$panel.remove();
				});
			});

		}
		else {

			// Variation hasn't been saved so just remove the panel
			$panel.fadeOut('slow', function() {
				$panel.remove();
			});
		}
	}

})(window.jQuery);
/*
Copyright 2012 Igor Vaynberg

Version: 3.4.1 Timestamp: Thu Jun 27 18:02:10 PDT 2013

This software is licensed under the Apache License, Version 2.0 (the "Apache License") or the GNU
General Public License version 2 (the "GPL License"). You may choose either license to govern your
use of this software only upon the condition that you accept all of the terms of either the Apache
License or the GPL License.

You may obtain a copy of the Apache License and the GPL License at:

http://www.apache.org/licenses/LICENSE-2.0
http://www.gnu.org/licenses/gpl-2.0.html

Unless required by applicable law or agreed to in writing, software distributed under the Apache License
or the GPL Licesnse is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,
either express or implied. See the Apache License and the GPL License for the specific language governing
permissions and limitations under the Apache License and the GPL License.
*/
(function(a){a.fn.each2===void 0&&a.fn.extend({each2:function(b){for(var c=a([0]),d=-1,e=this.length;e>++d&&(c.context=c[0]=this[d])&&b.call(c[0],d,c)!==!1;);return this}})})(jQuery),function(a,b){"use strict";function m(a,b){for(var c=0,d=b.length;d>c;c+=1)if(o(a,b[c]))return c;return-1}function n(){var b=a(l);b.appendTo("body");var c={width:b.width()-b[0].clientWidth,height:b.height()-b[0].clientHeight};return b.remove(),c}function o(a,c){return a===c?!0:a===b||c===b?!1:null===a||null===c?!1:a.constructor===String?a+""==c+"":c.constructor===String?c+""==a+"":!1}function p(b,c){var d,e,f;if(null===b||1>b.length)return[];for(d=b.split(c),e=0,f=d.length;f>e;e+=1)d[e]=a.trim(d[e]);return d}function q(a){return a.outerWidth(!1)-a.width()}function r(c){var d="keyup-change-value";c.on("keydown",function(){a.data(c,d)===b&&a.data(c,d,c.val())}),c.on("keyup",function(){var e=a.data(c,d);e!==b&&c.val()!==e&&(a.removeData(c,d),c.trigger("keyup-change"))})}function s(c){c.on("mousemove",function(c){var d=i;(d===b||d.x!==c.pageX||d.y!==c.pageY)&&a(c.target).trigger("mousemove-filtered",c)})}function t(a,c,d){d=d||b;var e;return function(){var b=arguments;window.clearTimeout(e),e=window.setTimeout(function(){c.apply(d,b)},a)}}function u(a){var c,b=!1;return function(){return b===!1&&(c=a(),b=!0),c}}function v(a,b){var c=t(a,function(a){b.trigger("scroll-debounced",a)});b.on("scroll",function(a){m(a.target,b.get())>=0&&c(a)})}function w(a){a[0]!==document.activeElement&&window.setTimeout(function(){var d,b=a[0],c=a.val().length;a.focus(),a.is(":visible")&&b===document.activeElement&&(b.setSelectionRange?b.setSelectionRange(c,c):b.createTextRange&&(d=b.createTextRange(),d.collapse(!1),d.select()))},0)}function x(b){b=a(b)[0];var c=0,d=0;if("selectionStart"in b)c=b.selectionStart,d=b.selectionEnd-c;else if("selection"in document){b.focus();var e=document.selection.createRange();d=document.selection.createRange().text.length,e.moveStart("character",-b.value.length),c=e.text.length-d}return{offset:c,length:d}}function y(a){a.preventDefault(),a.stopPropagation()}function z(a){a.preventDefault(),a.stopImmediatePropagation()}function A(b){if(!h){var c=b[0].currentStyle||window.getComputedStyle(b[0],null);h=a(document.createElement("div")).css({position:"absolute",left:"-10000px",top:"-10000px",display:"none",fontSize:c.fontSize,fontFamily:c.fontFamily,fontStyle:c.fontStyle,fontWeight:c.fontWeight,letterSpacing:c.letterSpacing,textTransform:c.textTransform,whiteSpace:"nowrap"}),h.attr("class","select2-sizer"),a("body").append(h)}return h.text(b.val()),h.width()}function B(b,c,d){var e,g,f=[];e=b.attr("class"),e&&(e=""+e,a(e.split(" ")).each2(function(){0===this.indexOf("select2-")&&f.push(this)})),e=c.attr("class"),e&&(e=""+e,a(e.split(" ")).each2(function(){0!==this.indexOf("select2-")&&(g=d(this),g&&f.push(this))})),b.attr("class",f.join(" "))}function C(a,c,d,e){var f=a.toUpperCase().indexOf(c.toUpperCase()),g=c.length;return 0>f?(d.push(e(a)),b):(d.push(e(a.substring(0,f))),d.push("<span class='select2-match'>"),d.push(e(a.substring(f,f+g))),d.push("</span>"),d.push(e(a.substring(f+g,a.length))),b)}function D(a){var b={"\\":"&#92;","&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#47;"};return(a+"").replace(/[&<>"'\/\\]/g,function(a){return b[a]})}function E(c){var d,e=0,f=null,g=c.quietMillis||100,h=c.url,i=this;return function(j){window.clearTimeout(d),d=window.setTimeout(function(){e+=1;var d=e,g=c.data,k=h,l=c.transport||a.fn.select2.ajaxDefaults.transport,m={type:c.type||"GET",cache:c.cache||!1,jsonpCallback:c.jsonpCallback||b,dataType:c.dataType||"json"},n=a.extend({},a.fn.select2.ajaxDefaults.params,m);g=g?g.call(i,j.term,j.page,j.context):null,k="function"==typeof k?k.call(i,j.term,j.page,j.context):k,f&&f.abort(),c.params&&(a.isFunction(c.params)?a.extend(n,c.params.call(i)):a.extend(n,c.params)),a.extend(n,{url:k,dataType:c.dataType,data:g,success:function(a){if(!(e>d)){var b=c.results(a,j.page);j.callback(b)}}}),f=l.call(i,n)},g)}}function F(c){var e,f,d=c,g=function(a){return""+a.text};a.isArray(d)&&(f=d,d={results:f}),a.isFunction(d)===!1&&(f=d,d=function(){return f});var h=d();return h.text&&(g=h.text,a.isFunction(g)||(e=h.text,g=function(a){return a[e]})),function(c){var h,e=c.term,f={results:[]};return""===e?(c.callback(d()),b):(h=function(b,d){var f,i;if(b=b[0],b.children){f={};for(i in b)b.hasOwnProperty(i)&&(f[i]=b[i]);f.children=[],a(b.children).each2(function(a,b){h(b,f.children)}),(f.children.length||c.matcher(e,g(f),b))&&d.push(f)}else c.matcher(e,g(b),b)&&d.push(b)},a(d().results).each2(function(a,b){h(b,f.results)}),c.callback(f),b)}}function G(c){var d=a.isFunction(c);return function(e){var f=e.term,g={results:[]};a(d?c():c).each(function(){var a=this.text!==b,c=a?this.text:this;(""===f||e.matcher(f,c))&&g.results.push(a?this:{id:this,text:this})}),e.callback(g)}}function H(b,c){if(a.isFunction(b))return!0;if(!b)return!1;throw Error(c+" must be a function or a falsy value")}function I(b){return a.isFunction(b)?b():b}function J(b){var c=0;return a.each(b,function(a,b){b.children?c+=J(b.children):c++}),c}function K(a,c,d,e){var h,i,j,k,l,f=a,g=!1;if(!e.createSearchChoice||!e.tokenSeparators||1>e.tokenSeparators.length)return b;for(;;){for(i=-1,j=0,k=e.tokenSeparators.length;k>j&&(l=e.tokenSeparators[j],i=a.indexOf(l),!(i>=0));j++);if(0>i)break;if(h=a.substring(0,i),a=a.substring(i+l.length),h.length>0&&(h=e.createSearchChoice.call(this,h,c),h!==b&&null!==h&&e.id(h)!==b&&null!==e.id(h))){for(g=!1,j=0,k=c.length;k>j;j++)if(o(e.id(h),e.id(c[j]))){g=!0;break}g||d(h)}}return f!==a?a:b}function L(b,c){var d=function(){};return d.prototype=new b,d.prototype.constructor=d,d.prototype.parent=b.prototype,d.prototype=a.extend(d.prototype,c),d}if(window.Select2===b){var c,d,e,f,g,h,j,k,i={x:0,y:0},c={TAB:9,ENTER:13,ESC:27,SPACE:32,LEFT:37,UP:38,RIGHT:39,DOWN:40,SHIFT:16,CTRL:17,ALT:18,PAGE_UP:33,PAGE_DOWN:34,HOME:36,END:35,BACKSPACE:8,DELETE:46,isArrow:function(a){switch(a=a.which?a.which:a){case c.LEFT:case c.RIGHT:case c.UP:case c.DOWN:return!0}return!1},isControl:function(a){var b=a.which;switch(b){case c.SHIFT:case c.CTRL:case c.ALT:return!0}return a.metaKey?!0:!1},isFunctionKey:function(a){return a=a.which?a.which:a,a>=112&&123>=a}},l="<div class='select2-measure-scrollbar'></div>";j=a(document),g=function(){var a=1;return function(){return a++}}(),j.on("mousemove",function(a){i.x=a.pageX,i.y=a.pageY}),d=L(Object,{bind:function(a){var b=this;return function(){a.apply(b,arguments)}},init:function(c){var d,e,h,i,f=".select2-results";this.opts=c=this.prepareOpts(c),this.id=c.id,c.element.data("select2")!==b&&null!==c.element.data("select2")&&c.element.data("select2").destroy(),this.container=this.createContainer(),this.containerId="s2id_"+(c.element.attr("id")||"autogen"+g()),this.containerSelector="#"+this.containerId.replace(/([;&,\.\+\*\~':"\!\^#$%@\[\]\(\)=>\|])/g,"\\$1"),this.container.attr("id",this.containerId),this.body=u(function(){return c.element.closest("body")}),B(this.container,this.opts.element,this.opts.adaptContainerCssClass),this.container.css(I(c.containerCss)),this.container.addClass(I(c.containerCssClass)),this.elementTabIndex=this.opts.element.attr("tabindex"),this.opts.element.data("select2",this).attr("tabindex","-1").before(this.container),this.container.data("select2",this),this.dropdown=this.container.find(".select2-drop"),this.dropdown.addClass(I(c.dropdownCssClass)),this.dropdown.data("select2",this),this.results=d=this.container.find(f),this.search=e=this.container.find("input.select2-input"),this.resultsPage=0,this.context=null,this.initContainer(),s(this.results),this.dropdown.on("mousemove-filtered touchstart touchmove touchend",f,this.bind(this.highlightUnderEvent)),v(80,this.results),this.dropdown.on("scroll-debounced",f,this.bind(this.loadMoreIfNeeded)),a(this.container).on("change",".select2-input",function(a){a.stopPropagation()}),a(this.dropdown).on("change",".select2-input",function(a){a.stopPropagation()}),a.fn.mousewheel&&d.mousewheel(function(a,b,c,e){var f=d.scrollTop();e>0&&0>=f-e?(d.scrollTop(0),y(a)):0>e&&d.get(0).scrollHeight-d.scrollTop()+e<=d.height()&&(d.scrollTop(d.get(0).scrollHeight-d.height()),y(a))}),r(e),e.on("keyup-change input paste",this.bind(this.updateResults)),e.on("focus",function(){e.addClass("select2-focused")}),e.on("blur",function(){e.removeClass("select2-focused")}),this.dropdown.on("mouseup",f,this.bind(function(b){a(b.target).closest(".select2-result-selectable").length>0&&(this.highlightUnderEvent(b),this.selectHighlighted(b))})),this.dropdown.on("click mouseup mousedown",function(a){a.stopPropagation()}),a.isFunction(this.opts.initSelection)&&(this.initSelection(),this.monitorSource()),null!==c.maximumInputLength&&this.search.attr("maxlength",c.maximumInputLength);var h=c.element.prop("disabled");h===b&&(h=!1),this.enable(!h);var i=c.element.prop("readonly");i===b&&(i=!1),this.readonly(i),k=k||n(),this.autofocus=c.element.prop("autofocus"),c.element.prop("autofocus",!1),this.autofocus&&this.focus()},destroy:function(){var a=this.opts.element,c=a.data("select2");this.propertyObserver&&(delete this.propertyObserver,this.propertyObserver=null),c!==b&&(c.container.remove(),c.dropdown.remove(),a.removeClass("select2-offscreen").removeData("select2").off(".select2").prop("autofocus",this.autofocus||!1),this.elementTabIndex?a.attr({tabindex:this.elementTabIndex}):a.removeAttr("tabindex"),a.show())},optionToData:function(a){return a.is("option")?{id:a.prop("value"),text:a.text(),element:a.get(),css:a.attr("class"),disabled:a.prop("disabled"),locked:o(a.attr("locked"),"locked")||o(a.data("locked"),!0)}:a.is("optgroup")?{text:a.attr("label"),children:[],element:a.get(),css:a.attr("class")}:b},prepareOpts:function(c){var d,e,f,g,h=this;if(d=c.element,"select"===d.get(0).tagName.toLowerCase()&&(this.select=e=c.element),e&&a.each(["id","multiple","ajax","query","createSearchChoice","initSelection","data","tags"],function(){if(this in c)throw Error("Option '"+this+"' is not allowed for Select2 when attached to a <select> element.")}),c=a.extend({},{populateResults:function(d,e,f){var g,l=this.opts.id;g=function(d,e,i){var j,k,m,n,o,p,q,r,s,t;for(d=c.sortResults(d,e,f),j=0,k=d.length;k>j;j+=1)m=d[j],o=m.disabled===!0,n=!o&&l(m)!==b,p=m.children&&m.children.length>0,q=a("<li></li>"),q.addClass("select2-results-dept-"+i),q.addClass("select2-result"),q.addClass(n?"select2-result-selectable":"select2-result-unselectable"),o&&q.addClass("select2-disabled"),p&&q.addClass("select2-result-with-children"),q.addClass(h.opts.formatResultCssClass(m)),r=a(document.createElement("div")),r.addClass("select2-result-label"),t=c.formatResult(m,r,f,h.opts.escapeMarkup),t!==b&&r.html(t),q.append(r),p&&(s=a("<ul></ul>"),s.addClass("select2-result-sub"),g(m.children,s,i+1),q.append(s)),q.data("select2-data",m),e.append(q)},g(e,d,0)}},a.fn.select2.defaults,c),"function"!=typeof c.id&&(f=c.id,c.id=function(a){return a[f]}),a.isArray(c.element.data("select2Tags"))){if("tags"in c)throw"tags specified as both an attribute 'data-select2-tags' and in options of Select2 "+c.element.attr("id");c.tags=c.element.data("select2Tags")}if(e?(c.query=this.bind(function(a){var f,g,i,c={results:[],more:!1},e=a.term;i=function(b,c){var d;b.is("option")?a.matcher(e,b.text(),b)&&c.push(h.optionToData(b)):b.is("optgroup")&&(d=h.optionToData(b),b.children().each2(function(a,b){i(b,d.children)}),d.children.length>0&&c.push(d))},f=d.children(),this.getPlaceholder()!==b&&f.length>0&&(g=this.getPlaceholderOption(),g&&(f=f.not(g))),f.each2(function(a,b){i(b,c.results)}),a.callback(c)}),c.id=function(a){return a.id},c.formatResultCssClass=function(a){return a.css}):"query"in c||("ajax"in c?(g=c.element.data("ajax-url"),g&&g.length>0&&(c.ajax.url=g),c.query=E.call(c.element,c.ajax)):"data"in c?c.query=F(c.data):"tags"in c&&(c.query=G(c.tags),c.createSearchChoice===b&&(c.createSearchChoice=function(a){return{id:a,text:a}}),c.initSelection===b&&(c.initSelection=function(d,e){var f=[];a(p(d.val(),c.separator)).each(function(){var d=this,e=this,g=c.tags;a.isFunction(g)&&(g=g()),a(g).each(function(){return o(this.id,d)?(e=this.text,!1):b}),f.push({id:d,text:e})}),e(f)}))),"function"!=typeof c.query)throw"query function not defined for Select2 "+c.element.attr("id");return c},monitorSource:function(){var c,a=this.opts.element;a.on("change.select2",this.bind(function(){this.opts.element.data("select2-change-triggered")!==!0&&this.initSelection()})),c=this.bind(function(){var d,f=a.prop("disabled");f===b&&(f=!1),this.enable(!f);var d=a.prop("readonly");d===b&&(d=!1),this.readonly(d),B(this.container,this.opts.element,this.opts.adaptContainerCssClass),this.container.addClass(I(this.opts.containerCssClass)),B(this.dropdown,this.opts.element,this.opts.adaptDropdownCssClass),this.dropdown.addClass(I(this.opts.dropdownCssClass))}),a.on("propertychange.select2 DOMAttrModified.select2",c),this.mutationCallback===b&&(this.mutationCallback=function(a){a.forEach(c)}),"undefined"!=typeof WebKitMutationObserver&&(this.propertyObserver&&(delete this.propertyObserver,this.propertyObserver=null),this.propertyObserver=new WebKitMutationObserver(this.mutationCallback),this.propertyObserver.observe(a.get(0),{attributes:!0,subtree:!1}))},triggerSelect:function(b){var c=a.Event("select2-selecting",{val:this.id(b),object:b});return this.opts.element.trigger(c),!c.isDefaultPrevented()},triggerChange:function(b){b=b||{},b=a.extend({},b,{type:"change",val:this.val()}),this.opts.element.data("select2-change-triggered",!0),this.opts.element.trigger(b),this.opts.element.data("select2-change-triggered",!1),this.opts.element.click(),this.opts.blurOnChange&&this.opts.element.blur()},isInterfaceEnabled:function(){return this.enabledInterface===!0},enableInterface:function(){var a=this._enabled&&!this._readonly,b=!a;return a===this.enabledInterface?!1:(this.container.toggleClass("select2-container-disabled",b),this.close(),this.enabledInterface=a,!0)},enable:function(a){return a===b&&(a=!0),this._enabled===a?!1:(this._enabled=a,this.opts.element.prop("disabled",!a),this.enableInterface(),!0)},readonly:function(a){return a===b&&(a=!1),this._readonly===a?!1:(this._readonly=a,this.opts.element.prop("readonly",a),this.enableInterface(),!0)},opened:function(){return this.container.hasClass("select2-dropdown-open")},positionDropdown:function(){var q,r,s,t,b=this.dropdown,c=this.container.offset(),d=this.container.outerHeight(!1),e=this.container.outerWidth(!1),f=b.outerHeight(!1),g=a(window).scrollLeft()+a(window).width(),h=a(window).scrollTop()+a(window).height(),i=c.top+d,j=c.left,l=h>=i+f,m=c.top-f>=this.body().scrollTop(),n=b.outerWidth(!1),o=g>=j+n,p=b.hasClass("select2-drop-above");this.opts.dropdownAutoWidth?(t=a(".select2-results",b)[0],b.addClass("select2-drop-auto-width"),b.css("width",""),n=b.outerWidth(!1)+(t.scrollHeight===t.clientHeight?0:k.width),n>e?e=n:n=e,o=g>=j+n):this.container.removeClass("select2-drop-auto-width"),"static"!==this.body().css("position")&&(q=this.body().offset(),i-=q.top,j-=q.left),p?(r=!0,!m&&l&&(r=!1)):(r=!1,!l&&m&&(r=!0)),o||(j=c.left+e-n),r?(i=c.top-f,this.container.addClass("select2-drop-above"),b.addClass("select2-drop-above")):(this.container.removeClass("select2-drop-above"),b.removeClass("select2-drop-above")),s=a.extend({top:i,left:j,width:e},I(this.opts.dropdownCss)),b.css(s)},shouldOpen:function(){var b;return this.opened()?!1:this._enabled===!1||this._readonly===!0?!1:(b=a.Event("select2-opening"),this.opts.element.trigger(b),!b.isDefaultPrevented())},clearDropdownAlignmentPreference:function(){this.container.removeClass("select2-drop-above"),this.dropdown.removeClass("select2-drop-above")},open:function(){return this.shouldOpen()?(this.opening(),!0):!1},opening:function(){function i(){return{width:Math.max(document.documentElement.scrollWidth,a(window).width()),height:Math.max(document.documentElement.scrollHeight,a(window).height())}}var f,g,b=this.containerId,c="scroll."+b,d="resize."+b,e="orientationchange."+b;this.container.addClass("select2-dropdown-open").addClass("select2-container-active"),this.clearDropdownAlignmentPreference(),this.dropdown[0]!==this.body().children().last()[0]&&this.dropdown.detach().appendTo(this.body()),f=a("#select2-drop-mask"),0==f.length&&(f=a(document.createElement("div")),f.attr("id","select2-drop-mask").attr("class","select2-drop-mask"),f.hide(),f.appendTo(this.body()),f.on("mousedown touchstart click",function(b){var d,c=a("#select2-drop");c.length>0&&(d=c.data("select2"),d.opts.selectOnBlur&&d.selectHighlighted({noFocus:!0}),d.close(),b.preventDefault(),b.stopPropagation())})),this.dropdown.prev()[0]!==f[0]&&this.dropdown.before(f),a("#select2-drop").removeAttr("id"),this.dropdown.attr("id","select2-drop"),g=i(),f.css(g).show(),this.dropdown.show(),this.positionDropdown(),this.dropdown.addClass("select2-drop-active");var h=this;this.container.parents().add(window).each(function(){a(this).on(d+" "+c+" "+e,function(){var c=i();a("#select2-drop-mask").css(c),h.positionDropdown()})})},close:function(){if(this.opened()){var b=this.containerId,c="scroll."+b,d="resize."+b,e="orientationchange."+b;this.container.parents().add(window).each(function(){a(this).off(c).off(d).off(e)}),this.clearDropdownAlignmentPreference(),a("#select2-drop-mask").hide(),this.dropdown.removeAttr("id"),this.dropdown.hide(),this.container.removeClass("select2-dropdown-open"),this.results.empty(),this.clearSearch(),this.search.removeClass("select2-active"),this.opts.element.trigger(a.Event("select2-close"))}},externalSearch:function(a){this.open(),this.search.val(a),this.updateResults(!1)},clearSearch:function(){},getMaximumSelectionSize:function(){return I(this.opts.maximumSelectionSize)},ensureHighlightVisible:function(){var d,e,f,g,h,i,j,c=this.results;if(e=this.highlight(),!(0>e)){if(0==e)return c.scrollTop(0),b;d=this.findHighlightableChoices().find(".select2-result-label"),f=a(d[e]),g=f.offset().top+f.outerHeight(!0),e===d.length-1&&(j=c.find("li.select2-more-results"),j.length>0&&(g=j.offset().top+j.outerHeight(!0))),h=c.offset().top+c.outerHeight(!0),g>h&&c.scrollTop(c.scrollTop()+(g-h)),i=f.offset().top-c.offset().top,0>i&&"none"!=f.css("display")&&c.scrollTop(c.scrollTop()+i)}},findHighlightableChoices:function(){return this.results.find(".select2-result-selectable:not(.select2-selected):not(.select2-disabled)")},moveHighlight:function(b){for(var c=this.findHighlightableChoices(),d=this.highlight();d>-1&&c.length>d;){d+=b;var e=a(c[d]);if(e.hasClass("select2-result-selectable")&&!e.hasClass("select2-disabled")&&!e.hasClass("select2-selected")){this.highlight(d);break}}},highlight:function(c){var e,f,d=this.findHighlightableChoices();return 0===arguments.length?m(d.filter(".select2-highlighted")[0],d.get()):(c>=d.length&&(c=d.length-1),0>c&&(c=0),this.results.find(".select2-highlighted").removeClass("select2-highlighted"),e=a(d[c]),e.addClass("select2-highlighted"),this.ensureHighlightVisible(),f=e.data("select2-data"),f&&this.opts.element.trigger({type:"select2-highlight",val:this.id(f),choice:f}),b)},countSelectableResults:function(){return this.findHighlightableChoices().length},highlightUnderEvent:function(b){var c=a(b.target).closest(".select2-result-selectable");if(c.length>0&&!c.is(".select2-highlighted")){var d=this.findHighlightableChoices();this.highlight(d.index(c))}else 0==c.length&&this.results.find(".select2-highlighted").removeClass("select2-highlighted")},loadMoreIfNeeded:function(){var c,a=this.results,b=a.find("li.select2-more-results"),e=this.resultsPage+1,f=this,g=this.search.val(),h=this.context;0!==b.length&&(c=b.offset().top-a.offset().top-a.height(),this.opts.loadMorePadding>=c&&(b.addClass("select2-active"),this.opts.query({element:this.opts.element,term:g,page:e,context:h,matcher:this.opts.matcher,callback:this.bind(function(c){f.opened()&&(f.opts.populateResults.call(this,a,c.results,{term:g,page:e,context:h}),f.postprocessResults(c,!1,!1),c.more===!0?(b.detach().appendTo(a).text(f.opts.formatLoadMore(e+1)),window.setTimeout(function(){f.loadMoreIfNeeded()},10)):b.remove(),f.positionDropdown(),f.resultsPage=e,f.context=c.context)})})))},tokenize:function(){},updateResults:function(c){function l(){d.removeClass("select2-active"),h.positionDropdown()}function m(a){e.html(a),l()}var g,i,d=this.search,e=this.results,f=this.opts,h=this,j=d.val(),k=a.data(this.container,"select2-last-term");if((c===!0||!k||!o(j,k))&&(a.data(this.container,"select2-last-term",j),c===!0||this.showSearchInput!==!1&&this.opened())){var n=this.getMaximumSelectionSize();if(n>=1&&(g=this.data(),a.isArray(g)&&g.length>=n&&H(f.formatSelectionTooBig,"formatSelectionTooBig")))return m("<li class='select2-selection-limit'>"+f.formatSelectionTooBig(n)+"</li>"),b;if(d.val().length<f.minimumInputLength)return H(f.formatInputTooShort,"formatInputTooShort")?m("<li class='select2-no-results'>"+f.formatInputTooShort(d.val(),f.minimumInputLength)+"</li>"):m(""),c&&this.showSearch&&this.showSearch(!0),b;if(f.maximumInputLength&&d.val().length>f.maximumInputLength)return H(f.formatInputTooLong,"formatInputTooLong")?m("<li class='select2-no-results'>"+f.formatInputTooLong(d.val(),f.maximumInputLength)+"</li>"):m(""),b;f.formatSearching&&0===this.findHighlightableChoices().length&&m("<li class='select2-searching'>"+f.formatSearching()+"</li>"),d.addClass("select2-active"),i=this.tokenize(),i!=b&&null!=i&&d.val(i),this.resultsPage=1,f.query({element:f.element,term:d.val(),page:this.resultsPage,context:null,matcher:f.matcher,callback:this.bind(function(g){var i;return this.opened()?(this.context=g.context===b?null:g.context,this.opts.createSearchChoice&&""!==d.val()&&(i=this.opts.createSearchChoice.call(h,d.val(),g.results),i!==b&&null!==i&&h.id(i)!==b&&null!==h.id(i)&&0===a(g.results).filter(function(){return o(h.id(this),h.id(i))}).length&&g.results.unshift(i)),0===g.results.length&&H(f.formatNoMatches,"formatNoMatches")?(m("<li class='select2-no-results'>"+f.formatNoMatches(d.val())+"</li>"),b):(e.empty(),h.opts.populateResults.call(this,e,g.results,{term:d.val(),page:this.resultsPage,context:null}),g.more===!0&&H(f.formatLoadMore,"formatLoadMore")&&(e.append("<li class='select2-more-results'>"+h.opts.escapeMarkup(f.formatLoadMore(this.resultsPage))+"</li>"),window.setTimeout(function(){h.loadMoreIfNeeded()},10)),this.postprocessResults(g,c),l(),this.opts.element.trigger({type:"select2-loaded",items:g}),b)):(this.search.removeClass("select2-active"),b)})})}},cancel:function(){this.close()},blur:function(){this.opts.selectOnBlur&&this.selectHighlighted({noFocus:!0}),this.close(),this.container.removeClass("select2-container-active"),this.search[0]===document.activeElement&&this.search.blur(),this.clearSearch(),this.selection.find(".select2-search-choice-focus").removeClass("select2-search-choice-focus")},focusSearch:function(){w(this.search)},selectHighlighted:function(a){var b=this.highlight(),c=this.results.find(".select2-highlighted"),d=c.closest(".select2-result").data("select2-data");d?(this.highlight(b),this.onSelect(d,a)):a&&a.noFocus&&this.close()},getPlaceholder:function(){var a;return this.opts.element.attr("placeholder")||this.opts.element.attr("data-placeholder")||this.opts.element.data("placeholder")||this.opts.placeholder||((a=this.getPlaceholderOption())!==b?a.text():b)},getPlaceholderOption:function(){if(this.select){var a=this.select.children().first();if(this.opts.placeholderOption!==b)return"first"===this.opts.placeholderOption&&a||"function"==typeof this.opts.placeholderOption&&this.opts.placeholderOption(this.select);if(""===a.text()&&""===a.val())return a}},initContainerWidth:function(){function c(){var c,d,e,f,g;if("off"===this.opts.width)return null;if("element"===this.opts.width)return 0===this.opts.element.outerWidth(!1)?"auto":this.opts.element.outerWidth(!1)+"px";if("copy"===this.opts.width||"resolve"===this.opts.width){if(c=this.opts.element.attr("style"),c!==b)for(d=c.split(";"),f=0,g=d.length;g>f;f+=1)if(e=d[f].replace(/\s/g,"").match(/width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i),null!==e&&e.length>=1)return e[1];return"resolve"===this.opts.width?(c=this.opts.element.css("width"),c.indexOf("%")>0?c:0===this.opts.element.outerWidth(!1)?"auto":this.opts.element.outerWidth(!1)+"px"):null}return a.isFunction(this.opts.width)?this.opts.width():this.opts.width}var d=c.call(this);null!==d&&this.container.css("width",d)}}),e=L(d,{createContainer:function(){var b=a(document.createElement("div")).attr({"class":"select2-container"}).html(["<a href='javascript:void(0)' onclick='return false;' class='select2-choice' tabindex='-1'>","   <span class='select2-chosen'>&nbsp;</span><abbr class='select2-search-choice-close'></abbr>","   <span class='select2-arrow'><b></b></span>","</a>","<input class='select2-focusser select2-offscreen' type='text'/>","<div class='select2-drop select2-display-none'>","   <div class='select2-search'>","       <input type='text' autocomplete='off' autocorrect='off' autocapitalize='off' spellcheck='false' class='select2-input'/>","   </div>","   <ul class='select2-results'>","   </ul>","</div>"].join(""));return b},enableInterface:function(){this.parent.enableInterface.apply(this,arguments)&&this.focusser.prop("disabled",!this.isInterfaceEnabled())},opening:function(){var b,c,d;this.opts.minimumResultsForSearch>=0&&this.showSearch(!0),this.parent.opening.apply(this,arguments),this.showSearchInput!==!1&&this.search.val(this.focusser.val()),this.search.focus(),b=this.search.get(0),b.createTextRange?(c=b.createTextRange(),c.collapse(!1),c.select()):b.setSelectionRange&&(d=this.search.val().length,b.setSelectionRange(d,d)),this.focusser.prop("disabled",!0).val(""),this.updateResults(!0),this.opts.element.trigger(a.Event("select2-open"))},close:function(){this.opened()&&(this.parent.close.apply(this,arguments),this.focusser.removeAttr("disabled"),this.focusser.focus())},focus:function(){this.opened()?this.close():(this.focusser.removeAttr("disabled"),this.focusser.focus())},isFocused:function(){return this.container.hasClass("select2-container-active")},cancel:function(){this.parent.cancel.apply(this,arguments),this.focusser.removeAttr("disabled"),this.focusser.focus()},initContainer:function(){var d,e=this.container,f=this.dropdown;0>this.opts.minimumResultsForSearch?this.showSearch(!1):this.showSearch(!0),this.selection=d=e.find(".select2-choice"),this.focusser=e.find(".select2-focusser"),this.focusser.attr("id","s2id_autogen"+g()),a("label[for='"+this.opts.element.attr("id")+"']").attr("for",this.focusser.attr("id")),this.focusser.attr("tabindex",this.elementTabIndex),this.search.on("keydown",this.bind(function(a){if(this.isInterfaceEnabled()){if(a.which===c.PAGE_UP||a.which===c.PAGE_DOWN)return y(a),b;switch(a.which){case c.UP:case c.DOWN:return this.moveHighlight(a.which===c.UP?-1:1),y(a),b;case c.ENTER:return this.selectHighlighted(),y(a),b;case c.TAB:return this.selectHighlighted({noFocus:!0}),b;case c.ESC:return this.cancel(a),y(a),b}}})),this.search.on("blur",this.bind(function(){document.activeElement===this.body().get(0)&&window.setTimeout(this.bind(function(){this.search.focus()}),0)})),this.focusser.on("keydown",this.bind(function(a){if(this.isInterfaceEnabled()&&a.which!==c.TAB&&!c.isControl(a)&&!c.isFunctionKey(a)&&a.which!==c.ESC){if(this.opts.openOnEnter===!1&&a.which===c.ENTER)return y(a),b;if(a.which==c.DOWN||a.which==c.UP||a.which==c.ENTER&&this.opts.openOnEnter){if(a.altKey||a.ctrlKey||a.shiftKey||a.metaKey)return;return this.open(),y(a),b}return a.which==c.DELETE||a.which==c.BACKSPACE?(this.opts.allowClear&&this.clear(),y(a),b):b}})),r(this.focusser),this.focusser.on("keyup-change input",this.bind(function(a){if(this.opts.minimumResultsForSearch>=0){if(a.stopPropagation(),this.opened())return;this.open()}})),d.on("mousedown","abbr",this.bind(function(a){this.isInterfaceEnabled()&&(this.clear(),z(a),this.close(),this.selection.focus())})),d.on("mousedown",this.bind(function(b){this.container.hasClass("select2-container-active")||this.opts.element.trigger(a.Event("select2-focus")),this.opened()?this.close():this.isInterfaceEnabled()&&this.open(),y(b)})),f.on("mousedown",this.bind(function(){this.search.focus()})),d.on("focus",this.bind(function(a){y(a)})),this.focusser.on("focus",this.bind(function(){this.container.hasClass("select2-container-active")||this.opts.element.trigger(a.Event("select2-focus")),this.container.addClass("select2-container-active")})).on("blur",this.bind(function(){this.opened()||(this.container.removeClass("select2-container-active"),this.opts.element.trigger(a.Event("select2-blur")))})),this.search.on("focus",this.bind(function(){this.container.hasClass("select2-container-active")||this.opts.element.trigger(a.Event("select2-focus")),this.container.addClass("select2-container-active")})),this.initContainerWidth(),this.opts.element.addClass("select2-offscreen"),this.setPlaceholder()},clear:function(a){var b=this.selection.data("select2-data");if(b){var c=this.getPlaceholderOption();this.opts.element.val(c?c.val():""),this.selection.find(".select2-chosen").empty(),this.selection.removeData("select2-data"),this.setPlaceholder(),a!==!1&&(this.opts.element.trigger({type:"select2-removed",val:this.id(b),choice:b}),this.triggerChange({removed:b}))}},initSelection:function(){if(this.isPlaceholderOptionSelected())this.updateSelection([]),this.close(),this.setPlaceholder();else{var c=this;this.opts.initSelection.call(null,this.opts.element,function(a){a!==b&&null!==a&&(c.updateSelection(a),c.close(),c.setPlaceholder())})}},isPlaceholderOptionSelected:function(){var a;return(a=this.getPlaceholderOption())!==b&&a.is(":selected")||""===this.opts.element.val()||this.opts.element.val()===b||null===this.opts.element.val()},prepareOpts:function(){var b=this.parent.prepareOpts.apply(this,arguments),c=this;return"select"===b.element.get(0).tagName.toLowerCase()?b.initSelection=function(a,b){var d=a.find(":selected");b(c.optionToData(d))}:"data"in b&&(b.initSelection=b.initSelection||function(c,d){var e=c.val(),f=null;b.query({matcher:function(a,c,d){var g=o(e,b.id(d));return g&&(f=d),g},callback:a.isFunction(d)?function(){d(f)}:a.noop})}),b},getPlaceholder:function(){return this.select&&this.getPlaceholderOption()===b?b:this.parent.getPlaceholder.apply(this,arguments)},setPlaceholder:function(){var a=this.getPlaceholder();if(this.isPlaceholderOptionSelected()&&a!==b){if(this.select&&this.getPlaceholderOption()===b)return;this.selection.find(".select2-chosen").html(this.opts.escapeMarkup(a)),this.selection.addClass("select2-default"),this.container.removeClass("select2-allowclear")}},postprocessResults:function(a,c,d){var e=0,f=this;if(this.findHighlightableChoices().each2(function(a,c){return o(f.id(c.data("select2-data")),f.opts.element.val())?(e=a,!1):b}),d!==!1&&(c===!0&&e>=0?this.highlight(e):this.highlight(0)),c===!0){var h=this.opts.minimumResultsForSearch;h>=0&&this.showSearch(J(a.results)>=h)}},showSearch:function(b){this.showSearchInput!==b&&(this.showSearchInput=b,this.dropdown.find(".select2-search").toggleClass("select2-search-hidden",!b),this.dropdown.find(".select2-search").toggleClass("select2-offscreen",!b),a(this.dropdown,this.container).toggleClass("select2-with-searchbox",b))},onSelect:function(a,b){if(this.triggerSelect(a)){var c=this.opts.element.val(),d=this.data();this.opts.element.val(this.id(a)),this.updateSelection(a),this.opts.element.trigger({type:"select2-selected",val:this.id(a),choice:a}),this.close(),b&&b.noFocus||this.selection.focus(),o(c,this.id(a))||this.triggerChange({added:a,removed:d})}},updateSelection:function(a){var d,e,c=this.selection.find(".select2-chosen");this.selection.data("select2-data",a),c.empty(),d=this.opts.formatSelection(a,c,this.opts.escapeMarkup),d!==b&&c.append(d),e=this.opts.formatSelectionCssClass(a,c),e!==b&&c.addClass(e),this.selection.removeClass("select2-default"),this.opts.allowClear&&this.getPlaceholder()!==b&&this.container.addClass("select2-allowclear")
},val:function(){var a,c=!1,d=null,e=this,f=this.data();if(0===arguments.length)return this.opts.element.val();if(a=arguments[0],arguments.length>1&&(c=arguments[1]),this.select)this.select.val(a).find(":selected").each2(function(a,b){return d=e.optionToData(b),!1}),this.updateSelection(d),this.setPlaceholder(),c&&this.triggerChange({added:d,removed:f});else{if(!a&&0!==a)return this.clear(c),b;if(this.opts.initSelection===b)throw Error("cannot call val() if initSelection() is not defined");this.opts.element.val(a),this.opts.initSelection(this.opts.element,function(a){e.opts.element.val(a?e.id(a):""),e.updateSelection(a),e.setPlaceholder(),c&&e.triggerChange({added:a,removed:f})})}},clearSearch:function(){this.search.val(""),this.focusser.val("")},data:function(a,c){var d;return 0===arguments.length?(d=this.selection.data("select2-data"),d==b&&(d=null),d):(a&&""!==a?(d=this.data(),this.opts.element.val(a?this.id(a):""),this.updateSelection(a),c&&this.triggerChange({added:a,removed:d})):this.clear(c),b)}}),f=L(d,{createContainer:function(){var b=a(document.createElement("div")).attr({"class":"select2-container select2-container-multi"}).html(["<ul class='select2-choices'>","  <li class='select2-search-field'>","    <input type='text' autocomplete='off' autocorrect='off' autocapitilize='off' spellcheck='false' class='select2-input'>","  </li>","</ul>","<div class='select2-drop select2-drop-multi select2-display-none'>","   <ul class='select2-results'>","   </ul>","</div>"].join(""));return b},prepareOpts:function(){var b=this.parent.prepareOpts.apply(this,arguments),c=this;return"select"===b.element.get(0).tagName.toLowerCase()?b.initSelection=function(a,b){var d=[];a.find(":selected").each2(function(a,b){d.push(c.optionToData(b))}),b(d)}:"data"in b&&(b.initSelection=b.initSelection||function(c,d){var e=p(c.val(),b.separator),f=[];b.query({matcher:function(c,d,g){var h=a.grep(e,function(a){return o(a,b.id(g))}).length;return h&&f.push(g),h},callback:a.isFunction(d)?function(){for(var a=[],c=0;e.length>c;c++)for(var g=e[c],h=0;f.length>h;h++){var i=f[h];if(o(g,b.id(i))){a.push(i),f.splice(h,1);break}}d(a)}:a.noop})}),b},selectChoice:function(a){var b=this.container.find(".select2-search-choice-focus");b.length&&a&&a[0]==b[0]||(b.length&&this.opts.element.trigger("choice-deselected",b),b.removeClass("select2-search-choice-focus"),a&&a.length&&(this.close(),a.addClass("select2-search-choice-focus"),this.opts.element.trigger("choice-selected",a)))},initContainer:function(){var e,d=".select2-choices";this.searchContainer=this.container.find(".select2-search-field"),this.selection=e=this.container.find(d);var f=this;this.selection.on("mousedown",".select2-search-choice",function(){f.search[0].focus(),f.selectChoice(a(this))}),this.search.attr("id","s2id_autogen"+g()),a("label[for='"+this.opts.element.attr("id")+"']").attr("for",this.search.attr("id")),this.search.on("input paste",this.bind(function(){this.isInterfaceEnabled()&&(this.opened()||this.open())})),this.search.attr("tabindex",this.elementTabIndex),this.keydowns=0,this.search.on("keydown",this.bind(function(a){if(this.isInterfaceEnabled()){++this.keydowns;var d=e.find(".select2-search-choice-focus"),f=d.prev(".select2-search-choice:not(.select2-locked)"),g=d.next(".select2-search-choice:not(.select2-locked)"),h=x(this.search);if(d.length&&(a.which==c.LEFT||a.which==c.RIGHT||a.which==c.BACKSPACE||a.which==c.DELETE||a.which==c.ENTER)){var i=d;return a.which==c.LEFT&&f.length?i=f:a.which==c.RIGHT?i=g.length?g:null:a.which===c.BACKSPACE?(this.unselect(d.first()),this.search.width(10),i=f.length?f:g):a.which==c.DELETE?(this.unselect(d.first()),this.search.width(10),i=g.length?g:null):a.which==c.ENTER&&(i=null),this.selectChoice(i),y(a),i&&i.length||this.open(),b}if((a.which===c.BACKSPACE&&1==this.keydowns||a.which==c.LEFT)&&0==h.offset&&!h.length)return this.selectChoice(e.find(".select2-search-choice:not(.select2-locked)").last()),y(a),b;if(this.selectChoice(null),this.opened())switch(a.which){case c.UP:case c.DOWN:return this.moveHighlight(a.which===c.UP?-1:1),y(a),b;case c.ENTER:return this.selectHighlighted(),y(a),b;case c.TAB:return this.selectHighlighted({noFocus:!0}),this.close(),b;case c.ESC:return this.cancel(a),y(a),b}if(a.which!==c.TAB&&!c.isControl(a)&&!c.isFunctionKey(a)&&a.which!==c.BACKSPACE&&a.which!==c.ESC){if(a.which===c.ENTER){if(this.opts.openOnEnter===!1)return;if(a.altKey||a.ctrlKey||a.shiftKey||a.metaKey)return}this.open(),(a.which===c.PAGE_UP||a.which===c.PAGE_DOWN)&&y(a),a.which===c.ENTER&&y(a)}}})),this.search.on("keyup",this.bind(function(){this.keydowns=0,this.resizeSearch()})),this.search.on("blur",this.bind(function(b){this.container.removeClass("select2-container-active"),this.search.removeClass("select2-focused"),this.selectChoice(null),this.opened()||this.clearSearch(),b.stopImmediatePropagation(),this.opts.element.trigger(a.Event("select2-blur"))})),this.container.on("click",d,this.bind(function(b){this.isInterfaceEnabled()&&(a(b.target).closest(".select2-search-choice").length>0||(this.selectChoice(null),this.clearPlaceholder(),this.container.hasClass("select2-container-active")||this.opts.element.trigger(a.Event("select2-focus")),this.open(),this.focusSearch(),b.preventDefault()))})),this.container.on("focus",d,this.bind(function(){this.isInterfaceEnabled()&&(this.container.hasClass("select2-container-active")||this.opts.element.trigger(a.Event("select2-focus")),this.container.addClass("select2-container-active"),this.dropdown.addClass("select2-drop-active"),this.clearPlaceholder())})),this.initContainerWidth(),this.opts.element.addClass("select2-offscreen"),this.clearSearch()},enableInterface:function(){this.parent.enableInterface.apply(this,arguments)&&this.search.prop("disabled",!this.isInterfaceEnabled())},initSelection:function(){if(""===this.opts.element.val()&&""===this.opts.element.text()&&(this.updateSelection([]),this.close(),this.clearSearch()),this.select||""!==this.opts.element.val()){var c=this;this.opts.initSelection.call(null,this.opts.element,function(a){a!==b&&null!==a&&(c.updateSelection(a),c.close(),c.clearSearch())})}},clearSearch:function(){var a=this.getPlaceholder(),c=this.getMaxSearchWidth();a!==b&&0===this.getVal().length&&this.search.hasClass("select2-focused")===!1?(this.search.val(a).addClass("select2-default"),this.search.width(c>0?c:this.container.css("width"))):this.search.val("").width(10)},clearPlaceholder:function(){this.search.hasClass("select2-default")&&this.search.val("").removeClass("select2-default")},opening:function(){this.clearPlaceholder(),this.resizeSearch(),this.parent.opening.apply(this,arguments),this.focusSearch(),this.updateResults(!0),this.search.focus(),this.opts.element.trigger(a.Event("select2-open"))},close:function(){this.opened()&&this.parent.close.apply(this,arguments)},focus:function(){this.close(),this.search.focus()},isFocused:function(){return this.search.hasClass("select2-focused")},updateSelection:function(b){var c=[],d=[],e=this;a(b).each(function(){0>m(e.id(this),c)&&(c.push(e.id(this)),d.push(this))}),b=d,this.selection.find(".select2-search-choice").remove(),a(b).each(function(){e.addSelectedChoice(this)}),e.postprocessResults()},tokenize:function(){var a=this.search.val();a=this.opts.tokenizer.call(this,a,this.data(),this.bind(this.onSelect),this.opts),null!=a&&a!=b&&(this.search.val(a),a.length>0&&this.open())},onSelect:function(a,b){this.triggerSelect(a)&&(this.addSelectedChoice(a),this.opts.element.trigger({type:"selected",val:this.id(a),choice:a}),(this.select||!this.opts.closeOnSelect)&&this.postprocessResults(),this.opts.closeOnSelect?(this.close(),this.search.width(10)):this.countSelectableResults()>0?(this.search.width(10),this.resizeSearch(),this.getMaximumSelectionSize()>0&&this.val().length>=this.getMaximumSelectionSize()&&this.updateResults(!0),this.positionDropdown()):(this.close(),this.search.width(10)),this.triggerChange({added:a}),b&&b.noFocus||this.focusSearch())},cancel:function(){this.close(),this.focusSearch()},addSelectedChoice:function(c){var j,k,d=!c.locked,e=a("<li class='select2-search-choice'>    <div></div>    <a href='#' onclick='return false;' class='select2-search-choice-close' tabindex='-1'></a></li>"),f=a("<li class='select2-search-choice select2-locked'><div></div></li>"),g=d?e:f,h=this.id(c),i=this.getVal();j=this.opts.formatSelection(c,g.find("div"),this.opts.escapeMarkup),j!=b&&g.find("div").replaceWith("<div>"+j+"</div>"),k=this.opts.formatSelectionCssClass(c,g.find("div")),k!=b&&g.addClass(k),d&&g.find(".select2-search-choice-close").on("mousedown",y).on("click dblclick",this.bind(function(b){this.isInterfaceEnabled()&&(a(b.target).closest(".select2-search-choice").fadeOut("fast",this.bind(function(){this.unselect(a(b.target)),this.selection.find(".select2-search-choice-focus").removeClass("select2-search-choice-focus"),this.close(),this.focusSearch()})).dequeue(),y(b))})).on("focus",this.bind(function(){this.isInterfaceEnabled()&&(this.container.addClass("select2-container-active"),this.dropdown.addClass("select2-drop-active"))})),g.data("select2-data",c),g.insertBefore(this.searchContainer),i.push(h),this.setVal(i)},unselect:function(a){var c,d,b=this.getVal();if(a=a.closest(".select2-search-choice"),0===a.length)throw"Invalid argument: "+a+". Must be .select2-search-choice";c=a.data("select2-data"),c&&(d=m(this.id(c),b),d>=0&&(b.splice(d,1),this.setVal(b),this.select&&this.postprocessResults()),a.remove(),this.opts.element.trigger({type:"removed",val:this.id(c),choice:c}),this.triggerChange({removed:c}))},postprocessResults:function(a,b,c){var d=this.getVal(),e=this.results.find(".select2-result"),f=this.results.find(".select2-result-with-children"),g=this;e.each2(function(a,b){var c=g.id(b.data("select2-data"));m(c,d)>=0&&(b.addClass("select2-selected"),b.find(".select2-result-selectable").addClass("select2-selected"))}),f.each2(function(a,b){b.is(".select2-result-selectable")||0!==b.find(".select2-result-selectable:not(.select2-selected)").length||b.addClass("select2-selected")}),-1==this.highlight()&&c!==!1&&g.highlight(0),!this.opts.createSearchChoice&&!e.filter(".select2-result:not(.select2-selected)").length>0&&(!a||a&&!a.more&&0===this.results.find(".select2-no-results").length)&&H(g.opts.formatNoMatches,"formatNoMatches")&&this.results.append("<li class='select2-no-results'>"+g.opts.formatNoMatches(g.search.val())+"</li>")},getMaxSearchWidth:function(){return this.selection.width()-q(this.search)},resizeSearch:function(){var a,b,c,d,e,f=q(this.search);a=A(this.search)+10,b=this.search.offset().left,c=this.selection.width(),d=this.selection.offset().left,e=c-(b-d)-f,a>e&&(e=c-f),40>e&&(e=c-f),0>=e&&(e=a),this.search.width(e)},getVal:function(){var a;return this.select?(a=this.select.val(),null===a?[]:a):(a=this.opts.element.val(),p(a,this.opts.separator))},setVal:function(b){var c;this.select?this.select.val(b):(c=[],a(b).each(function(){0>m(this,c)&&c.push(this)}),this.opts.element.val(0===c.length?"":c.join(this.opts.separator)))},buildChangeDetails:function(a,b){for(var b=b.slice(0),a=a.slice(0),c=0;b.length>c;c++)for(var d=0;a.length>d;d++)o(this.opts.id(b[c]),this.opts.id(a[d]))&&(b.splice(c,1),c--,a.splice(d,1),d--);return{added:b,removed:a}},val:function(c,d){var e,f=this;if(0===arguments.length)return this.getVal();if(e=this.data(),e.length||(e=[]),!c&&0!==c)return this.opts.element.val(""),this.updateSelection([]),this.clearSearch(),d&&this.triggerChange({added:this.data(),removed:e}),b;if(this.setVal(c),this.select)this.opts.initSelection(this.select,this.bind(this.updateSelection)),d&&this.triggerChange(this.buildChangeDetails(e,this.data()));else{if(this.opts.initSelection===b)throw Error("val() cannot be called if initSelection() is not defined");this.opts.initSelection(this.opts.element,function(b){var c=a.map(b,f.id);f.setVal(c),f.updateSelection(b),f.clearSearch(),d&&f.triggerChange(this.buildChangeDetails(e,this.data()))})}this.clearSearch()},onSortStart:function(){if(this.select)throw Error("Sorting of elements is not supported when attached to <select>. Attach to <input type='hidden'/> instead.");this.search.width(0),this.searchContainer.hide()},onSortEnd:function(){var b=[],c=this;this.searchContainer.show(),this.searchContainer.appendTo(this.searchContainer.parent()),this.resizeSearch(),this.selection.find(".select2-search-choice").each(function(){b.push(c.opts.id(a(this).data("select2-data")))}),this.setVal(b),this.triggerChange()},data:function(c,d){var f,g,e=this;return 0===arguments.length?this.selection.find(".select2-search-choice").map(function(){return a(this).data("select2-data")}).get():(g=this.data(),c||(c=[]),f=a.map(c,function(a){return e.opts.id(a)}),this.setVal(f),this.updateSelection(c),this.clearSearch(),d&&this.triggerChange(this.buildChangeDetails(g,this.data())),b)}}),a.fn.select2=function(){var d,g,h,i,j,c=Array.prototype.slice.call(arguments,0),k=["val","destroy","opened","open","close","focus","isFocused","container","dropdown","onSortStart","onSortEnd","enable","readonly","positionDropdown","data","search"],l=["val","opened","isFocused","container","data"],n={search:"externalSearch"};return this.each(function(){if(0===c.length||"object"==typeof c[0])d=0===c.length?{}:a.extend({},c[0]),d.element=a(this),"select"===d.element.get(0).tagName.toLowerCase()?j=d.element.prop("multiple"):(j=d.multiple||!1,"tags"in d&&(d.multiple=j=!0)),g=j?new f:new e,g.init(d);else{if("string"!=typeof c[0])throw"Invalid arguments to select2 plugin: "+c;if(0>m(c[0],k))throw"Unknown method: "+c[0];if(i=b,g=a(this).data("select2"),g===b)return;if(h=c[0],"container"===h?i=g.container:"dropdown"===h?i=g.dropdown:(n[h]&&(h=n[h]),i=g[h].apply(g,c.slice(1))),m(c[0],l)>=0)return!1}}),i===b?this:i},a.fn.select2.defaults={width:"copy",loadMorePadding:0,closeOnSelect:!0,openOnEnter:!0,containerCss:{},dropdownCss:{},containerCssClass:"",dropdownCssClass:"",formatResult:function(a,b,c,d){var e=[];return C(a.text,c.term,e,d),e.join("")},formatSelection:function(a,c,d){return a?d(a.text):b},sortResults:function(a){return a},formatResultCssClass:function(){return b},formatSelectionCssClass:function(){return b},formatNoMatches:function(){return"No matches found"},formatInputTooShort:function(a,b){var c=b-a.length;return"Please enter "+c+" more character"+(1==c?"":"s")},formatInputTooLong:function(a,b){var c=a.length-b;return"Please delete "+c+" character"+(1==c?"":"s")},formatSelectionTooBig:function(a){return"You can only select "+a+" item"+(1==a?"":"s")},formatLoadMore:function(){return"Loading more results..."},formatSearching:function(){return"Searching..."},minimumResultsForSearch:0,minimumInputLength:0,maximumInputLength:null,maximumSelectionSize:0,id:function(a){return a.id},matcher:function(a,b){return(""+b).toUpperCase().indexOf((""+a).toUpperCase())>=0},separator:",",tokenSeparators:[],tokenizer:K,escapeMarkup:D,blurOnChange:!1,selectOnBlur:!1,adaptContainerCssClass:function(a){return a},adaptDropdownCssClass:function(){return null}},a.fn.select2.ajaxDefaults={transport:a.ajax,params:{type:"GET",cache:!1,dataType:"json"}},window.Select2={query:{ajax:E,local:F,tags:G},util:{debounce:t,markMatch:C,escapeMarkup:D},"class":{"abstract":d,single:e,multi:f}}}}(jQuery);
/*!
 * jQuery blockUI plugin
 * Version 2.59.0-2013.04.05
 * @requires jQuery v1.7 or later
 *
 * Examples at: http://malsup.com/jquery/block/
 * Copyright (c) 2007-2013 M. Alsup
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Thanks to Amir-Hossein Sobhi for some excellent contributions!
 */

/*jshint eqeqeq:false curly:false latedef:false */
"use strict";

function setup($) {
  $.fn._fadeIn = $.fn.fadeIn;

  var noOp = $.noop || function() {};

  // this bit is to ensure we don't call setExpression when we shouldn't (with extra muscle to handle
  // retarded userAgent strings on Vista)
  var msie = /MSIE/.test(navigator.userAgent);
  var ie6  = /MSIE 6.0/.test(navigator.userAgent) && ! /MSIE 8.0/.test(navigator.userAgent);
  var mode = document.documentMode || 0;
  var setExpr = $.isFunction( document.createElement('div').style.setExpression );

  // global $ methods for blocking/unblocking the entire page
  $.blockUI   = function(opts) { install(window, opts); };
  $.unblockUI = function(opts) { remove(window, opts); };

  // convenience method for quick growl-like notifications  (http://www.google.com/search?q=growl)
  $.growlUI = function(title, message, timeout, onClose) {
    var $m = $('<div class="growlUI"></div>');
    if (title) $m.append('<h1>'+title+'</h1>');
    if (message) $m.append('<h2>'+message+'</h2>');
    if (timeout === undefined) timeout = 3000;
    $.blockUI({
      message: $m, fadeIn: 700, fadeOut: 1000, centerY: false,
      timeout: timeout, showOverlay: false,
      onUnblock: onClose,
      css: $.blockUI.defaults.growlCSS
    });
  };

  // plugin method for blocking element content
  $.fn.block = function(opts) {
    if ( this[0] === window ) {
      $.blockUI( opts );
      return this;
    }
    var fullOpts = $.extend({}, $.blockUI.defaults, opts || {});
    this.each(function() {
      var $el = $(this);
      if (fullOpts.ignoreIfBlocked && $el.data('blockUI.isBlocked'))
        return;
      $el.unblock({ fadeOut: 0 });
    });

    return this.each(function() {
      if ($.css(this,'position') == 'static') {
        this.style.position = 'relative';
        $(this).data('blockUI.static', true);
      }
      this.style.zoom = 1; // force 'hasLayout' in ie
      install(this, opts);
    });
  };

  // plugin method for unblocking element content
  $.fn.unblock = function(opts) {
    if ( this[0] === window ) {
      $.unblockUI( opts );
      return this;
    }
    return this.each(function() {
      remove(this, opts);
    });
  };

  $.blockUI.version = 2.59; // 2nd generation blocking at no extra cost!

  // override these in your code to change the default behavior and style
  $.blockUI.defaults = {
    // message displayed when blocking (use null for no message)
    message:  '<h1>Please wait...</h1>',

    title: null,		// title string; only used when theme == true
    draggable: true,	// only used when theme == true (requires jquery-ui.js to be loaded)

    theme: false, // set to true to use with jQuery UI themes

    // styles for the message when blocking; if you wish to disable
    // these and use an external stylesheet then do this in your code:
    // $.blockUI.defaults.css = {};
    css: {
      padding:	0,
      margin:		0,
      width:		'30%',
      top:		'40%',
      left:		'35%',
      textAlign:	'center',
      color:		'#000',
      border:		'3px solid #aaa',
      backgroundColor:'#fff',
      cursor:		'wait'
    },

    // minimal style set used when themes are used
    themedCSS: {
      width:	'30%',
      top:	'40%',
      left:	'35%'
    },

    // styles for the overlay
    overlayCSS:  {
      backgroundColor:	'#000',
      opacity:			0.6,
      cursor:				'wait'
    },

    // style to replace wait cursor before unblocking to correct issue
    // of lingering wait cursor
    cursorReset: 'default',

    // styles applied when using $.growlUI
    growlCSS: {
      width:		'350px',
      top:		'10px',
      left:		'',
      right:		'10px',
      border:		'none',
      padding:	'5px',
      opacity:	0.6,
      cursor:		'default',
      color:		'#fff',
      backgroundColor: '#000',
      '-webkit-border-radius':'10px',
      '-moz-border-radius':	'10px',
      'border-radius':		'10px'
    },

    // IE issues: 'about:blank' fails on HTTPS and javascript:false is s-l-o-w
    // (hat tip to Jorge H. N. de Vasconcelos)
    /*jshint scripturl:true */
    iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank',

    // force usage of iframe in non-IE browsers (handy for blocking applets)
    forceIframe: false,

    // z-index for the blocking overlay
    baseZ: 1000,

    // set these to true to have the message automatically centered
    centerX: true, // <-- only effects element blocking (page block controlled via css above)
    centerY: true,

    // allow body element to be stetched in ie6; this makes blocking look better
    // on "short" pages.  disable if you wish to prevent changes to the body height
    allowBodyStretch: true,

    // enable if you want key and mouse events to be disabled for content that is blocked
    bindEvents: true,

    // be default blockUI will supress tab navigation from leaving blocking content
    // (if bindEvents is true)
    constrainTabKey: true,

    // fadeIn time in millis; set to 0 to disable fadeIn on block
    fadeIn:  200,

    // fadeOut time in millis; set to 0 to disable fadeOut on unblock
    fadeOut:  400,

    // time in millis to wait before auto-unblocking; set to 0 to disable auto-unblock
    timeout: 0,

    // disable if you don't want to show the overlay
    showOverlay: true,

    // if true, focus will be placed in the first available input field when
    // page blocking
    focusInput: true,

    // suppresses the use of overlay styles on FF/Linux (due to performance issues with opacity)
    // no longer needed in 2012
    // applyPlatformOpacityRules: true,

    // callback method invoked when fadeIn has completed and blocking message is visible
    onBlock: null,

    // callback method invoked when unblocking has completed; the callback is
    // passed the element that has been unblocked (which is the window object for page
    // blocks) and the options that were passed to the unblock call:
    //	onUnblock(element, options)
    onUnblock: null,

    // callback method invoked when the overlay area is clicked.
    // setting this will turn the cursor to a pointer, otherwise cursor defined in overlayCss will be used.
    onOverlayClick: null,

    // don't ask; if you really must know: http://groups.google.com/group/jquery-en/browse_thread/thread/36640a8730503595/2f6a79a77a78e493#2f6a79a77a78e493
    quirksmodeOffsetHack: 4,

    // class name of the message block
    blockMsgClass: 'blockMsg',

    // if it is already blocked, then ignore it (don't unblock and reblock)
    ignoreIfBlocked: false
  };

  // private data and functions follow...

  var pageBlock = null;
  var pageBlockEls = [];

  function install(el, opts) {
    var css, themedCSS;
    var full = (el == window);
    var msg = (opts && opts.message !== undefined ? opts.message : undefined);
    opts = $.extend({}, $.blockUI.defaults, opts || {});

    if (opts.ignoreIfBlocked && $(el).data('blockUI.isBlocked'))
      return;

    opts.overlayCSS = $.extend({}, $.blockUI.defaults.overlayCSS, opts.overlayCSS || {});
    css = $.extend({}, $.blockUI.defaults.css, opts.css || {});
    if (opts.onOverlayClick)
      opts.overlayCSS.cursor = 'pointer';

    themedCSS = $.extend({}, $.blockUI.defaults.themedCSS, opts.themedCSS || {});
    msg = msg === undefined ? opts.message : msg;

    // remove the current block (if there is one)
    if (full && pageBlock)
      remove(window, {fadeOut:0});

    // if an existing element is being used as the blocking content then we capture
    // its current place in the DOM (and current display style) so we can restore
    // it when we unblock
    if (msg && typeof msg != 'string' && (msg.parentNode || msg.jquery)) {
      var node = msg.jquery ? msg[0] : msg;
      var data = {};
      $(el).data('blockUI.history', data);
      data.el = node;
      data.parent = node.parentNode;
      data.display = node.style.display;
      data.position = node.style.position;
      if (data.parent)
        data.parent.removeChild(node);
    }

    $(el).data('blockUI.onUnblock', opts.onUnblock);
    var z = opts.baseZ;

    // blockUI uses 3 layers for blocking, for simplicity they are all used on every platform;
    // layer1 is the iframe layer which is used to supress bleed through of underlying content
    // layer2 is the overlay layer which has opacity and a wait cursor (by default)
    // layer3 is the message content that is displayed while blocking
    var lyr1, lyr2, lyr3, s;
    if (msie || opts.forceIframe)
      lyr1 = $('<iframe class="blockUI" style="z-index:'+ (z++) +';display:none;border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="'+opts.iframeSrc+'"></iframe>');
    else
      lyr1 = $('<div class="blockUI" style="display:none"></div>');

    if (opts.theme)
      lyr2 = $('<div class="blockUI blockOverlay ui-widget-overlay" style="z-index:'+ (z++) +';display:none"></div>');
    else
      lyr2 = $('<div class="blockUI blockOverlay" style="z-index:'+ (z++) +';display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"></div>');

    if (opts.theme && full) {
      s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage ui-dialog ui-widget ui-corner-all" style="z-index:'+(z+10)+';display:none;position:fixed">';
      if ( opts.title ) {
        s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(opts.title || '&nbsp;')+'</div>';
      }
      s += '<div class="ui-widget-content ui-dialog-content"></div>';
      s += '</div>';
    }
    else if (opts.theme) {
      s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement ui-dialog ui-widget ui-corner-all" style="z-index:'+(z+10)+';display:none;position:absolute">';
      if ( opts.title ) {
        s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(opts.title || '&nbsp;')+'</div>';
      }
      s += '<div class="ui-widget-content ui-dialog-content"></div>';
      s += '</div>';
    }
    else if (full) {
      s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage" style="z-index:'+(z+10)+';display:none;position:fixed"></div>';
    }
    else {
      s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement" style="z-index:'+(z+10)+';display:none;position:absolute"></div>';
    }
    lyr3 = $(s);

    // if we have a message, style it
    if (msg) {
      if (opts.theme) {
        lyr3.css(themedCSS);
        lyr3.addClass('ui-widget-content');
      }
      else
        lyr3.css(css);
    }

    // style the overlay
    if (!opts.theme /*&& (!opts.applyPlatformOpacityRules)*/)
      lyr2.css(opts.overlayCSS);
    lyr2.css('position', full ? 'fixed' : 'absolute');

    // make iframe layer transparent in IE
    if (msie || opts.forceIframe)
      lyr1.css('opacity',0.0);

    //$([lyr1[0],lyr2[0],lyr3[0]]).appendTo(full ? 'body' : el);
    var layers = [lyr1,lyr2,lyr3], $par = full ? $('body') : $(el);
    $.each(layers, function() {
      this.appendTo($par);
    });

    if (opts.theme && opts.draggable && $.fn.draggable) {
      lyr3.draggable({
        handle: '.ui-dialog-titlebar',
        cancel: 'li'
      });
    }

    // ie7 must use absolute positioning in quirks mode and to account for activex issues (when scrolling)
    var expr = setExpr && (!$.support.boxModel || $('object,embed', full ? null : el).length > 0);
    if (ie6 || expr) {
      // give body 100% height
      if (full && opts.allowBodyStretch && $.support.boxModel)
        $('html,body').css('height','100%');

      // fix ie6 issue when blocked element has a border width
      if ((ie6 || !$.support.boxModel) && !full) {
        var t = sz(el,'borderTopWidth'), l = sz(el,'borderLeftWidth');
        var fixT = t ? '(0 - '+t+')' : 0;
        var fixL = l ? '(0 - '+l+')' : 0;
      }

      // simulate fixed position
      $.each(layers, function(i,o) {
        var s = o[0].style;
        s.position = 'absolute';
        if (i < 2) {
          if (full)
            s.setExpression('height','Math.max(document.body.scrollHeight, document.body.offsetHeight) - (jQuery.support.boxModel?0:'+opts.quirksmodeOffsetHack+') + "px"');
          else
            s.setExpression('height','this.parentNode.offsetHeight + "px"');
          if (full)
            s.setExpression('width','jQuery.support.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"');
          else
            s.setExpression('width','this.parentNode.offsetWidth + "px"');
          if (fixL) s.setExpression('left', fixL);
          if (fixT) s.setExpression('top', fixT);
        }
        else if (opts.centerY) {
          if (full) s.setExpression('top','(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"');
          s.marginTop = 0;
        }
        else if (!opts.centerY && full) {
          var top = (opts.css && opts.css.top) ? parseInt(opts.css.top, 10) : 0;
          var expression = '((document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + '+top+') + "px"';
          s.setExpression('top',expression);
        }
      });
    }

    // show the message
    if (msg) {
      if (opts.theme)
        lyr3.find('.ui-widget-content').append(msg);
      else
        lyr3.append(msg);
      if (msg.jquery || msg.nodeType)
        $(msg).show();
    }

    if ((msie || opts.forceIframe) && opts.showOverlay)
      lyr1.show(); // opacity is zero
    if (opts.fadeIn) {
      var cb = opts.onBlock ? opts.onBlock : noOp;
      var cb1 = (opts.showOverlay && !msg) ? cb : noOp;
      var cb2 = msg ? cb : noOp;
      if (opts.showOverlay)
        lyr2._fadeIn(opts.fadeIn, cb1);
      if (msg)
        lyr3._fadeIn(opts.fadeIn, cb2);
    }
    else {
      if (opts.showOverlay)
        lyr2.show();
      if (msg)
        lyr3.show();
      if (opts.onBlock)
        opts.onBlock();
    }

    // bind key and mouse events
    bind(1, el, opts);

    if (full) {
      pageBlock = lyr3[0];
      pageBlockEls = $(':input:enabled:visible',pageBlock);
      if (opts.focusInput)
        setTimeout(focus, 20);
    }
    else
      center(lyr3[0], opts.centerX, opts.centerY);

    if (opts.timeout) {
      // auto-unblock
      var to = setTimeout(function() {
        if (full)
          $.unblockUI(opts);
        else
          $(el).unblock(opts);
      }, opts.timeout);
      $(el).data('blockUI.timeout', to);
    }
  }

  // remove the block
  function remove(el, opts) {
    var count;
    var full = (el == window);
    var $el = $(el);
    var data = $el.data('blockUI.history');
    var to = $el.data('blockUI.timeout');
    if (to) {
      clearTimeout(to);
      $el.removeData('blockUI.timeout');
    }
    opts = $.extend({}, $.blockUI.defaults, opts || {});
    bind(0, el, opts); // unbind events

    if (opts.onUnblock === null) {
      opts.onUnblock = $el.data('blockUI.onUnblock');
      $el.removeData('blockUI.onUnblock');
    }

    var els;
    if (full) // crazy selector to handle odd field errors in ie6/7
      els = $('body').children().filter('.blockUI').add('body > .blockUI');
    else
      els = $el.find('>.blockUI');

    // fix cursor issue
    if ( opts.cursorReset ) {
      if ( els.length > 1 )
        els[1].style.cursor = opts.cursorReset;
      if ( els.length > 2 )
        els[2].style.cursor = opts.cursorReset;
    }

    if (full)
      pageBlock = pageBlockEls = null;

    if (opts.fadeOut) {
      count = els.length;
      els.fadeOut(opts.fadeOut, function() {
        if ( --count === 0)
          reset(els,data,opts,el);
      });
    }
    else
      reset(els, data, opts, el);
  }

  // move blocking element back into the DOM where it started
  function reset(els,data,opts,el) {
    var $el = $(el);
    els.each(function(i,o) {
      // remove via DOM calls so we don't lose event handlers
      if (this.parentNode)
        this.parentNode.removeChild(this);
    });

    if (data && data.el) {
      data.el.style.display = data.display;
      data.el.style.position = data.position;
      if (data.parent)
        data.parent.appendChild(data.el);
      $el.removeData('blockUI.history');
    }

    if ($el.data('blockUI.static')) {
      $el.css('position', 'static'); // #22
    }

    if (typeof opts.onUnblock == 'function')
      opts.onUnblock(el,opts);

    // fix issue in Safari 6 where block artifacts remain until reflow
    var body = $(document.body), w = body.width(), cssW = body[0].style.width;
    body.width(w-1).width(w);
    body[0].style.width = cssW;
  }

  // bind/unbind the handler
  function bind(b, el, opts) {
    var full = el == window, $el = $(el);

    // don't bother unbinding if there is nothing to unbind
    if (!b && (full && !pageBlock || !full && !$el.data('blockUI.isBlocked')))
      return;

    $el.data('blockUI.isBlocked', b);

    // don't bind events when overlay is not in use or if bindEvents is false
    if (!full || !opts.bindEvents || (b && !opts.showOverlay))
      return;

    // bind anchors and inputs for mouse and key events
    var events = 'mousedown mouseup keydown keypress keyup touchstart touchend touchmove';
    if (b)
      $(document).bind(events, opts, handler);
    else
      $(document).unbind(events, handler);

  // former impl...
  //		var $e = $('a,:input');
  //		b ? $e.bind(events, opts, handler) : $e.unbind(events, handler);
  }

  // event handler to suppress keyboard/mouse events when blocking
  function handler(e) {
    // allow tab navigation (conditionally)
    if (e.keyCode && e.keyCode == 9) {
      if (pageBlock && e.data.constrainTabKey) {
        var els = pageBlockEls;
        var fwd = !e.shiftKey && e.target === els[els.length-1];
        var back = e.shiftKey && e.target === els[0];
        if (fwd || back) {
          setTimeout(function(){focus(back);},10);
          return false;
        }
      }
    }
    var opts = e.data;
    var target = $(e.target);
    if (target.hasClass('blockOverlay') && opts.onOverlayClick)
      opts.onOverlayClick();

    // allow events within the message content
    if (target.parents('div.' + opts.blockMsgClass).length > 0)
      return true;

    // allow events for content that is not being blocked
    return target.parents().children().filter('div.blockUI').length === 0;
  }

  function focus(back) {
    if (!pageBlockEls)
      return;
    var e = pageBlockEls[back===true ? pageBlockEls.length-1 : 0];
    if (e)
      e.focus();
  }

  function center(el, x, y) {
    var p = el.parentNode, s = el.style;
    var l = ((p.offsetWidth - el.offsetWidth)/2) - sz(p,'borderLeftWidth');
    var t = ((p.offsetHeight - el.offsetHeight)/2) - sz(p,'borderTopWidth');
    if (x) s.left = l > 0 ? (l+'px') : '0';
    if (y) s.top  = t > 0 ? (t+'px') : '0';
  }

  function sz(el, p) {
    return parseInt($.css(el,p),10)||0;
  }

}

(function($){
  $(document).ready(function(){
    /*global define:true */
    if (typeof define === 'function' && define.amd && define.amd.jQuery) {
      define(['jquery'], setup);
    } else {
      setup($);
    }
  });
})(jQuery);

/**
 * jQuery Cookie plugin
 *
 * Copyright © 2010 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */
jQuery.cookie=function(key,value,options){if(arguments.length>1&&String(value)!=="[object Object]"){options=jQuery.extend({},options);if(value===null||value===undefined){options.expires=-1;}
if(typeof options.expires==='number'){var days=options.expires,t=options.expires=new Date();t.setDate(t.getDate()+days);}
value=String(value);return(document.cookie=[encodeURIComponent(key),'=',options.raw?value:encodeURIComponent(value),options.expires?'; expires='+options.expires.toUTCString():'',options.path?'; path='+options.path:'',options.domain?'; domain='+options.domain:'',options.secure?'; secure':''].join(''));}
options=value||{};var result,decode=options.raw?function(s){return s;}:decodeURIComponent;return(result=new RegExp('(?:^|; )'+encodeURIComponent(key)+'=([^;]*)').exec(document.cookie))?decode(result[1]):null;};

/**
 * Spoofs placeholders in browsers that don't support them (eg Firefox 3)
 *
 * Copyright 2011 Dan Bentley
 * Licensed under the Apache License 2.0
 *
 * Author: Dan Bentley [github.com/danbentley]
 */
(function($){if("placeholder"in document.createElement("input"))return;$(document).ready(function(){$(':input[placeholder]').each(function(){setupPlaceholder($(this));});$('form').submit(function(e){clearPlaceholdersBeforeSubmit($(this));});});function setupPlaceholder(input){var placeholderText=input.attr('placeholder');if(input.val()==='')input.val(placeholderText);input.bind({focus:function(e){if(input.val()===placeholderText)input.val('');},blur:function(e){if(input.val()==='')input.val(placeholderText);}});}
function clearPlaceholdersBeforeSubmit(form){form.find(':input[placeholder]').each(function(){var el=$(this);if(el.val()===el.attr('placeholder'))el.val('');});}})(jQuery);

if( jQuery.isFunction(jQuery.fn.sortable) ){
/* Modifided script from the simple-page-ordering plugin */
jQuery(document).ready(function($){$('table.widefat.wp-list-table tbody th, table.widefat tbody td').css('cursor','move');$("table.widefat.wp-list-table tbody").sortable({items:'tr:not(.inline-edit-row)',cursor:'move',axis:'y',containment:'table.widefat',placeholder:'product-cat-placeholder',scrollSensitivity:40,helper:function(e,ui){ui.children().each(function(){jQuery(this).width(jQuery(this).width());});return ui;},start:function(event,ui){if(!ui.item.hasClass('alternate'))ui.item.css('background-color','#ffffff');ui.item.children('td,th').css('border-bottom-width','0');ui.item.css('outline','1px solid #aaa');},stop:function(event,ui){ui.item.removeAttr('style');ui.item.children('td,th').css('border-bottom-width','1px');},update:function(event,ui){var termid=ui.item.find('.check-column input').val();var termparent=ui.item.find('.parent').html();var prevtermid=ui.item.prev().find('.check-column input').val();var nexttermid=ui.item.next().find('.check-column input').val();var prevtermparent=undefined;if(prevtermid!=undefined){var prevtermparent=ui.item.prev().find('.parent').html();if(prevtermparent!=termparent)prevtermid=undefined;}
var nexttermparent=undefined;if(nexttermid!=undefined){nexttermparent=ui.item.next().find('.parent').html();if(nexttermparent!=termparent)nexttermid=undefined;}
if((prevtermid==undefined&&nexttermid==undefined)||(nexttermid==undefined&&nexttermparent==prevtermid)||(nexttermid!=undefined&&prevtermparent==termid)){$("table.widefat tbody").sortable('cancel');return;}
ui.item.find('.check-column input').hide().after('<img alt="processing" src="images/wpspin_light.gif" class="waiting" style="margin-left: 6px;" />');$.post(ajaxurl,{action:'jigoshop-categories-ordering',id:termid,nextid:nexttermid},function(response){if(response=='children')window.location.reload();else{ui.item.find('.check-column input').show().siblings('img').remove();}});$('table.widefat tbody tr').each(function(){var i=jQuery('table.widefat tbody tr').index(this);if(i%2==0)jQuery(this).addClass('alternate');else jQuery(this).removeClass('alternate');});}});});
}
/*
	glDatePicker v1.3 - http://code.gautamlad.com/glDatePicker/
	Compiled using Google Closure Compiler - http://closure-compiler.appspot.com/home
*/
(function(c){var r={calId:0,cssName:"default",startDate:-1,endDate:-1,selectedDate:-1,showPrevNext:!0,allowOld:!0,showAlways:!1,position:"absolute"},j={init:function(a){return this.each(function(){var b=c(this),e=c.extend({},r);e.calId=b[0].id+"-gldp";a&&(e=c.extend(e,a));b.data("settings",e);b.click(j.show).focus(j.show);e.showAlways&&setTimeout(function(){b.trigger("focus")},50);c(document).bind("click",function(){j.hide.apply(b)})})},show:function(a){a.stopPropagation();j.hide.apply(c("._gldp").not(c(this)));
j.update.apply(c(this))},hide:function(){if(c(this).length){var a=c(this).data("settings");a.showAlways||(c("#"+a.calId).slideUp(200),c(this).removeClass("_gldp"))}},setStartDate:function(a){c(this).data("settings").startDate=a},setEndDate:function(a){c(this).data("settings").endDate=a},setSelectedDate:function(a){c(this).data("settings").selectedDate=a},update:function(){var a=c(this),b=a.data("settings"),e=b.calId,d=b.startDate;-1==b.startDate&&(d=new Date,d.setDate(1));d.setHours(0,0,0,0);var k=
d.getTime(),f=new Date(0);-1!=b.endDate&&(f=new Date(b.endDate),/^\d+$/.test(b.endDate)&&(f=new Date(d),f.setDate(f.getDate()+b.endDate)));f.setHours(0,0,0,0);var f=f.getTime(),h=new Date(0);-1!=b.selectedDate&&(h=new Date(b.selectedDate),/^\d+$/.test(b.selectedDate)&&(h=new Date(d),h.setDate(h.getDate()+b.selectedDate)));h.setHours(0,0,0,0);var h=h.getTime(),i=a.data("theDate"),i=-1==i||"undefined"==typeof i?d:i,m=new Date(i);m.setDate(1);var r=m.getTime(),d=new Date(m);d.setMonth(d.getMonth()+1);
d.setDate(0);var w=d.getTime(),t=d.getDate(),n=new Date(m);n.setDate(0);n=n.getDate();a.data("theDate",i);for(var d="",u=0,v=0;6>u;u++){for(var s="",q=0;7>q;q++,v++){var o=n-m.getDay()+v+1,p=o-n,g=0==q?"sun":6==q?"sat":"day";if(1<=p&&p<=t){o=new Date;o.setHours(0,0,0,0);var l=new Date(i);l.setHours(0,0,0,0);l.setDate(p);l=l.getTime();g=o.getTime()==l?"today":g;b.allowOld||(g=l<k?"noday":g);-1!=b.endDate&&(g=l>f?"noday":g);-1!=b.selectedDate&&(g=l==h?"selected":g)}else g="noday",p=0>=p?o:o-t-n;s+=
"<td class='gldp-days "+g+" **-"+g+"'><div class='"+g+"'>"+p+"</div></td>"}d+="<tr class='days'>"+s+"</tr>"}h=k<r||b.allowOld;k=w<f||f<k;b.showPrevNext||(h=k=!1);f="January,February,March,April,May,June,July,August,September,October,November,December".split(",")[i.getMonth()]+" "+i.getFullYear();k=("<div class='**'><table><tr>"+("<td class='**-prevnext prev'>"+(h?"\u25c4":"")+"</td>")+"<td class='**-monyear' colspan='5'>{MY}</td>"+("<td class='**-prevnext next'>"+(k?"\u25ba":"")+"</td>")+"</tr><tr class='**-dow'><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td></tr>"+
d+"</table></div>").replace(/\*{2}/gi,"gldp-"+b.cssName).replace(/\{MY\}/gi,f);0==c("#"+e).length&&a.after(c("<div id='"+e+"'></div>").css({"z-index":b.zIndex}));e=c("#"+e);e.html(k).slideDown(200);a.addClass("_gldp");c("[class*=-prevnext]",e).click(function(b){b.stopPropagation();if(""!=c(this).html()){var b=c(this).hasClass("prev")?-1:1,d=new Date(m);d.setMonth(i.getMonth()+b);a.data("theDate",d);j.update.apply(a)}});
c("tr.days td:not(.noday, .selected)",e).mouseenter(function(){var a="gldp-"+b.cssName+"-"+c(this).children("div").attr("class");c(this).removeClass(a).addClass(a+"-hover")}).mouseleave(function(){if(!c(this).hasClass("selected")){var a="gldp-"+b.cssName+"-"+c(this).children("div").attr("class");c(this).removeClass(a+"-hover").addClass(a)}}).click(function(b){b.stopPropagation();var b=c(this).children("div").html(),d=a.data("settings"),e=new Date(i);e.setDate(b);a.data("theDate",e);a.val(e.getMonth()+
1+"/"+e.getDate()+"/"+e.getFullYear());if(null!=d.onChange&&"undefined"!=typeof d.onChange)d.onChange(a,e);d.selectedDate=e;j.hide.apply(a)})}};c.fn.glDatePicker=function(a){if(j[a])return j[a].apply(this,Array.prototype.slice.call(arguments,1));if("object"===typeof a||!a)return j.init.apply(this,arguments);c.error("Method "+a+" does not exist on jQuery.glDatePicker")}})(jQuery);
(function($){
	$(document).ready(function(){
		// Set calendar widgets
		jigoshop_order_export_calendar_format($('#jigoshop-order-export-start-date'), new Date());
		jigoshop_order_export_calendar_format($('#jigoshop-order-export-end-date'), new Date());
		jigoshop_order_export_enable_calendar();
	});
})(jQuery);

function jigoshop_order_export_calendar_format(target, date){
	var d = date.getDate();
	var m = date.getMonth()+1;
	var y = date.getFullYear();
	target.val((d <= 9?'0'+d:d)+'-'+(m <=9 ?'0'+m:m)+'-'+y); // Formats as dd-MM-yyyy
}

function jigoshop_order_export_enable_calendar(){
	var $start = jQuery('#jigoshop-order-export-start-date');
	var $end = jQuery('#jigoshop-order-export-end-date');
	$start.removeAttr('disabled');
	$start.glDatePicker({
		allowOld: false,
		endDate: new Date(),
		onChange: jigoshop_order_export_calendar_format
	});
	$end.removeAttr('disabled');
	$end.glDatePicker({
		allowOld: false,
		endDate: new Date(),
		onChange: jigoshop_order_export_calendar_format
	});
}
