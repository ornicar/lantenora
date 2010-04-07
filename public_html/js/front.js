(function($)
{

  $.extend({
    getUrlVars: function()
    {
      var vars = [], hash;
      var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
      for (var i = 0; i < hashes.length; i++) 
      {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
      }
      return vars;
    },
    getUrlVar: function(name)
    {
      return $.getUrlVars()[name];
    }
  });

  if ($elems = $('div.image li.medium_image').orNot())
  {
    //move the image in pixel
    var move = 5, width = 160, height = 160, zoomWidth = 170, zoomHeight = 170;

    $elems.find('a').attr('title', null);

    $elems.hover(function()
    {
      //Move and zoom the image
      $(this).find('img').stop(false, true).animate({
        'width': zoomWidth,
        'height': zoomHeight,
        'top': -move,
        'left': -move
      }, {
        duration: 200
      });

      //Display the caption
      $(this).find('div.caption').stop(false, true).fadeIn(200);
    }, function()
    {
      //Reset the image
      $(this).find('img').stop(false, true).animate({
        'width': width,
        'height': height,
        'top': '0',
        'left': '0'
      }, {
        duration: (300)
      });

      //Hide the caption
      $(this).find('div.caption').stop(false, true).fadeOut(300);
    });
  }

  if ($diapoImage = $('#diapo_image').orNot())
  {
    if ($.getUrlVar('diapo'))
    {
      $diapoImage.addClass('diapo');
    }
    $diapoImage.image();
  }

  if ($diapoLink = $('span.diapo_link').orNot())
  {
    $diapoLink.replaceWith($('<a>').addClass('link diapo_link').attr('href', $('div.image.list a.link:first').attr('href') + '?diapo=1').text('Afficher en diaporama'));
  }

  var screenTimeout = null;
  $(window).bind('resize', function()
  {
    var screenSize = [$(window).width() - 10, $(window).height() - 25];

    if ($diapoImage = $('#diapo_image').orNot())
    {
      $diapoImage.image('resize', screenSize);
    }

    clearTimeout(screenTimeout);
    screenTimeout = setTimeout(function()
    {
      $.get($.dm.ctrl.getHref('+/main/screenSize'), {
        width: screenSize[0],
        height: screenSize[1]
      });
    }, 500);
  }).trigger('resize');
  
})(jQuery);