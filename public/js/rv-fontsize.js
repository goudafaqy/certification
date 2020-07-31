/*
 *  Project: RV Font Size jQuery Plugin
 *  Description: An easy and flexible jquery plugin to give font size accessibility control.
 *  URL: https://github.com/ramonvictor/rv-jquery-fontsize/
 *  Author: Ramon Victor (https://github.com/ramonvictor/)
 *  License: Licensed under the MIT license:
 *  http://www.opensource.org/licenses/mit-license.php
 *  Any and all use of this script must be accompanied by this copyright/license notice in its present form.
 */
(function(e,d,a,g){var b="rvFontsize",f={targetSection:"body",store:false,storeIsDefined:!(typeof store==="undefined"),variations:7,controllers:{append:true,appendTo:"body",showResetButton:false,template:""}};function c(j,i){var h=this;h.element=j;h.options=e.extend({},f,i);h._defaults=f;h._name=b;h.init()}c.prototype={init:function(){var h=this,i=function(){h.defineElements();h.getDefaultFontSize()};i();if(h.options.store===true&&!(h.options.storeIsDefined)){h.dependencyWarning()}},dependencyWarning:function(){console.warn('When you difine "store: true", store script is required (https://github.com/ramonvictor/rv-jquery-fontsize/blob/master/js/store.min.js)')},bindControlerHandlers:function(){var h=this;h.$decreaseButton=e(".rvfs-decrease");if(h.$decreaseButton.length>0){h.$decreaseButton.on("click",function(j){j.preventDefault();var i=e(this);if(!i.hasClass("disabled")){var k=h.getCurrentVariation();if(k>1){h.$target.removeClass("rvfs-"+k);h.$target.attr("data-rvfs",k-1);if(h.options.store===true){h.storeCurrentSize()}h.fontsizeChanged()}}})}h.$increaseButton=e(".rvfs-increase");if(h.$increaseButton.length>0){h.$increaseButton.on("click",function(j){j.preventDefault();var i=e(this);if(!i.hasClass("disabled")){var k=h.getCurrentVariation();if(k<h.options.variations){h.$target.removeClass("rvfs-"+k);h.$target.attr("data-rvfs",k+1);if(h.options.store===true){h.storeCurrentSize()}h.fontsizeChanged()}}})}h.$resetButton=e(".rvfs-reset");if(h.$resetButton.length>0){h.$resetButton.on("click",function(j){j.preventDefault();var i=e(this);if(!i.hasClass("disabled")){var k=h.getCurrentVariation();h.$target.removeClass("rvfs-"+k);h.$target.attr("data-rvfs",h.defaultFontsize);if(h.options.store===true){h.storeCurrentSize()}h.fontsizeChanged()}})}},defineElements:function(){var h=this;h.$target=e(h.options.targetSection);if(h.options.controllers.append!==false){var i=h.options.controllers.showResetButton?'<a href="#" class="rvfs-reset btn" title="Default font size">A</a>':"";var k=h.options.controllers.template,j="";h.$appendTo=e(h.options.controllers.appendTo);if(e.trim(k).length>0){j=k}else{j='<div class="btn-group"><a href="#" class="rvfs-decrease btn" title="Decrease font size">A-</a></li>'+i+'<a href="#" class="rvfs-increase btn" title="Increase font size">A+</a></li></div>'}h.$appendTo.html(j);h.bindControlerHandlers()}},getDefaultFontSize:function(){var h=this,i=h.options.variations;h.defaultFontsize=0;if(i%2===0){h.defaultFontsize=(i/2)+1}else{h.defaultFontsize=parseInt((i/2)+1,10)}h.setDefaultFontSize()},setDefaultFontSize:function(){var h=this;if(h.options.store===true&&h.options.storeIsDefined){var i=store.get("rvfs")||h.defaultFontsize;h.$target.attr("data-rvfs",i)}else{h.$target.attr("data-rvfs",h.defaultFontsize)}h.fontsizeChanged()},storeCurrentSize:function(){var h=this;if(h.options.storeIsDefined){store.set("rvfs",h.$target.attr("data-rvfs"))}else{h.dependencyWarning()}},getCurrentVariation:function(){return parseInt(this.$target.attr("data-rvfs"),10)},fontsizeChanged:function(){var h=this,i=h.getCurrentVariation();h.$target.addClass("rvfs-"+i);if(i===h.defaultFontsize){h.$resetButton.addClass("disabled")}else{h.$resetButton.removeClass("disabled")}if(i===h.options.variations){h.$increaseButton.addClass("disabled")}else{h.$increaseButton.removeClass("disabled")}if(i===1){h.$decreaseButton.addClass("disabled")}else{h.$decreaseButton.removeClass("disabled")}}};e.fn[b]=function(i){var h=this;return h.each(function(){if(!e.data(h,"plugin_"+b)){e.data(h,"plugin_"+b,new c(h,i))}})};e[b]=function(){var h=e(d);return h.rvFontsize.apply(h,Array.prototype.slice.call(arguments,0))}})(jQuery,window,document);

