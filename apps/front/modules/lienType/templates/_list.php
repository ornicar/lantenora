<?php
/*
 * Action for Categ de liens : List
 * Vars : $lienTypePager
 */

echo £o('div.lien_type.list');

 echo $lienTypePager->renderNavigationTop();

  echo £o('ul.elements');

  foreach ($lienTypePager as $lienType)
  {
    echo £o('li.element');
    
      echo £('h2.t_medium', $lienType);

      echo £o('ul.liens');
      
      foreach($lienType->Liens as $lien)
      {
        echo £('li',
          £('h3.t_medium', £link($lien->url)->text($lien->nom.£('span.url', $lien->url))).
          £('div.no_first_letter', 
            markdown($lien->description)
          )
        );
      }

      echo £c('ul');

    echo £c('li');
  }

  echo £c('ul');

 echo $lienTypePager->renderNavigationBottom();

echo £c('div');