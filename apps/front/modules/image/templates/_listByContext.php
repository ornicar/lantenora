<?php
/*
 * Action for Image : List by context
 * Vars : $imagePager
 */

echo £o('div.image.list.list_by_context.little');

 echo $imagePager->renderNavigationTop();

 echo £o('ul.elements');

  foreach ($imagePager as $image)
  {
    echo £o('li.element.medium_image');

      echo £link($image)->text(
        £media($image->Media)
        ->size(120, 80)
      );
      
    echo £c('li');
  }

  echo £c('ul');

 echo $imagePager->renderNavigationBottom();

echo £c('div');