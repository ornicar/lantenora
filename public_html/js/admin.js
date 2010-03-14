(function($) {
  
$.dm.ctrl.add({

  init : function(options)
  {
    this.options = options;

    if ($tagsText = $('#image_admin_form_tags_text').orNot())
		{
			$.ajax({
				dataType: 'json',
				url: $.dm.ctrl.getHref('+/tag/json'),
				success: function(data)
				{
					$tagsText.autocomplete(data, {
						multiple: true,
						multipleSeparator: ', ',
						matchContains: true,
					  selectFirst: false,
					});
				}
			})
		}
  },
  
});

})(jQuery);