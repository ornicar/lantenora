<?php
/*
 * Action for Image : Show top
 * Vars : $image
 */

echo _tag('div.text_align_center',
  _link($image)
  ->text(£media($image->Media)->size(860, 570)->method('scale')->overlay(_media(sfConfig::get('app_image_signature')), 'bottom-right'))
  ->title($image->nom)
);