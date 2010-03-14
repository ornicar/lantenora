<?php


echo _link('@rss')
->text(£media('rss.png')->size(20, 20))
->set('.rss_link')
->title('Syndication RSS');

echo £('ul',

  £('li', _link('tag/list')->text('Tags')).

  £('li', _link('lienType/list')->text('Liens')).

  £('li', _link($auteurPage)->text('Auteur')).

  £('li', _link('invite/list')->text('Invités'))

);