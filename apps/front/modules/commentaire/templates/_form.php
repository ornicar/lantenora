<?php
    
echo

£o('div.commentaire_form_wrap.screen_center'),

£('p.t_medium', 'Ajouter un commentaire'),

$form->open('.commentaire_form'),

£('ul',

  £('li.clearfix', $form['auteur']->label()->field()->error()).

  £('li.clearfix', $form['texte']->label()->field()->error())
  
),

$form->renderHiddenFields(),

$form->renderSubmitTag('Envoyer'),

$form->close();