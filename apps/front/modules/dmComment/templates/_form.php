<?php
    
echo

_open('div.commentaire_form_wrap.screen_center'),

_tag('p.t_medium', 'Ajouter un commentaire'),

$form->open('.commentaire_form'),

_tag('ul',

  _tag('li.clearfix', $form['author_name']->label('Auteur')->field()->error()).

  _tag('li.clearfix', $form['body']->label('Texte')->field()->error())
  
),

$form->renderHiddenFields(),

$form->renderSubmitTag('Envoyer'),

$form->close();