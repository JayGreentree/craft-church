!function(t){t.add("plugin","textdirection",{translations:{en:{"change-text-direction":"RTL-LTR","left-to-right":"Left to Right","right-to-left":"Right to Left"}},init:function(t){this.app=t,this.lang=t.lang,this.block=t.block,this.editor=t.editor,this.toolbar=t.toolbar,this.selection=t.selection},start:function(){var t={};t.ltr={title:this.lang.get("left-to-right"),api:"plugin.textdirection.set",args:"ltr"},t.rtl={title:this.lang.get("right-to-left"),api:"plugin.textdirection.set",args:"rtl"};var i=this.toolbar.addButton("textdirection",{title:this.lang.get("change-text-direction")});i.setIcon('<i class="re-icon-textdirection"></i>'),i.setDropdown(t)},set:function(i){var e=this.selection.getBlock();if(e&&"LI"===e.tagName){var o=t.dom(e).parents("ul, ol",this.editor.getElement()).last();this.block.add({attr:{dir:i}},!1,o)}else this.block.add({attr:{dir:i}})}})}(Redactor);