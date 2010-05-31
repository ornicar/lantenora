<?php

echo _tag('div.footer_parts.clearfix',

  _tag('div.footer_part.licence', dmConfig::get('licence')).

  _tag('div.footer_part.liens',
    _link('main/planDuSite').
    _link('dmTag/list').
    _link($auteurPage)->text('Auteur').
    _link('@rss')
    ->text(_media('rss24.png')->size(24, 24))
    ->set('.rss_link')
    ->title('Syndication RSS').
    '<hr />'.
    _link('http://diem-project.org')->text('powered by Diem, an Open Source PHP5 CMF / CMS for Symfony & jQuery')
  )

);
