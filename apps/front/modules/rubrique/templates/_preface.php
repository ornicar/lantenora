<?php

echo _tag('div.preface', _tag('div.preface_inner',

  _link('#dm_page')->text('Tourner')->set('a.next_page.close_preface').

  _tag('p.preface_title', $preface->nom).

  _tag('div.preface_text.clearfix',
    ($preface->Image
    ? _media($preface->Image)->size(300)->set('.preface_image')
    : '').
    markdown($preface->description).
    _link('#dm_page')->text('Fermer')->set('a.bottom_close.close_preface')
  )

));