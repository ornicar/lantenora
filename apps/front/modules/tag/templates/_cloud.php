<?php

echo £o('ul.clearfix');

foreach($tags as $tag)
{
  echo £('li',
    _link($tag)->text($tag->nom)
    ->set('style', 'font-size: '.round(2/3+$tag->nbImages/12, 2).'em')
  );
}

echo £c('ul');