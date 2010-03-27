<?php
/*
 * Action for Image : List by tag
 * Vars : $imagePager
 */

echo _open('div.image.list.list_by_tag');

 echo $imagePager->renderNavigationTop();

  echo _open('ul.elements.clearfix');

  foreach ($imagePager as $image)
  {
    echo _open('li.element.medium_image');
    
      include_partial('image/_medium', array('image' => $image));
      
    echo _close('li');
  }

  echo _close('ul');

 echo $imagePager->renderNavigationBottom();

echo _close('div');