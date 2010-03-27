<?php
/*
 * Action for Categ de liens : List
 * Vars : $lienTypePager
 */

echo _open('div.lien_type.list');

 echo $lienTypePager->renderNavigationTop();

  echo _open('ul.elements');

  foreach ($lienTypePager as $lienType)
  {
    echo _open('li.element');
    
      echo _tag('h2.t_medium', $lienType);

      echo _open('ul.liens');
      
      foreach($lienType->Liens as $lien)
      {
        echo _tag('li',
          _tag('h3.t_medium', _link($lien->url)->text($lien->nom._tag('span.url', $lien->url))).
          _tag('div.no_first_letter', 
            markdown($lien->description)
          )
        );
      }

      echo _close('ul');

    echo _close('li');
  }

  echo _close('ul');

 echo $lienTypePager->renderNavigationBottom();

echo _close('div');