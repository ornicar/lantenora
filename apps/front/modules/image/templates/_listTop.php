<?php
/*
 * Action for Image : List top
 * Vars : $imagePager
 */

echo £o('div.image.list_top.little');

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