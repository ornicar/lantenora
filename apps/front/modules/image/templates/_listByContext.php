<?php
/*
 * Action for Image : List by context
 * Vars : $imagePager
 */

echo _open('div.image.list.list_by_context.little');

 echo $imagePager->renderNavigationTop();

 echo _open('ul.elements');

  foreach ($imagePager as $image)
  {
    echo _open('li.element.medium_image');

      echo _link($image)->text(
        £media($image->Media)
        ->size(120, 80)
      );
      
    echo _close('li');
  }

  echo _close('ul');

 echo $imagePager->renderNavigationBottom();

echo _close('div');