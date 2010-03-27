<?php


echo _link('@rss')
->text(£media('rss.png')->size(20, 20))
->set('.rss_link')
->title('Syndication RSS');

echo _tag('ul',

  _tag('li', _link('dmTag/list')->text('Tags')).

  _tag('li', _link('lienType/list')->text('Liens')).

  _tag('li', _link($auteurPage)->text('Auteur')).

  _tag('li', _link('invite/list')->text('Invités'))

);