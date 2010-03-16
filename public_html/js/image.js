(function($)
{
  $.widget('ui.image', {
  
    timeout: null,
    
    _init: function()
    {
      var self = this;
      
      self.options = $.extend(self.options, self.element.metadata());
      
      self.$wrap = $('#full_image');
      
      self.$img = $('img.full_image', self.$wrap);
      
      this.prevNext();

      this.hotkeys();
      
      if (self.$img[0].complete) 
      {
        self.element.image('imgLoaded');
      }
      else 
      {
        self.$img.load(function() {self.element.image('imgLoaded');});
      }
    },

    hotkeys: function()
    {
      var self = this;

      $(document)
      .bindKey('esc', function() {
        self.loading();
        location.href = $('#image_back').attr('href');
        return false;
      })
      .bindKey('left', function() {
        self.loading();
        location.href = $('#prev_image').attr('href');
        return false;
      })
      .bindKey('right', function() {
        self.loading();
        location.href = $('#next_image').attr('href');
        return false;
      })
      .bindKey('space', function() {
        $('#image_play').trigger('click');
        return false;
      });

      $('input, textarea').one('focus', function() {
        $(document).unbindKey('space');
      });
    },
    
    imgLoaded: function()
    {
      var self = this;
      self.diapo();
      if (self.options.preload_url) 
      {
        $('<img>').attr('src', self.options.preload_url);
      }
      $('<img>').attr('src', $.dm.ctrl.options.relative_url_root+'/theme/images/load.gif');
    },
    
    diapo: function()
    {
      if (!$('#image_play').length) 
      {
        return;
      }
      
      var self = this;
      var state = self.element.hasClass('diapo');
      
      if (state) 
      {
        self.timeout = setTimeout(function()
        {
          self.loading();
          location.href = $('#next_image').attr('href') + '?diapo=1';
        }, self.options.diapo_delay);
        $('#image_play').stop().animate({
          'backgroundPosition': '+48px -48px'
        }, {
          duration: self.options.diapo_delay
        });
      }
      else 
      {
        clearTimeout(self.timeout);
        $('#image_play').stop().animate({
          'backgroundPosition': '+0px +0px'
        }, {
          duration: 500
        });
      }
      
      $('#image_play').attr('title', (state ? 'Arrêter' : 'Démarrer') + ' le diaporama').rebind('click', function()
      {
        self.element[(self.element.hasClass('diapo') ? 'remove' : 'add') + 'Class']('diapo');
        self.diapo();
        return false;
      });
    },
    
    loading: function()
    {
      clearTimeout(this.timeout);
      $('<div>')
      .attr('id', 'full_screen_loading')
      .appendTo($('body'))
      .width($(window).width())
      .height($(window).height());
    },

    prevNext: function()
    {
      var self = this;

      $('#prev_image, #next_image').hover(function()
      {
        $(this).stop(false, true).fadeTo(200, 1);
      }, function()
      {
        $(this).stop(false, true).fadeTo(300, 0.1);
      });

      $('#prev_image, #next_image, #image_back').click(function() {
        self.element.image('loading');
      });
    },
    
    resize: function(toSize)
    {
      var self = this;
      
      imgSize = [self.$img.width(), self.$img.height()];
      size = [];
      
      ratio1 = imgSize[0] / toSize[0];
      ratio2 = imgSize[1] / toSize[1];
      
      if (ratio1 > ratio2) 
      {
        size[0] = Math.round(toSize[0]);
        size[1] = Math.round(imgSize[1] / ratio1);
      }
      else 
      {
        size[1] = Math.round(toSize[1]);
        size[0] = Math.round(imgSize[0] / ratio2);
      }
      
      if (self.$img.width() != size[0]) 
      {
        self.$img.width(size[0]);
      }
      if (self.$img.height() != size[1]) 
      {
        self.$img.height(size[1]);
      }
      
      self.$wrap.width(size[0]).height(size[1]);
      
      $('#prev_image, #next_image').css('margin-top', size[1]/2 - 64).show();
    }
  });
  
  $.extend($.ui.image, {
    getter: "resize imgLoaded loading"
  });
  
})(jQuery);
