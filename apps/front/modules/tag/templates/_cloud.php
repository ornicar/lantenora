<?php

echo £o('ul.clearfix');

foreach($tags as $tag)
{
  echo £('li',
    £link($tag)->text($tag->nom)
    ->set('style', 'font-size: '.round(1/2+$tag->nbImages/2, 2).'em')
  );
}

echo £c('ul');