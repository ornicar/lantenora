<?php

echo _tag('div.footer_parts.clearfix',

  _tag('div.footer_part.licence', dmConfig::get('licence')).

  _tag('div.footer_part.liens',
    _link('http://diem-project.org')->text('powered by Diem, an Open Source PHP5 CMF / CMS for Symfony & jQuery')
  )

);