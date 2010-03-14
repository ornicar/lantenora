/*
 * jQuery UI Autocomplete @VERSION
 *
 * Copyright (c) 2009 AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * http://docs.jquery.com/UI/Autocomplete
 *
 * Depends:
 *  jquery.ui.core.js
 */
(function($) {

$.widget("ui.autocomplete", {
  _init: function() {
    var self = this;
    this.element.attr("autocomplete", "off")
    // TODO verify these actually work as intended
    .attr("role", "textbox").attr("aria-autocomplete", "list").attr("aria-haspopup", "true")
    // keyup is triggered only once when hold down, keypress multiple times
    .keypress(function(event) {
      switch(event.keyCode) {
      case $.ui.keyCode.UP:
        self.focusUp();
        break;
      case $.ui.keyCode.DOWN:
        self.focusDown();
        break;
      case $.ui.keyCode.ENTER:
        self.select();
        break;
      case $.ui.keyCode.TAB:
        self.select();
        break;
      case $.ui.keyCode.ESCAPE:
        self.close();
        break;
      default:
        // keypress is triggered before the input value is changed
        clearTimeout(self.searching);
        self.searching = setTimeout(function() {
          self.search(event);
        }, self.options.delay);
        break;
      }
    }).focus(function() {
      self.previous = self.element.val();
    }).blur(function() {
      clearTimeout(self.searching);
      // clicks on the menu (or a button to trigger a search) will cause a blur event
      // TODO try to implement this without a timeout, see clearTimeout in search()
      self.closing = setTimeout(function() {
        // TODO pass {data: item} when a valid value is selected, even when the suggestionlist wasn't used
        self.close();
      }, 150);
    });
    this.initSource();
  },
  
  // TODO call when source-option is updated
  initSource: function() {
    if ($.isArray(this.options.source)) {
      var array = this.options.source;
      this.source = function(request, response) {
        var matcher = new RegExp(request.term, "i");
        return $.grep(array, function(value) {
            return matcher.test(value)
        });
      }
    } else if (typeof this.options.source == "string") {
      var url = this.options.source;
      this.source = function(request, response) {
        $.getJSON(url, request, response);
      }
    } else {
      this.source = this.options.source;
    }
  },
  
  search: function() {
    var self = this;
    clearTimeout(self.closing);
    var value = this.element.val();
    if (value.length >= this.options.minLength) {
      if (this._trigger("search") === false)
        return;
      function response(content) {
        if (content.length) {
          self._trigger("open");
          self.suggest(content);
        } else {
          self.close();
        }
      }
      // source can call response or return content directly
      var result = this.source({ term: value }, response);
      if (result) {
        response(result);
      }
    }
  },
  
  close: function(selected) {
    clearTimeout(this.closing);
    if (this.menu) {
      this._trigger("close");
      this.menu.remove();
      this.menu = null;
    }
    if (this.previous != this.element.val()) {
      this._trigger("change", null, selected);
    }
  },
  
  normalize: function(items) {
    // TODO consider optimization: if first item has the right format, assume all others have it as well
    return $.map(items, function(item) {
      if (typeof item == "string") {
        return {
          label: item,
          result: item
        };
      }
      return $.extend({
        label: item.label || item.result,
        result: item.result || item.label
      }, item);
    })
  },
  
  suggest: function(items) {
    items = this.normalize(items);
    this.menu && this.menu.remove();
    var self = this;
    var ul = this.menu = $("<ul/>"); 
    $.each(items, function(index, item) { 
      $("<li/>").data("item.autocomplete", item).append("<a>" + item.label + "</a>").appendTo(ul); 
    }); 
    ul.css({
      position: "absolute"
    }).appendTo(document.body).menu({ 
      focus: function(event, ui) {
        self._trigger("focus", null, { item: ui.item.data("item.autocomplete") });
        // TODO update input value and revert back to the input when focus "moves back" to the input
      },
      selected: function(event, ui) {
        var data = ui.item.data("item.autocomplete");
        self.element.val( data.result );
        self.close({ item: data });
        // prevent the blur handler from triggering another change event
        self.previous = data.result;
        // TODO only trigger when focus was lost?
        self.element.focus();
      } 
    }).position({ 
      my: "left top", 
      at: "left bottom", 
      of: this.element 
    });
  },
  
  focusUp: function() {
    if (!this.menu) {
      this.search();
      return;
    }
    this.menu.menu("previous");
  },
  
  focusDown: function() {
    if (!this.menu) {
      this.search();
      return;
    }
    this.menu.menu("next");
  },
  
  select: function() {
    if (!this.menu)
      return;
    this.menu.menu("select");
  }
});

$.ui.autocomplete.defaults = {
  minLength: 1,
  delay: 300
}

})(jQuery);